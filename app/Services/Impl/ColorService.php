<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Models\Color;
use App\Repositories\ColorRepository;
use App\Services\ColorService as ColorServiceInterface;
use Illuminate\Support\Arr;

final class ColorService implements ColorServiceInterface
{
    /**
     * @var ColorRepository
     */
    private $colorRepository;

    /**
     * ColorService constructor.
     *
     * @param ColorRepository $colorRepository
     */
    public function __construct(
        ColorRepository $colorRepository
    )
    {
        $this->colorRepository = $colorRepository;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->colorRepository->findAll()->toArray();
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): array
    {
        $this->colorRepository->create($name);

        return ['msg' => __("Color {$name} created successfully.")];
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, string $name): array
    {
        $this->colorRepository->update($id, $name);

        return ['msg' => __("Color {$name} was updated successfully.")];
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): array
    {
        $this->colorRepository->delete($id);

        return ['msg' => __('Color deleted.')];
    }
}
