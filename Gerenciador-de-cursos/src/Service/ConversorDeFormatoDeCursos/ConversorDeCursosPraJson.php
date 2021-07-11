<?php

namespace Alura\Cursos\Service\ConversorDeFormatoDeCursos;

class ConversorDeCursosPraJson implements ConversorDeFormatoCurso
{
    private $cursos;

    public function __construct(array $cursos)
    {
        $this->cursos = $cursos;
        return $this;
    }

    public function converterFormatoCurso(): string
    {
        return json_encode($this->cursos);
    }
}