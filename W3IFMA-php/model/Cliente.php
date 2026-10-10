<?php

class Cliente {

    private string $nome;
    private string $email;
    private ?string $telefone;

    public function __construct($nome = null, $email = null, $telefone = null) {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    // Getters
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    // Setters
    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setTelefone(?string $telefone) {
        $this->telefone = $telefone;
    }

}
