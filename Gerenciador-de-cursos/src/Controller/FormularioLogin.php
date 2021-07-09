<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;

class FormularioLogin implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;

    public function processaRequisicao(): void
    {
        $dados = [
            'titulo' => 'Formulário de Login',
        ];
        echo $this->renderizaHtml('Login/formulario-login.php', $dados);
    }
}