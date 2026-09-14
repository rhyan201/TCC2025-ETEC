<?php
session_start();

// Verificar se o admin está logado
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header("Location: ../HTML/login-admin.html");
    exit;
}

$id_admin = $_SESSION['id_admin'] ?? '';
$admin_nome = $_SESSION['nome_admin'] ?? '';    
$admin_email = $_SESSION['email_admin'] ?? '';  
?>