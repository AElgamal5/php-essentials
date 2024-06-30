<?php

namespace HTTP\Forms;

use Core\Validator;
use Core\ValidationException;

class RegisterForm
{
    private $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::required($attributes['name'])) {
            $this->errors['name'][] = "Name is required.";
        }
        if (!Validator::string($attributes['name'], 3, 255)) {
            $this->errors['name'][] = "Name of length should be between 3 and 255 character.";
        }

        if (!Validator::required($attributes['email'])) {
            $this->errors['email'][] = "Email is required.";
        }
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'][] = "Not a valid email.";
        }
        if (!Validator::unique($attributes['email'], 'users', 'email')) {
            $this->errors['email'][] = "This email is already used.";
        }

        if (!Validator::required($attributes['password'])) {
            $this->errors['password'][] = "Password is required.";
        }
        if (!Validator::string($attributes['password'], 6, 255)) {
            $this->errors['password'][] = "Password of length should be between 6 and 255 character.";
        }
    }

    public static function validate(array $attributes): RegisterForm
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): RegisterForm
    {
        $this->errors[$field][] = $message;

        return $this;
    }
}

