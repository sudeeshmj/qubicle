<?php

namespace App\Services\Api;

use App\Repositories\Api\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiResponseHelper;

class AuthService
{
    protected $authRepo;

    public function __construct(AuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function register(array $data)
    {
        try {
            $user = $this->authRepo->createUser($data);
            $token = $user->createToken('auth_token')->plainTextToken;

            $responseData = [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];
            return ApiResponseHelper::success('Registration successful', 201, $responseData);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Registration failed', 500);
        }
    }

    public function login(array $credentials)
    {
        $user = $this->authRepo->getUserByEmail($credentials['email']);

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return ApiResponseHelper::error('Invalid credentials', 500);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $responseData = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        return ApiResponseHelper::success('Login successful', 200, $responseData);
    }

    public function logout($user)
    {
        $user->currentAccessToken()->delete();
        return ApiResponseHelper::success('Logged out successfully', 200);
    }
}
