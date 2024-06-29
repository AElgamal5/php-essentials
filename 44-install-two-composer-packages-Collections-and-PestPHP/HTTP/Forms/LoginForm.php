<?php

namespace HTTP\Forms;

use Core\Validator;
use Core\ValidationException;

class LoginForm
{
    private $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::required($attributes['email'])) {
            $this->errors['email'][] = "email is required.";
        }

        if (!Validator::email($attributes['email'])) {
            $this->errors['email'][] = "Not a valid email.";
        }

        if (!Validator::required($attributes['password'])) {
            $this->errors['password'][] = "password is required.";
        }

        if (!Validator::string($attributes['password'], 6, 255)) {
            $this->errors['password'][] = "password of length should be between 6 and 255 character.";
        }
    }

    public static function validate(array $attributes): LoginForm
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

    public function error(string $field, string $message): LoginForm
    {
        $this->errors[$field][] = $message;

        return $this;
    }
}

