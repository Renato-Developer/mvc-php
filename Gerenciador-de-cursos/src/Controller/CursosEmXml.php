<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Service\ConversorDeFormatoDeCursos\ConversorDeCursosPraXml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CursosEmXml implements RequestHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerCreator $entityManager)
    {
        $this->entityManager = $entityManager->getEntityManager();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursosRepository = $this->entityManager->getRepository(Curso::class);
        $cursos = $cursosRepository->findAll();

        $cursosEmXml = (new ConversorDeCursosPraXml($cursos))->converterFormatoCurso();

        return new Response(200, ['Content-Type' => 'application/xml'], $cursosEmXml);
    }
}