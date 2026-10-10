<?php

class Usuario {
   
    private string $nome;
    private string $email;

    public function __construct($nome = null, $email = null) {
        $this->nome = $nome;
        $this->email = $email;
    }

    // Getters
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

}
