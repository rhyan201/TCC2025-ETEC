<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Montagem Virtual de PC</title>
    <link rel="stylesheet" href="../CSS/pcmaker.css">
</head>
<body>
<h1>Montagem Virtual de PC</h1>

<div class="wrapper">
    <!-- WRAPPER 1: Seleção de peças -->
    <div class="selecionar-pecas">
        <h2>Selecione suas peças</h2>

        <!-- Processador -->
        <div id="processador" class="atributos">
            <label>Nome</label>
            <select id="select_processador" name="nome_processador">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM processador");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_processador']}' 
                               data-chipset='{$row['chipset_processador']}' 
                               data-ddr='{$row['ddr_processador']}' 
                               data-tdp='{$row['tdp_processador']}'>";
                    echo $row['nome_processador'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- RAM -->
        <div id="ram" class="atributos">
            <label>Nome</label>
            <select id="select_ram" name="nome_ram">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM memoram");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_ram']}' 
                               data-ddr='{$row['ddr_ram']}' 
                               data-capacidade='{$row['tam_ram']}' 
                               data-freq='{$row['freq_ram']}' 
                               data-tdp='{$row['tdp_ram']}'>";
                    echo $row['nome_ram'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Placa-Mãe -->
        <div id="placa_mae" class="atributos">
            <label>Nome</label>
            <select id="select_mobo" name="nome_mobo">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM motherboard");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_mobo']}' 
                               data-chipset='{$row['chipset_motherborad']}' 
                               data-ddr='{$row['ddr_motherboard']}' 
                               data-tdp='{$row['tdp_motherboard']}'>";
                    echo $row['nome_mobo'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Fonte -->
        <div id="psu" class="atributos">
            <label>Nome</label>
            <select id="select_psu" name="nome_psu">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM psu");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_psu']}' 
                               data-potencia='{$row['watts_psu']}' 
                               data-modular='{$row['ismodular']}' 
                               data-certificado='{$row['certificado_psu']}'>";
                    echo $row['nome_psu'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- GPU -->
        <div id="gpu" class="atributos">
            <label>Nome</label>
            <select id="select_gpu" name="nome_gpu">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM gpu");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_gpu']}' 
                               data-memoria='{$row['tam_mem_gpu']}' 
                               data-tdp='{$row['tdp_gpu']}'>";
                    echo $row['nome_gpu'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- SSD -->
        <div id="ssd" class="atributos">
            <label>Nome</label>
            <select id="select_ssd" name="nome_ssd">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM memossd");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_ssd']}' 
                               data-capacidade='{$row['capacidade_ssd']}'>";
                    echo $row['nome_ssd'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- HD -->
        <div id="hd" class="atributos">
            <label>Nome</label>
            <select id="select_hd" name="nome_hd">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM memohd");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_hd']}' 
                               data-capacidade='{$row['capacidade_hd']}' 
                               data-tam='{$row['tam_hd']}'>";
                    echo $row['nome_hd'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Water Cooler -->
        <div id="watercooler" class="atributos">
            <label>Nome</label>
            <select id="select_water" name="nome_water">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM water_cooler");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_water']}'>";
                    echo $row['nome_water'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Air Cooler -->
        <div id="aircooler" class="atributos">
            <label>Nome</label>
            <select id="select_air" name="nome_air">
                <option value="">Selecione...</option>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM air_cooler");
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$row['nome_air']}'>";
                    echo $row['nome_air'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>

    </div>

    <!-- WRAPPER 2: Resumo das peças selecionadas -->
    <div class="resumo-pecas">
        <h2>Peças Selecionadas</h2>
        <ul id="resumoLista">
            <li><strong>Processador:</strong> <span id="resumo_processador">Nenhum</span></li>
            <li><strong>RAM:</strong> <span id="resumo_ram">Nenhum</span></li>
            <li><strong>Placa-Mãe:</strong> <span id="resumo_mobo">Nenhum</span></li>
            <li><strong>Fonte:</strong> <span id="resumo_psu">Nenhum</span></li>
            <li><strong>GPU:</strong> <span id="resumo_gpu">Nenhum</span></li>
            <li><strong>SSD:</strong> <span id="resumo_ssd">Nenhum</span></li>
            <li><strong>HD:</strong> <span id="resumo_hd">Nenhum</span></li>
            <li><strong>Water Cooler:</strong> <span id="resumo_water">Nenhum</span></li>
            <li><strong>Air Cooler:</strong> <span id="resumo_air">Nenhum</span></li>
        </ul>
    </div>
</div>

<!-- Incluindo JS externo -->
<script src="../JS/pcmakerscript.js"></script>

</body>
</html>
