<?php
declare(strict_types=1);

namespace App\Repository\ElasticSearch;

use App\Entity\Product;
use App\Repository\IProductRepository;

/**
 * Class ProductRepositoryES
 * @package App\Repository\ElasticSearch
 */
class ProductRepositoryES implements IProductRepository
{
    public function findById(int $id): Product
    {
        return new Product(3, 'Produkt 3', 'Popis produktu 3');
    }
}
