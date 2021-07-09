<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizaLogin implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;
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
            $this->defineMensagem('danger', 'Email inválido');
            header('location: /login');
            return;
        }

        /**@var Usuario $usuario*/
        $usuario = $this->repositorioDeUsuario->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            $this->defineMensagem('danger', 'Email ou senha inválidos');
            header('location: /login');
            return;
        }

        session_start();
        $_SESSION['logado'] = true;

        header('location: /listar-cursos');
    }
}