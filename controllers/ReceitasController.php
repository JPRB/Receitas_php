<?php

class ReceitasController extends Controller
{
    public function index()
    {
        $receitas = $this->model("Receitas");
        $categorias = $this->model("Categorias");

        $this->view('Receitas/index');
    }


    public function add()
    {
        $categorias = $this->model("Categorias");

        $this->view("Receitas/",$categorias);
    }
}