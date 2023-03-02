<?php
$user = $_POST['user'];
$password = $_POST['password'];

if ($user == 'pedro' && $password == '123'){
    //Login feito com sucesso 
    header('location:boasvindas.php');
    die;
} else {
    //Falha no login
    header('location:login.php?erro=1');
    die;
}

?>