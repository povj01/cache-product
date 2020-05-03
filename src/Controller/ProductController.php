<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController extends DefaultController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @Route("/produkt/{id}", name="frontend-detail-product")
     * @param int $id
     * @return JsonResponse
     */
    public function detail(int $id): JsonResponse
    {
        $product = $this->productService->findById($id);

        return JsonResponse::fromJsonString($product);
    }
}
