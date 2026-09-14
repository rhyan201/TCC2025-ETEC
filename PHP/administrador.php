<?php
include('conexao.php');
session_start();

$funcao = $_GET["funcao"] ?? '';

if ($funcao == "cadastrar") {
    $email_admin = $_POST['email_admin'];  
    $nome_admin = $_POST['nome_admin']; 
    $senha = $_POST['senha'];
    
    $insere = mysqli_query($conn, "INSERT INTO admin(nome_admin, email_admin, senha) VALUES ('$nome_admin','$email_admin','$senha')");

    if ($insere) {
        echo "<script>alert('Cadastro realizado com sucesso!!'); location.href='restrita.php'; </script>";
    } else {
        echo "<script>alert('Não foi possível inserir os dados!!');history.back();</script>";
    }
}

if ($funcao == "logar") {
    $email_admin = $_POST['email'];
    $senha = $_POST['senha'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE email_admin='$email_admin' AND senha='$senha'");
    
    if (mysqli_num_rows($query) == 1) {
        $admin = mysqli_fetch_assoc($query);
        
}
        $_SESSION['admin_logado'] = true;
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['nome_admin'] = $admin['nome_admin'];    
        $_SESSION['email_admin'] = $admin['email_admin'];  
        
        echo "<script>alert('Login realizado com sucesso!!');location.href='restrita.php';</script>";
    } else {
        echo "<script>alert('Usuário ou senha incorretos!!');history.back();</script>";
    }
