<?php

declare(strict_types=1);

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email;', [
                'email' => $email,
            ])->find();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    public function login(object|array $user): void
    {
        $_SESSION['user'] = [
            'email' => $user?->email ?? $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout(): void
    {
        $_SESSION = [];
        $params = session_get_cookie_params();

        session_destroy();
        setcookie(
            'PHPSESSID',
            '',
            time() - 3600,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly'],
        );
    }
}
