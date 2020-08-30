<?php

declare(strict_types=1);

namespace App\Services;

interface UserService
{
    /**
     * Return User Data by JWT string
     *
     * @param string $jwt
     * @return object
     */
    public function getUserData(string $jwt): object;
}
