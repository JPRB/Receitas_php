<?php

class HomeController extends Controller
{

	public function index()
	{
	    $receitas = $this->model("Receitas");

       	$this->view('Home/index', $receitas->listarRecentes());
	}


    public function error()
    {
        $this->view('Home/error');
    }
}



?>