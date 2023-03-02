<?php
require('twig_carregar.php');

$template = $twig->load('teste.html');

echo $template->render([
    'titulo' => 'Carlos',
    'nome' => 'Pedro',
    'idade' => '17',
]);
?>