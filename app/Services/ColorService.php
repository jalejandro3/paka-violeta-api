<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Color;

interface ColorService
{
    /**
     * Get all colors
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Create a color
     *
     * @param string $name
     * @return array
     */
    public function create(string $name): array;

    /**
     * Create a color
     *
     * @param int $id Color id
     * @param string $name Color name
     * @return array
     */
    public function update(int $id, string $name): array    ;

    /**
     * Delete a color
     *
     * @param int $id Color id
     * @return array
     */
    public function delete(int $id): array;
}
