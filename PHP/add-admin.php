<?php
include "proteger-admin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar administradores</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/add-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel´="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"></link>
</head>
<body>
        <nav>
            <a href="../index.html"><img src="../IMGS/logopcmaker.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="pcmaker.php">Monte seu PC</a></li>
                    <li><a href="psucalc.php">Calculadora de Fonte</a></li>
                    <li><a href="../HTML/aboutus.html">Sobre nós</a></li>
                    <li><a href="tutoriais.php">Tutoriais</a></li>
                    <li><a href="../HTML/login-admin.html">Login</a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
<div class="main-container">
    <div class="wrapper">
    <h1>Registro de Administradores</h1>
    <form action="administrador.php?funcao=cadastrar" method="POST">
        <div class="input-box">
        <input type="text" name="nome_admin" placeholder="Nome" required>
        <i class='bx  bx-user'  ></i> 
        </div>
        <div class="input-box">
        <input type="email" name="email_admin" placeholder="Email" required>
        <i class='bx  bx-envelope-open'  ></i> 
        </div>
        <div class="input-box">
        <input type="password" name="senha" placeholder="Senha" required>
        <i class='bx bxs-lock-alt'></i>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
            <a href="restrita.php" class="voltar">Voltar</a>
    </div>
</div>
</body>
</html>