<?php

namespace Alura\Cursos\Controller;

class FormularioLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {
        $dados = [
            'titulo' => 'Formulário de Login',
        ];
        echo $this->renderizaHtml('Login/formulario-login.php', $dados);
    }
}