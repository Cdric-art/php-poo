<?php


namespace App\Models;


class User extends Model
{

    protected string $table = 'users';

    public function getByUsername($username): User|null
    {
        $user = $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = $user->admin;
            header('Location: http://localhost/site_php/admin/posts?success=true');
        } else {
            header('Location: http://localhost/site_php/login');
        }
    }

}
