<?php

use Alura\Cursos\Controller\CursosEmJson;
use Alura\Cursos\Controller\CursosEmXml;
use Alura\Cursos\Controller\Exclusao;
use Alura\Cursos\Controller\FormularioEdicao;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\FormularioLogin;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Logout;
use Alura\Cursos\Controller\Persistencia;
use Alura\Cursos\Controller\RealizaLogin;
use Alura\Armazenamento\Controller\FormularioInsercaoFormacao;
use Alura\Armazenamento\Controller\PersistenciaFormacao;
use Alura\Armazenamento\Controller\ListaDeFormacoes;

return [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/logout' => Logout::class,
    '/cursos-json' => CursosEmJson::class,
    '/cursos-xml' => CursosEmXml::class,
    '/nova-formacao' => FormularioInsercaoFormacao::class,
    '/salvar-formacao' => PersistenciaFormacao::class,
    '/listar-formacoes' => ListaDeFormacoes::class,
];
