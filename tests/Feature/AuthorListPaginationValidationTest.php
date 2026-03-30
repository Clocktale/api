<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthorListPaginationValidationTest extends TestCase
{
    public function test_letters_in_page_return_422(): void
    {
        $this->getJson('/api/v1/authors?page=abc')
            ->assertStatus(422);
    }

    public function test_letters_in_per_page_return_422(): void
    {
        $this->getJson('/api/v1/authors?per_page=10x')
            ->assertStatus(422);
    }

    public function test_empty_page_query_returns_422(): void
    {
        $this->getJson('/api/v1/authors?page=')
            ->assertStatus(422);
    }

    public function test_get_without_accept_json_returns_422(): void
    {
        $this->get('/api/v1/authors?page=abc')
            ->assertStatus(422);
    }
}
