<?php

class Pessoa extends AbstractRepository
{
    //propriedades que representam as colunas da BD
    public $id;
    public $firstName;
    public $lastName;
    public $dataNasc;
    public $email;
    public $emailConfirmado;
    //string para confirmar a conta no email
    public $emailConfirmar;
    public $nickname;
    public $pass;
    //contar Recuperacao de pass
    public $passRecuperada;
    //string para recuperar
    public $passRecuperacaoToken;
    //Ativo, desativo, bloqueado
    public $estado;
    //admin, Cozinheiro, outro
    public $tipo;
    public $img;
    public $bd;


    public function __construct()
    {
        //nome da tabela pass no construtor
        parent::__construct("users");
        //echo "Pessoa Construtor";
    }


    //Devolve todos os utilizadores --Apenas para o admin
    public function listar()
    {
        $data = [];
        //Devolve objeto de utilizadores
        $query = $this->tolist();

        while ($linha = $query->fetch()) {
            $data[] = $linha;
        }

        return $data;
    }



    //Adicionar Utilizadores
    public function add($firstName, $lastName, $email, $pass)
    {
        $query = $this->create(array($firstName, $lastName, $email, $pass));

        if ($query) {
            $msg = 1;
        } else {
            $msg = 0;
        }

        return $msg;
    }
}