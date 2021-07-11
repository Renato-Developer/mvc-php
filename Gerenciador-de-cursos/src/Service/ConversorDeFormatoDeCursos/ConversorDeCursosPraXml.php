<?php

namespace Alura\Cursos\Service\ConversorDeFormatoDeCursos;

class ConversorDeCursosPraXml implements ConversorDeFormatoCurso
{
    private $cursos;

    public function __construct(array $cursos)
    {
        $this->cursos = $cursos;
        return $this;
    }

    public function converterFormatoCurso(): string
    {
        $cursosEmXml = new \SimpleXMLElement('<cursos/>');

        foreach ($this->cursos as $curso){
            $cursoEmXml = $cursosEmXml->addChild('curso');
            $cursoEmXml->addChild('id', $curso->getId());
            $cursoEmXml->addChild('descricao', $curso->getDescricao());
        }

        return $cursosEmXml->asXML();
    }
}