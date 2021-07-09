<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('Cursos/formulario.php', [
            'titulo' => 'Novo curso'
        ]);
    }
}