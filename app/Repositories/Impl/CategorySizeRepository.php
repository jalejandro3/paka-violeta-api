<?php

declare(strict_types=1);

namespace App\Repositories\Impl;

use App\Repositories\CategorySizeRepository as CategorySizeInterface;
use App\Models\CategorySize;
use Illuminate\Database\Eloquent\Collection;

final class CategorySizeRepository implements CategorySizeInterface
{
    /**
     * @var CategorySize
     */
    private $categorySize;

    /**
     * CategorySizeRepository constructor.
     *
     * @param CategorySize $categorySize
     */
    public function __construct(
        CategorySize $categorySize
    )
    {
        $this->categorySize = $categorySize;
    }

    /**
     * @inheritDoc
     */
    public function create(int $categoryId, string $size): bool
    {
        return $this->categorySize->fill(['category_id' => $categoryId, 'size' => $size])->save();
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->categorySize->get();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?CategorySize
    {
        return $this->categorySize->whereId($id)->first();
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->categorySize->whereId($id)->delete();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $size): int
    {
        return $this->categorySize->whereId($id)->update(['size' => $size]);
    }

    /**
     * @inheritDoc
     */
    public function findSizeByCategory(int $categoryId): Collection
    {
        return $this->categorySize->whereCategoryId($categoryId)->get();
    }
}
