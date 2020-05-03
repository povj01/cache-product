<?php
declare(strict_types=1);

namespace App\Repository\MySQL;

use App\Entity\Product;
use App\Repository\IProductRepository;

/**
 * Class ProductRepositoryMS
 * @package App\Repository\MySQL
 */
class ProductRepositoryMS implements IProductRepository
{
    public function findById(int $id): Product
    {
        return new Product(3, 'Produkt 3', 'Popis produktu 3');
    }
}
