<?php

declare(strict_types=1);

namespace App\Repositories\Impl;

use App\Models\Color;
use App\Repositories\ColorRepository as ColorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class ColorRepository implements ColorRepositoryInterface
{
    /**
     * @var Color
     */
    private $color;

    /**
     * ColorRepository constructor.
     * @param Color $color
     */
    public function __construct(
        Color $color
    )
    {
        $this->color = $color;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): Collection
    {
        return $this->color->get();
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): bool
    {
        return $this->color->fill(['name' => $name])->save();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): int
    {
        return $this->color->whereId($id)->update(['name' => $name]);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): int
    {
        return $this->color->whereId($id)->delete();
    }
}
