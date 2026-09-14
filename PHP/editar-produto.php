<?php
header('Content-Type: application/json; charset=utf-8');
if (ob_get_length()) ob_clean();

include("conexao.php");

try {
    $categoria = $_POST['categoria'] ?? '';
    $id = $_POST['id'] ?? '';
    
    if (empty($categoria) || empty($id)) {
        echo json_encode(['success' => false, 'message' => 'Categoria ou ID não informados']);
        exit;
    }
    
    // Construir a query de update dinamicamente
    $updateFields = [];
    $params = [];
    $types = '';
    
    switch ($categoria) {
        case 'processador':
            $table = 'processador';
            $idField = 'cod_processador';
            $fields = ['nome_processador', 'chipset_processador', 'ddr_processador', 'tdp_processador'];
            break;
        case 'gpu':
            $table = 'gpu';
            $idField = 'cod_gpu';
            $fields = ['nome_gpu', 'tam_mem_gpu', 'tdp_gpu'];
            break;
        case 'motherboard':
            $table = 'motherboard';
            $idField = 'cod_motherboard';
            $fields = ['nome_mobo', 'chipset_motherborad', 'ddr_motherboard', 'tdp_motherboard'];
            break;
        case 'memoram':
            $table = 'memoram';
            $idField = 'cod_ram';
            $fields = ['nome_ram', 'ddr_ram', 'freq_ram', 'tam_ram', 'tdp_ram'];
            break;
        case 'memossd':
            $table = 'memossd';
            $idField = 'cod_ssd';
            $fields = ['nome_ssd', 'capacidade_ssd', 'tdp_ssd'];
            break;
        case 'memohd':
            $table = 'memohd';
            $idField = 'cod_hd';
            $fields = ['nome_hd', 'capacidade_hd', 'tam_hd', 'tdp_hd'];
            break;
        case 'psu':
            $table = 'psu';
            $idField = 'cod_psu';
            $fields = ['nome_psu', 'watts_psu', 'certificado', 'ismodular'];
            break;
        case 'air_cooler':
            $table = 'air_cooler';
            $idField = 'id_air';
            $fields = ['nome_air', 'suporte_air', 'tdp_cpumax_air'];
            break;
        case 'water_cooler':
            $table = 'water_cooler';
            $idField = 'id_water';
            $fields = ['nome_water', 'suporte_water', 'tdp_cpumax_water'];
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Categoria inválida']);
            exit;
    }
    
    // Construir os campos para update
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $updateFields[] = "$field = ?";
            $params[] = $_POST[$field];
            $types .= 's'; // todos são strings
        }
    }
    
    if (empty($updateFields)) {
        echo json_encode(['success' => false, 'message' => 'Nenhum campo para atualizar']);
        exit;
    }
    
    // Adicionar o ID como último parâmetro
    $params[] = $id;
    $types .= 'i'; // ID é inteiro
    
    $sql = "UPDATE $table SET " . implode(', ', $updateFields) . " WHERE $idField = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$params);
    $success = mysqli_stmt_execute($stmt);
    
    if ($success && mysqli_stmt_affected_rows($stmt) > 0) {
        echo json_encode(['success' => true, 'message' => 'Produto atualizado com sucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nenhuma alteração realizada ou produto não encontrado']);
    }
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro interno: ' . $e->getMessage()]);
}

mysqli_close($conn);
exit;
?>