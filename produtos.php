<?php
require('twig_carregar.php');

$template = $twig->load('produtos.html');

$produtos = [
    [
        'nome' => 'Chinelo',
        'preco' => 30,
    ],
    [
        'nome' => 'Camiseta',
        'preco' => 50,
    ],
    [
        'nome' => 'Boné',
        'preco' => 39.9,
    ],
    [
        'nome' => 'Automóvel Simples',
        'preco' => 35000,
    ]
];


echo $template->render([
    'titulo' => 'Produtos',
    'produtos' => $produtos,
]);
