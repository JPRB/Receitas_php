<?php

class Receitas extends AbstractRepository
{
    //propriedades que representam as colunas da BD
    public $id_utilizador;
    public $nome;
    public $desc;
    public $duracao;
    public $n_pessoas;
    public $preco;
    public $categoria;

    public function __construct()
    {
        parent::__construct("receitas");
    }


    //Devolver as receitas mais recentes
    public function listarRecentes()
    {
        $data = [];


        $query = $this->getDb()->prepare("SELECT rI.url as img, r.nome as nome, cat.nome as Categora, r.dificuldade as dificuldade FROM receitas r INNER JOIN receitasImagens rI on r.id=rI.id_receita INNER JOIN categoriareceitas cat on cat.id = r.id_categoria ORDER BY r.data DESC;");

        $query->execute();

        while ($linha = $query->fetch()) {
            $data[] = $linha;
        }

        return $data;
    }

    public function add($id_utilizador, $nome, $desc, $duracao, $n_pessoas, $preco, $categoria)
    {
        $query = $this->save();
        $query->execute([$id_utilizador, $nome, $desc, $duracao, $n_pessoas, $preco, $categoria]);

        if ($query) {
            $msg = 1;
        } else {
            $msg = 0;
        }

        return $msg;
    }

    /*public static function FindBy($id)
    {
        $db = new DataBase();

        $query = $db->prepare("SELECT * FROM receitas WHERE id= ?");
        $query->execute([$id]);

        return $query->fetchObject();
    }

    public static function update($nome, $dataNasc, $sexo, $curso, $id)
    {
        $db = new DataBase();

        $query = $db->prepare("UPDATE pessoas SET nome=?, dataNascimento=?, sexo=?, curso=? WHERE id = ?");
        $query->execute([$nome, $dataNasc, $sexo, $curso, $id]);

        if ($query) {
            $msg = 1;
        } else {
            $msg = 0;
        }

        return $msg;
    }

    public static function delete($id)
    {
        $db = new DataBase();

        $query = $db->prepare("DELETE FROM pessoas WHERE id= ?");
        $query->execute([$id]);
    }*/
}


?>