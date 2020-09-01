<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Exceptions\ApplicationException;
use App\Exceptions\ResourceNotFoundException;
use App\Repositories\CategoryRepository;
use App\Services\CategorySizeService as CategorySizeServiceInterface;
use App\Repositories\CategorySizeRepository;
use Illuminate\Database\Eloquent\Collection;

final class CategorySizeService implements CategorySizeServiceInterface
{
    /**
     * @var CategorySizeRepository
     */
    private $categorySizeRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategorySizeService constructor.
     *
     * @param CategorySizeRepository $categorySizeRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategorySizeRepository $categorySizeRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->categorySizeRepository = $categorySizeRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->categorySizeRepository->findAll()->toArray();
    }

    /**
     * @inheritDoc
     */
    public function create(int $categoryId, string $size): array
    {
        $categorySize = $this->categorySizeRepository->findSizeByCategory($categoryId);

        if ($categorySize && $categorySize->size === $size) {
            throw new ApplicationException("The {$size} size already exists.");
        }

        $this->categorySizeRepository->create($categoryId, $size);

        return ['msg' => __("Category Size {$size} created successfully.")];
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, int $categoryId, string $size): array
    {
        if (! $this->categoryRepository->findById($categoryId)) {
            throw new ResourceNotFoundException("Category with the id {$categoryId} does not exists.");
        }

        $this->categorySizeRepository->update($id, $size);

        return ['msg' => __("Category Size {$size} was updated successfully.")];
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): array
    {
        $this->categorySizeRepository->delete($id);

        return ['msg' => __('Category Size deleted.')];
    }

    /**
     * @inheritDoc
     */
    public function getSizesByCategory(int $categoryId): Collection
    {
        if (! $this->categoryRepository->findById($categoryId)) {
            throw new ResourceNotFoundException("Category with the id {$categoryId} does not exists.");
        }

        return $this->categorySizeRepository->findSizeByCategory($categoryId);
    }
}
