<?php 

namespace App\Services\Author;

use App\Repositories\Contracts\IAuthorRepository;

class ListAuthorService{

    public function __construct(private IAuthorRepository $authorRepository)
    {
        
    }

}