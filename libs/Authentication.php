<?php

class Authentication extends AbstractRepository
{

    public $sessionKey = null;

    public function __construct()
    {
        parent::__construct("users");
    }

    public function autenticate($email, $pass)
    {

        if ($this->userExist($email, $pass)) {
            $_SESSION['email'] = $email;
            $_SESSION['signed_in'] = true;

            return true;

        } else {
            $_SESSION['error'] = "Email ou Password Incorretos";
            $_SESSION['signed_in'] = false;

            return false;
            //header("Location: /index.php");
        }

    }

    //Verificar se está authenticado
    public function isAuthenticated()
    {
        if (isset($_SESSION['email']) && $_SESSION['signed_in'] == true) {
            /*Tempo de sessao*/
            //$_SESSION['sessionExpiredAt'] = time() + 1800;
            return true;
        }
        return false;
    }

    public function checkEmailExist($email)
    {
        try {
            $query = $this->getDb()->prepare("SELECT tipo FROM `users` WHERE email = ?;");
            $query->execute([$email]);

            if ($query->rowCount() == 1) {
                //Devolve tipo de utilizador se for 1 é admin 0 cozinheiro
                return $query;
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    //Verificar se email e pass está correta
    public function userExist($email, $pass)
    {
        $pass = hash('sha512',SALT.'&&'.$pass);

        try {
            $query = $this->getDb()->prepare("SELECT * FROM `users` WHERE email = ? AND pass = ?");
            $query->execute([$email, $pass]);

            if ($query->rowCount() == 1) {
                return $query;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return false;
    }


    public static function check_pass($password_submited, $password_saved)
    {
        $hash_password = hash('sha512', SALT . ':' . $password_submited);

        return $hash_password === $password_saved ? true : false;
    }

    public static function logout()
    {

        unset($_SESSION['email']);
        unset($_SESSION['sessionExpiredAt']);
        $_SESSION['signed_in'] = false;
        session_destroy();
    }
}