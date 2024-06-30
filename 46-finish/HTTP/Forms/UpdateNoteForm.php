<?php

namespace HTTP\Forms;

use Core\Validator;
use Core\ValidationException;

class UpdateNoteForm
{
    private $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($_POST['body'], 3, 500)) {
            $this->errors['body'] = "Body of length not more than 500 is required.";
        }
    }

    public static function validate(array $attributes): UpdateNoteForm
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

    public function error(string $field, string $message): UpdateNoteForm
    {
        $this->errors[$field][] = $message;

        return $this;
    }
}

