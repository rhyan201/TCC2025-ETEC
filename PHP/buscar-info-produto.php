<?php
header('Content-Type: application/json; charset=utf-8');
if (ob_get_length()) ob_clean();

include("conexao.php");

try {
    $categoria = $_GET['categoria'] ?? '';
    $id = $_GET['id'] ?? '';
    
    $sql = "";
    
    switch ($categoria) {
        case 'processador':
            $sql = "SELECT * FROM processador WHERE cod_processador = ?";
            break;
        case 'gpu':
            $sql = "SELECT * FROM gpu WHERE cod_gpu = ?";
            break;
        case 'motherboard':
            $sql = "SELECT * FROM motherboard WHERE cod_motherboard = ?";
            break;
        case 'memoram':
            $sql = "SELECT * FROM memoram WHERE cod_ram = ?";
            break;
        case 'memossd':
            $sql = "SELECT * FROM memossd WHERE cod_ssd = ?";
            break;
        case 'memohd':
            $sql = "SELECT * FROM memohd WHERE cod_hd = ?";
            break;
        case 'psu':
            $sql = "SELECT * FROM psu WHERE cod_psu = ?";
            break;
        case 'air_cooler':
            $sql = "SELECT * FROM air_cooler WHERE id_air = ?";
            break;
        case 'water_cooler':
            $sql = "SELECT * FROM water_cooler WHERE id_water = ?";
            break;
        default:
            echo json_encode([]);
            exit;
    }
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $produto = mysqli_fetch_assoc($result);
    
    echo json_encode($produto ?: [], JSON_UNESCAPED_UNICODE);
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Erro interno: ' . $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>