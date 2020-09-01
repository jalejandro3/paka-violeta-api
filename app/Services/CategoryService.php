<?php

declare(strict_types=1);

namespace App\Services;

interface CategoryService
{
    /**
     * Get all categories
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Create a category
     *
     * @param string $name
     * @return array
     */
    public function create(string $name): array;

    /**
     * Create a category
     *
     * @param int $id Category id
     * @param string $name Category name
     * @return array
     */
    public function update(int $id, string $name): array;

    /**
     * Delete a category
     *
     * @param int $id Category id
     * @return array
     */
    public function delete(int $id): array;
}
