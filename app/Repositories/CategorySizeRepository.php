<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CategorySize;
use Illuminate\Database\Eloquent\Collection;

interface CategorySizeRepository
{
    /**
     * Find all categories
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Find a category size by its id
     *
     * @param int $id Category size id
     * @return CategorySize|null
     */
    public function findById(int $id): ?CategorySize;

    /**
     * Create a category
     *
     * @param int $categoryId Category Id
     * @param string $size Category Size
     * @return bool
     */
    public function create(int $categoryId, string $size): bool;

    /**
     * Update a category
     *
     * @param int $id Category size id
     * @param string $name Category name
     * @return int
     */
    public function update(int $id, string $name): int;

    /**
     * Delete a category
     *
     * @param int $id Category size id
     * @return int
     */
    public function delete(int $id): int;

    /**
     * Find a size by category id
     *
     * @param int $categoryId Category Id
     * @return Collection
     */
    public function findSizeByCategory(int $categoryId): Collection;
}
