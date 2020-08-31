<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ApplicationException;
use App\Exceptions\ResourceNotFoundException;
use App\Models\User;

interface AuthService
{
    /**
     * Method to login a user
     *
     * @param string $email User email
     * @param string $password User password
     * @return array
     * @throws ResourceNotFoundException
     * @throws ApplicationException
     */
    public function login(string $email, string $password): array;

    /**
     * Method to register a user
     *
     * @param array $userData
     * @return array
     * @throws ApplicationException
     */
    public function register(array $userData): array;
}
