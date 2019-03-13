<?php

class Produto {

	private $idjogo;
	private $nome;
	private $preco;
	private $quantidade;
	private $marca;
	private $plataforma;

	function __construct($nome, $preco, $quantidade, $marca, $plataforma) {
		$this->nome = $nome;
		$this->preco = $preco;
		$this->quantidade = $quantidade;
		$this->marca = $marca;
		$this->plataforma = $plataforma;
	}
	public function getidjogo() {
		return $this->idjogo;
	}

	public function setidjogo($idjogo) {
		$this->id = $idjogo;
	}
	public function getnome() {
		return $this->nome;
	}

	public function getplataforma() {
		return $this->plataforma;
	}

	public function getmarca() {
		return $this->marca;
	}

	public function getquantidade() {
		return $this->quantidade;
	}
	public function getpreco() {
		return $this->preco;
	}
}