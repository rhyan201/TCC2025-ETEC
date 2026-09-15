<?php
header('Content-Type: application/json; charset=utf-8');
if (ob_get_length()) ob_clean();

require_once __DIR__ . '/conexao.php';

try {
    $categoria = $_POST['categoria'] ?? '';
    $id = $_POST['id'] ?? '';
    
    $sql = "";
    
    switch ($categoria) {
        case 'processador':
            $sql = "DELETE FROM processador WHERE cod_processador = ?";
            break;
        case 'gpu':
            $sql = "DELETE FROM gpu WHERE cod_gpu = ?";
            break;
        case 'motherboard':
            $sql = "DELETE FROM motherboard WHERE cod_motherboard = ?";
            break;
        case 'memoram':
            $sql = "DELETE FROM memoram WHERE cod_ram = ?";
            break;
        case 'memossd':
            $sql = "DELETE FROM memossd WHERE cod_ssd = ?";
            break;
        case 'memohd':
            $sql = "DELETE FROM memohd WHERE cod_hd = ?";
            break;
        case 'psu':
            $sql = "DELETE FROM psu WHERE cod_psu = ?";
            break;
        case 'air_cooler':
            $sql = "DELETE FROM air_cooler WHERE id_air = ?";
            break;
        case 'water_cooler':
            $sql = "DELETE FROM water_cooler WHERE id_water = ?";
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Categoria inválida']);
            exit;
    }
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $success = mysqli_stmt_execute($stmt);
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    
    if ($success && $affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Produto excluído com sucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Produto não encontrado ou erro na exclusão']);
    }
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro interno: ' . $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>