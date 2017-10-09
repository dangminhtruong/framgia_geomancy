<?php

namespace App\Repositories\Contracts;

interface GalleryRepositoryInterface extends RepositoryInterface
{
    public function create($data);
}
