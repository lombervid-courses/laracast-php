<?php

declare(strict_types=1);

namespace Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate(string $email, string $password): bool
    {
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (! Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return count($this->errors) === 0;
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }
}
