<?php
declare(strict_types=1);

namespace App\Service;

use App\Repository\IProductRepository;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class ProductService
 * @package App\Service
 */
class ProductService
{
    private IProductRepository $productRepository;
    private string $cacheFile;

    public function __construct(IProductRepository $productRepository, string $projectDir, string $cacheDir)
    {
        $this->productRepository = $productRepository;
        $this->cacheFile = $projectDir . $cacheDir;
    }

    public function findById(int $productId): string
    {
        if (!file_exists($this->cacheFile)) {
            $this->initCache();
        }

        $product = $this->checkCache($productId);
        if ($product !== null) {
            return $product;
        }

        $product = $this->productRepository->findById($productId);
        $product->addSearchTime();

        $cacheProducts = json_decode((string) file_get_contents($this->cacheFile), true);
        $cacheProducts['products'][] = $product->toArray();
        $this->updateCache($cacheProducts);

        return $product->jsonSerialize();
    }

    private function checkCache(int $productId): ?string
    {
        $cacheProducts = json_decode((string) file_get_contents($this->cacheFile), true);
        foreach ($cacheProducts['products'] as $key => $cacheProduct) {
            if ($cacheProduct['id'] === $productId) {
                $cacheProducts['products'][$key]['searchTime'] = $cacheProduct['searchTime'] + 1;
                $this->updateCache($cacheProducts);
                $cacheProduct['searchTime']++;

                return (string) json_encode($cacheProduct);
            }
        }

        return null;
    }

    private function updateCache(array $products): void
    {
        $filesystem = new Filesystem();

        $filesystem->dumpFile($this->cacheFile, (string) json_encode($products));
    }

    private function initCache(): void
    {
        $filesystem = new Filesystem();
        $cache = [
            'products' => [],
        ];

        $filesystem->dumpFile($this->cacheFile, (string) json_encode($cache));
    }
}
