<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizaLogin implements InterfaceControladorRequisicao
{
    private $repositorioDeUsuario;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeUsuario = $entityManager
            ->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($email === false || is_null($email)) {
            echo "Email digitado é inválido";
            return;
        }

        /**@var Usuario $usuario*/
        $usuario = $this->repositorioDeUsuario->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            echo "Email ou senha incorretos!";
            return;
        }

        header('location: /listar-cursos');
    }
}