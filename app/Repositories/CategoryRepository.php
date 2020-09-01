<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

Interface CategoryRepository
{
    /**
     * Get all categories
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Find a category by its id
     *
     * @param int $id Category Id
     * @return Category|null
     */
    public function findById(int $id): ?Category;

    /**
     * Create a category
     *
     * @param string $name Category name
     * @return bool
     */
    public function create(string $name): bool;

    /**
     * Update a category
     *
     * @param int $id Category id
     * @param string $name Category name
     * @return int
     */
    public function update(int $id, string $name): int;

    /**
     * Delete a category
     *
     * @param int $id Category id
     * @return int
     */
    public function delete(int $id): int;
}
