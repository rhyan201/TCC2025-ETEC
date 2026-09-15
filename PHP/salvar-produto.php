<?php
// Ativa exibição de erros (desative em produção)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = trim($_POST['tipo'] ?? '');

    if (empty($tipo)) {
        echo "<script>alert('Tipo de produto não selecionado.'); window.history.back();</script>";
        exit;
    }

    $success = false;
    $error_msg = "";
    $stmt = null;

    switch ($tipo) {
        case "processador":
            $nome = trim($_POST['nome_processador'] ?? '');
            $chipset = trim($_POST['chipset_processador'] ?? '');
            $ddr = trim($_POST['ddr_processador'] ?? '');
            $tdp = intval($_POST['tdp_processador'] ?? 0);

            if (empty($nome)) { $error_msg = "Nome do processador é obrigatório."; break; }

            $stmt = $conn->prepare("INSERT INTO processador (nome_processador, chipset_processador, ddr_processador, tdp_processador) VALUES (?, ?, ?, ?)");
            if (!$stmt) die("Erro no prepare (processador): " . $conn->error);
            $stmt->bind_param("sssi", $nome, $chipset, $ddr, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar processador: " . $stmt->error;
            break;

        case "placa_mae":
    $nome = trim($_POST['nome_mobo'] ?? '');
    $chipset = trim($_POST['chipset_mobo'] ?? '');
    $ddr = trim($_POST['ddr_mobo'] ?? '');
    $tdp = intval($_POST['tdp_mobo'] ?? 0);

    if (empty($nome)) { $error_msg = "Nome da placa mãe é obrigatório."; break; }

    // CORREÇÃO: usar o nome exato do campo com o typo
    $stmt = $conn->prepare("INSERT INTO motherboard (nome_mobo, chipset_motherborad, ddr_motherboard, tdp_motherboard) VALUES (?, ?, ?, ?)");
    if (!$stmt) die("Erro no prepare (placa_mae): " . $conn->error);
    $stmt->bind_param("sssi", $nome, $chipset, $ddr, $tdp);
    $success = $stmt->execute();
    if (!$success) $error_msg = "Erro ao cadastrar placa mãe: " . $stmt->error;
    break;

        case "psu":
            $nome = trim($_POST['nome_psu'] ?? '');
            $potencia = intval($_POST['potencia_psu'] ?? 0);
            $modular = trim($_POST['ismodular_psu'] ?? '');
            $certificado = trim($_POST['certificado_psu'] ?? '');

            if (empty($nome)) { $error_msg = "Nome da fonte é obrigatório."; break; }

            $stmt = $conn->prepare("INSERT INTO psu (nome_psu, watts_psu, ismodular, certificado) VALUES (?, ?, ?, ?)");
            if (!$stmt) die("Erro no prepare (psu): " . $conn->error);
            $stmt->bind_param("siss", $nome, $potencia, $modular, $certificado);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar fonte: " . $stmt->error;
            break;

        case "ram":
            $nome = trim($_POST['nome_ram'] ?? '');
            $capacidade_raw = $_POST['capacidade_ram'] ?? '';
            $capacidade = intval(str_replace('GB', '', $capacidade_raw));
            $ddr = trim($_POST['ddr_ram'] ?? '');
            $frequencia = intval($_POST['freq_ram'] ?? 0);
            $tdp = intval($_POST['tdp_ram'] ?? 0);

            if (empty($nome)) { $error_msg = "Nome da RAM é obrigatório."; break; }

            $stmt = $conn->prepare("INSERT INTO memoram (nome_ram, tam_ram, ddr_ram, freq_ram, tdp_ram) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) die("Erro no prepare (ram): " . $conn->error);
            $stmt->bind_param("sisii", $nome, $capacidade, $ddr, $frequencia, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar RAM: " . $stmt->error;
            break;

        case "gpu":
            $nome = trim($_POST['nome_gpu'] ?? '');
            $memoria = intval($_POST['mem_gpu'] ?? 0);
            $tdp = intval($_POST['tdp_gpu'] ?? 0);

            if (empty($nome)) { $error_msg = "Nome da GPU é obrigatório."; break; }

            $stmt = $conn->prepare("INSERT INTO gpu (nome_gpu, tam_mem_gpu, tdp_gpu) VALUES (?, ?, ?)");
            if (!$stmt) die("Erro no prepare (gpu): " . $conn->error);
            $stmt->bind_param("sii", $nome, $memoria, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar GPU: " . $stmt->error;
            break;

        case "ssd":
            $nome = trim($_POST['nome_ssd'] ?? '');
            $capacidade = intval($_POST['capacidade_ssd'] ?? 0);
            $tdp = intval($_POST['tdp_ssd'] ?? 0);

            if (empty($nome)) { $error_msg = "Nome do SSD é obrigatório."; break; }

            $stmt = $conn->prepare("INSERT INTO memossd (nome_ssd, capacidade_ssd, tdp_ssd) VALUES (?, ?, ?)");
            if (!$stmt) die("Erro no prepare (ssd): " . $conn->error);
            $stmt->bind_param("sii", $nome, $capacidade, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar SSD: " . $stmt->error;
            break;

        case "hd":
            $nome = trim($_POST['nome_hd'] ?? '');
            $capacidade = intval($_POST['capacidade_hd'] ?? 0);
            $tamanho = trim($_POST['tam_hd'] ?? '');
            $tdp = intval($_POST['tdp_hd'] ?? 0);

            if (empty($nome)) { $error_msg = "Nome do HD é obrigatório."; break; }

            $stmt = $conn->prepare("INSERT INTO memohd (nome_hd, capacidade_hd, tam_hd, tdp_hd) VALUES (?, ?, ?, ?)");
            if (!$stmt) die("Erro no prepare (hd): " . $conn->error);
            $stmt->bind_param("sisi", $nome, $capacidade, $tamanho, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar HD: " . $stmt->error;
            break;

        case "aircooler":
            $nome = trim($_POST['nome_air'] ?? '');
            $tdp = intval($_POST['tdp_cpumax_air'] ?? 0);
            // CORREÇÃO: usar o nome correto do campo do formulário
            $soquetes_raw = $_POST['soquetes_air'] ?? [];
            $soquetes = is_array($soquetes_raw) ? implode(", ", $soquetes_raw) : '';

            if (empty($nome)) { 
                $error_msg = "Nome do aircooler é obrigatório."; 
                break; 
            }

            $stmt = $conn->prepare("INSERT INTO air_cooler (nome_air, suporte_air, tdp_cpumax_air) VALUES (?, ?, ?)");
            if (!$stmt) die("Erro no prepare (aircooler): " . $conn->error);
            $stmt->bind_param("ssi", $nome, $soquetes, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar aircooler: " . $stmt->error;
            break;

        case "watercooler":
            $nome = trim($_POST['nome_water'] ?? '');
            $tdp = intval($_POST['tdp_cpumax_water'] ?? 0);
            // CORREÇÃO: usar o nome correto do campo do formulário
            $soquetes_raw = $_POST['soquetes_water'] ?? [];
            $soquetes = is_array($soquetes_raw) ? implode(", ", $soquetes_raw) : '';

            if (empty($nome)) { 
                $error_msg = "Nome do watercooler é obrigatório."; 
                break; 
            }

            $stmt = $conn->prepare("INSERT INTO water_cooler (nome_water, suporte_water, tdp_cpumax_water) VALUES (?, ?, ?)");
            if (!$stmt) die("Erro no prepare (water_cooler): " . $conn->error);
            $stmt->bind_param("ssi", $nome, $soquetes, $tdp);
            $success = $stmt->execute();
            if (!$success) $error_msg = "Erro ao cadastrar watercooler: " . $stmt->error;
            break;

        default:
            $error_msg = "Tipo de produto inválido: $tipo";
            break;
    }

    if ($stmt) $stmt->close();

    if ($success) {
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='registro-produtos.php';</script>";
    } else {
        echo "<script>alert('Erro: " . addslashes($error_msg ?: 'Falha desconhecida.') . "'); window.history.back();</script>";
    }

    $conn->close();
} else {
    echo "<script>window.location.href='registro-produtos.php';</script>";
}
?>