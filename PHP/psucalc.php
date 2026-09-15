<?php
require_once __DIR__ . '/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Fonte</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/psucalc.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
            <div class="input-box">
                <h1>Calculadora de Fonte</h1>
                <br>

                <h2>Selecione um Processador</h2>
                <select name="select" id="processador_pc">
                    <option value="">Selecione...</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM processador");
                    while($dados = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $dados['cod_processador']; ?>"
                                data-tdp="<?php echo $dados['tdp_processador']; ?>">
                            <?php echo $dados['nome_processador']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <h2>Selecione uma Placa Mãe</h2>
                <select name="select" id="motherboard_pc">
                    <option value="">Selecione...</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM motherboard");
                    while($dados = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $dados['cod_motherboard']; ?>"
                                data-tdp="<?php echo $dados['tdp_motherboard']; ?>">
                            <?php echo $dados['nome_mobo']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <h2>Selecione uma Memória RAM</h2>
                <select name="select" id="ram_pc">
                    <option value="">Selecione...</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM memoram ");
                    while($dados = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $dados['cod_ram']; ?>"
                                data-tdp="<?php echo $dados['tdp_ram']; ?>">
                            <?php echo $dados['nome_ram']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <h2>Selecione uma Placa de Vídeo</h2>
                <select name="select" id="gpu_pc">
                    <option value="">Selecione...</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM gpu");
                    while($dados = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $dados['cod_gpu']; ?>"
                                data-tdp="<?php echo $dados['tdp_gpu']; ?>">
                            <?php echo $dados['nome_gpu']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <h2>Selecione um HD</h2>
                <select name="select" id="hd_pc">
                    <option value="">Selecione...</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM memohd");
                    while($dados = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $dados['cod_hd']; ?>"
                                data-tdp="<?php echo $dados['tdp_hd']; ?>">
                            <?php echo $dados['nome_hd']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <br>
                <h2>Selecione um SSD</h2>
                <select name="select" id="ssd_pc">
                    <option value="">Selecione...</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM memossd");
                    while($dados = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $dados['cod_ssd']; ?>"
                                data-tdp="<?php echo $dados['tdp_ssd']; ?>">
                            <?php echo $dados['nome_ssd']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="wrapper2">
            <h1>TDP do seu PC:</h1>
            <br>

            <h2>Processador:</h2>
            <p id="res-processador" style="display: none;"></p>
            <p id="tdp-processador" class="tdp-info" style="display: none;"></p>
            <br>

            <h2>Placa Mãe:</h2>
            <p id="res-mobo" style="display: none;"></p>
            <p id="tdp-mobo" class="tdp-info" style="display: none;"></p>
            <br>

            <h2>Memória RAM:</h2>
            <p id="res-ram" style="display: none;"></p>
            <p id="tdp-ram" class="tdp-info" style="display: none;"></p>
            <br>

            <h2>Placa de Vídeo:</h2>
            <p id="res-gpu" style="display: none;"></p>
            <p id="tdp-gpu" class="tdp-info" style="display: none;"></p>
            <br>

            <h2>HD:</h2>
            <p id="res-hd" style="display: none;"></p>
            <p id="tdp-hd" class="tdp-info" style="display: none;"></p>
            <br>

            <h2>SSD:</h2>
            <p id="res-ssd" style="display: none;"></p>
            <p id="tdp-ssd" class="tdp-info" style="display: none;"></p>
            <br>

            <h2>TDP Total Estimado:</h2>
            <p id="total-tdp">TDP Total: 0W</p>
        </div>
    </div>

    <script>
        async function atualizarResultado() {
            function atualizar(selectId, resId, tdpId) {
                const select = document.getElementById(selectId);
                const selectedOption = select.options[select.selectedIndex];
                const nome = selectedOption.text;
                const tdp = selectedOption.getAttribute("data-tdp") || "0";

                if (tdp !== "0") {
                    document.getElementById(resId).innerText = nome;
                    document.getElementById(tdpId).innerText = "TDP: " + tdp + "W";
                    document.getElementById(resId).style.display = "block";
                    document.getElementById(tdpId).style.display = "block";
                } else {
                    document.getElementById(resId).style.display = "none";
                    document.getElementById(tdpId).style.display = "none";
                }

                return parseFloat(tdp);
            }

            const tdpProcessador = atualizar("processador_pc", "res-processador", "tdp-processador");
            const tdpMobo = atualizar("motherboard_pc", "res-mobo", "tdp-mobo");
            const tdpRam = atualizar("ram_pc", "res-ram", "tdp-ram");
            const tdpGpu = atualizar("gpu_pc", "res-gpu", "tdp-gpu");
            const tdpHd = atualizar("hd_pc", "res-hd", "tdp-hd");
            const tdpSsd = atualizar("ssd_pc", "res-ssd", "tdp-ssd");

            const totalTDP = tdpProcessador + tdpMobo + tdpRam + tdpGpu + tdpHd + tdpSsd;
            const totalComMargem = totalTDP * 1.2;  // 20% de margem
            document.getElementById("total-tdp").innerText = "TDP Total Estimado: " + totalTDP.toFixed(2) + "W. É recomendado uma fonte acima de " + totalComMargem.toFixed(2) + "W)";

            // Busca opções de PSU
                    const response = await fetch(`../PHP/get_psu_options.php?min_wattage=${Math.ceil(totalComMargem)}`);
            const psuData = await response.json();

            let psuHtml = "<ul>";
            if (psuData.length > 0) {
                psuData.forEach(psu => {
                    psuHtml += `<li>${psu.nome_psu} - ${psu.wattage_psu}W</li>`;
                });
            } else {
                psuHtml += "<li>Nenhuma fonte recomendada encontrada.</li>";
            }
            psuHtml += "</ul>";
            document.getElementById("res-psu-suggestions").innerHTML = psuHtml;
        }

        document.querySelectorAll("select").forEach(select => {
            select.addEventListener("change", atualizarResultado);
        });

        atualizarResultado();  // Inicializa
    </script>
</body>
</html>