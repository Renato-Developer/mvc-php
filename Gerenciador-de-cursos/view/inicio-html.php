<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php if (isset($_SESSION['logado'])): ?>
<nav class="navbar navbar-dark bg-dark">
    <a href="/listar-cursos" class="navbar-brand">Home</a>
    <a href="/logout" class="navbar-brand">sair</a>
</nav>
<?php endif; ?>
<div class="container">
    <div class="jumbotron">
        <h1><?= $titulo; ?></h1>
    </div>