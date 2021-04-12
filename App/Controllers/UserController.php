<?php


namespace App\Controllers;


use App\Models\User;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $user = (new User($this->getDb()))->getByUsername($_POST['username']);
    }

    public function logout()
    {
        session_destroy();
        header('Location: http://localhost/site_php');
    }
}
