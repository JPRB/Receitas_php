<?php

class AuthenticationController extends Controller
{

    public function index()
    {
        $auth = new Authentication();

        if (!$auth->isAuthenticated()) {
            //if not authenticated require da view login
            $this->view('Authentication/login');
        } else {
            $local = PATH . "/Home/index";
            header("location: $local");
            exit();
        }
    }

    public function login()
    {
        //Instancia do objeto para o modelo
        $auth = new Authentication();
        //check is authenticated
        if (!$auth->isAuthenticated())
            $this->view('Authentication/login');
        else
        {
            $local = PATH . "/Home/index";
            header("location: $local");
            exit();
        }
    }

    public function doLogin()
    {
        $auth = new Authentication();

        if (!$auth->isAuthenticated()) {
            //Instancia do objeto para o modelo
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);

            if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {
                if ($auth->autenticate($email, $pass)) {
                    $local = PATH . "/Home/index";

                    header("location: $local");
                    exit();
                } else {
                    $this->view('Authentication/login', ["error" => "Email ou Password Inválidos"]);
                }
            } else {
                $this->view('Authentication/login', ["error" => "Os campos são Obrigatórios"]);
                exit();
            }
        }
        else
        {
            $local = PATH . "/Home/index";
            header("location: $local");
            exit();
        }
    }

    public function register()
    {

    }

    public function doRegister()
    {

    }


    public function logOut()
    {
        Authentication::logout();
        $local = PATH . "/Home/index";
        header("location: $local");
        exit();
    }
}