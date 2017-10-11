<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getByCategory($categoryId, $pageNo, $rowPerPage);

    public function count($categoryId);
}
