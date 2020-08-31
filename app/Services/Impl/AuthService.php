<?php

declare(strict_types=1);

namespace App\Services\Impl;
use App\Exceptions\ApplicationException;
use App\Exceptions\ResourceNotFoundException;
use App\Repositories\UserRepository;
use App\Services\AuthService as AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class AuthService implements AuthServiceInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AuthService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function login(string $email, string $password): array
    {
        $user = $this->userRepository->findByEmail($email);

        if (! $user) {
            throw new ResourceNotFoundException('User does not exists.');
        }

        if (! Auth::attempt(['email' => $email, 'password' => $password])) {
            throw new ApplicationException('Wrong email or password, please verify your data.');
        }

        return ['token' => jwt_build_token($user->toArray()), 'data' => $user->toArray()];
    }

    /**
     * @inheritDoc
     */
    public function register(array $userData): array
    {
        if ($this->userRepository->findByEmail($userData['email'])) {
            throw new ApplicationException('The email is already taken, please use a new one.');
        }

        if ($this->userRepository->findByUsername($userData['username'])) {
            throw new ApplicationException('The username is already taken, please use a new one.');
        }

        $userData['password'] = Hash::make($userData['password']);

        $this->userRepository->create($userData);

        return ['message' => 'User created successfully.'];
    }
}
