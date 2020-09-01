<?php

declare(strict_types=1);

namespace App\Repositories\Impl;

use App\Models\Category;
use App\Repositories\CategoryRepository as CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryRepository constructor.
     *
     * @param Category $category
     */
    public function __construct(
        Category $category
    )
    {
        $this->category = $category;
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): bool
    {
        return $this->category->fill(['name' => $name])->save();
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->category->get();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Category
    {
        return $this->category->whereId($id)->first();
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->category->whereId($id)->delete();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): int
    {
        return $this->category->whereId($id)->update(['name' => $name]);
    }
}
