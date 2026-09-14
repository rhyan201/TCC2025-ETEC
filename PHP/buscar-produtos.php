<?php
header('Content-Type: application/json; charset=utf-8');
if (ob_get_length()) ob_clean();

include("conexao.php");

try {
    $categoria = $_GET['categoria'] ?? '';
    
    if (empty($categoria)) {
        echo json_encode([]);
        exit;
    }
    
    $produtos = [];
    $sql = "";
    
    switch ($categoria) {
        case 'processador':
            $sql = "SELECT cod_processador as id, nome_processador as nome FROM processador";
            break;
        case 'gpu':
            $sql = "SELECT cod_gpu as id, nome_gpu as nome FROM gpu";
            break;
        case 'motherboard':
            $sql = "SELECT cod_motherboard as id, nome_mobo as nome FROM motherboard";
            break;
        case 'memoram':
            $sql = "SELECT cod_ram as id, nome_ram as nome FROM memoram";
            break;
        case 'memossd':
            $sql = "SELECT cod_ssd as id, nome_ssd as nome FROM memossd";
            break;
        case 'memohd':
            $sql = "SELECT cod_hd as id, nome_hd as nome FROM memohd";
            break;
        case 'psu':
            $sql = "SELECT cod_psu as id, nome_psu as nome FROM psu";
            break;
        case 'air_cooler':
            $sql = "SELECT id_air as id, nome_air as nome FROM air_cooler";
            break;
        case 'water_cooler':
            $sql = "SELECT id_water as id, nome_water as nome FROM water_cooler";
            break;
        default:
            echo json_encode(['error' => 'Categoria inválida']);
            exit;
    }
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $produtos[] = $row;
        }
        echo json_encode($produtos, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['error' => 'Erro na consulta SQL: ' . mysqli_error($conn)]);
    }
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Erro interno: ' . $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>