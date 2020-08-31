<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

interface ColorRepository
{
    /**
     * Get all colors
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Create a color
     *
     * @param string $name Color name
     * @return bool
     */
    public function create(string $name): bool;

    /**
     * Update a color
     *
     * @param int $id Color id
     * @param string $name Color name
     * @return int
     */
    public function update(int $id, string $name): int;

    /**
     * Delete a color
     *
     * @param int $id Color id
     * @return int
     */
    public function delete(int $id): int;
}
