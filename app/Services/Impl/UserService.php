<?php

declare(strict_types=1);

namespace App\Services\Impl;

use App\Services\UserService as UserServiceInterface;

final class UserService implements UserServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getUserData(string $jwt): object
    {
        $user = jwt_decode_token($jwt);

        return $user->data;
    }
}
