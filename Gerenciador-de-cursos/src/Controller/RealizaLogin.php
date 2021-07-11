<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizaLogin implements RequestHandlerInterface
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

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryString = $request->getParsedBody();

        $email = filter_var($queryString['email'], FILTER_VALIDATE_EMAIL);
        $senha = filter_var($queryString['password'], FILTER_SANITIZE_STRING);

        if ($email === false || is_null($email)) {
            $this->defineMensagem('danger', 'Email inválido');
            return new Response(302, ['location' => '/login']);
        }

        /**@var Usuario $usuario*/
        $usuario = $this->repositorioDeUsuario->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            $this->defineMensagem('danger', 'Email ou senha inválidos');
            return new Response(302, ['location' => '/login']);
        }

        session_start();
        $_SESSION['logado'] = true;

        return new Response(302, ['location' => '/listar-cursos']);
    }
}