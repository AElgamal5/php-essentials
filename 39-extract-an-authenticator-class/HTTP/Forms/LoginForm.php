<?php

namespace HTTP\Forms;

use Core\Validator;

class LoginForm
{
    private $errors = [];

    public function validate(string|null $email, string|null $password): bool
    {
        if (!Validator::required($email)) {
            $this->errors['email'][] = "email is required.";
        }

        if (!Validator::email($email)) {
            $this->errors['email'][] = "Not a valid email.";
        }

        if (!Validator::required($password)) {
            $this->errors['password'][] = "password is required.";
        }

        if (!Validator::string($password, 6, 255)) {
            $this->errors['password'][] = "password of length should be between 6 and 255 character.";
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }
}

