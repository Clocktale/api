<?php

namespace App\Repositories\Eloquent\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


trait PaginatesWithOptionalNameLike
{
    /**
     * @param  Builder<\Illuminate\Database\Eloquent\Model>  $query
     */
    protected function paginateWithOptionalNameLike(
        Builder $query,
        ?string $name,
        ?int $page,
        int $perPage
    ): LengthAwarePaginator|Collection {
        if ($name !== null && $name !== '') {
            $needle = mb_strtolower($this->escapeLikePattern($name), 'UTF-8');
            $pattern = '%'.$needle.'%';
            $query->whereRaw('LOWER(`name`) LIKE ?', [$pattern]);
        }

        return $query->paginate($perPage, ['*'], 'page', $page);
    }

    private function escapeLikePattern(string $value): string
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $value);
    }
}
