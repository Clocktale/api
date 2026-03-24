<?php 

namespace App\Repositories\Contracts;

use App\Models\Creators;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
interface IAuthorRepository{

    public function list(?string $name, ?int $page = null, int $perPage = 10):LengthAwarePaginator|Collection;  
    public function createAuthor(Creators $author);

    public function updateAuthor(Creators $author);

    public function deleteAuthor(Creators $author);
}