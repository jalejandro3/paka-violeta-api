<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ApplicationException;
use App\Exceptions\ResourceNotFoundException;
use Illuminate\Database\Eloquent\Collection;

interface CategorySizeService
{
    /**
     * Get all category sizes sizes
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Create a category sizes
     *
     * @param int $categoryId Category Id
     * @param string $size Category Size
     * @return array
     * @throws ApplicationException
     */
    public function create(int $categoryId, string $size): array;

    /**
     * Update a category sizes
     *
     * @param int $id Category size id
     * @param int $categoryId Category id
     * @param string $size Category size
     * @return array
     * @throws ResourceNotFoundException
     */
    public function update(int $id, int $categoryId, string $size): array;

    /**
     * Delete a category sizes
     *
     * @param int $id Category Size id
     * @return array
     */
    public function delete(int $id): array;

    /**
     * Return Sizes by Category
     *
     * @param int $categoryId
     * @return Collection
     * @throws ResourceNotFoundException
     */
    public function getSizesByCategory(int $categoryId): Collection;
}
