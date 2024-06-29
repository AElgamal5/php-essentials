<?php

namespace Core;

class Authenticator
{

    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)->query("SELECT * from users where email = :email", ['email' => $email])->find();

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $this->login([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ]);

        return true;
    }

    public function login(array $user): void
    {
        Session::put('user', $user);

        //security good practice
        session_regenerate_id(true);
    }

    public function logout(): void
    {
        Session::destroy();
    }
}
