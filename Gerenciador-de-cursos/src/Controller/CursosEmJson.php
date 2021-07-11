<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Service\ConversorDeFormatoDeCursos\ConversorDeCursosPraJson;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CursosEmJson implements RequestHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerCreator $entityManager)
    {
        $this->entityManager = $entityManager->getEntityManager();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursosRepostitory = $this->entityManager->getRepository(Curso::class);
        $cursos = $cursosRepostitory->findAll();
        $cursosEmJson = (new ConversorDeCursosPraJson($cursos))->converterFormatoCurso();

        return new Response(200, [], $cursosEmJson);
    }
}