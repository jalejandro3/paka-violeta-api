<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Services\CategoryService as CategoryServiceInterface;
use App\Repositories\CategoryRepository;

final class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->categoryRepository->findAll()->all();
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): array
    {
        $this->categoryRepository->create($name);

        return ['msg' => __("Category {$name} created successfully.")];
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): array
    {
        $this->categoryRepository->update($id, $name);

        return ['msg' => __("Category {$name} was updated successfully.")];
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): array
    {
        $this->categoryRepository->delete($id);

        return ['msg' => __('Category deleted.')];
    }
}
