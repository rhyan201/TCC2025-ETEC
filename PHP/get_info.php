New

Share


36 lines

<?php
require_once __DIR__ . '/conexao.php';
if (isset($_GET['tipo']) && isset($_GET['id'])) {
    $tipo = $_GET['tipo'];
    $id = intval($_GET['id']);  // Garante que o ID seja um inteiro
    // Mapeia o nome da tabela e da coluna ID
    $map = [
        "processador" => ["tabela" => "processador", "idcol" => "cod_processador"],
        "motherboard" => ["tabela" => "motherboard", "idcol" => "cod_motherboard"],
        "ram" => ["tabela" => "memoram", "idcol" => "cod_ram"],
        "gpu" => ["tabela" => "gpu", "idcol" => "cod_gpu"],
        "hd" => ["tabela" => "memohd", "idcol" => "cod_hd"],
        "ssd" => ["tabela" => "memossd", "idcol" => "cod_ssd"],
        "psu" => ["tabela" => "psu", "idcol" => "cod_psu"],
    ];
    if (!array_key_exists($tipo, $map)) {
        echo json_encode(["erro" => "Tipo inválido"]);
        exit;
    }
    $tabela = $map[$tipo]["tabela"];
    $coluna = $map[$tipo]["idcol"];
    $query = mysqli_query($conn, "SELECT * FROM $tabela WHERE $coluna = $id");
    $dados = mysqli_fetch_assoc($query);
    echo json_encode($dados, JSON_UNESCAPED_UNICODE);
}
?>
