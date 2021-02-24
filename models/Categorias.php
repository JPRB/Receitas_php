<?php

class Categorias extends AbstractRepository
{

    public function __construct()
    {
        //nome da tabela pass no construtor
        parent::__construct("categoriaReceitas");
        //echo "Pessoa Construtor";
    }


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

}