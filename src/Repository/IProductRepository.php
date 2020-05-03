<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;

/**
 * Interface IProductRepository
 * @package App\Repository
 */
interface IProductRepository
{
    public function findById(int $id): Product;
}
