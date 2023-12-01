<?php session_start(); ?>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/home/index">Ínicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/produto/index">Produto</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <?php if ($_SESSION['tipo'] == 'A'): ?>
    <li class="nav-item">
        <a class="nav-link" href="/usuario/index">Usuário</a>
    </li>
    <?php endif ?>
</ul>