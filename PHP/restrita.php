<?php
include "proteger-admin.php";
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do administrador</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/restrita.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<nav>
    <a href="../index.html"><img src="../IMGS/logopcmaker.png"></a>
        <div class="nav-links" id="navLinks">
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
</nav>
<div class="main-container">
    <div class="wrapper">
        <div class="welcome-message">
            <h1>Bem-vindo, <span class="admin-name"><?php echo htmlspecialchars($admin_nome); ?></span>!</h1>
            <p>O que você gostaria de fazer hoje?</p>
        </div>
        
        <a href="add-admin.php"><h1>Adicionar administradores <i class='bx  bx-user'></i> </h1></a> 
        <br>
        <a href="registro-produtos.php"><h1>Adicionar produtos <i class='bx  bx-list-plus' ></i></h1></a>
        <br>
        <a href="excluir-produtos.php"><h1>Excluir produtos <i class="fa-solid fa-trash"></i></h1></a>
        <br>
        <a href="visualizar-produtos.php"><h1>Visualizar produtos <i class="fa-solid fa-eye"></i></h1></a>
        
        <div class="logout-section">
            <a href="logout.php" class="btn-logout">Sair</a>
        </div>
    </div>
</div>
</body>
</html>