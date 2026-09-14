<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Peças</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/registro-produtos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .atributos { display: none; margin-top: 10px; }
        label { display: block; margin-top: 5px; }
    </style>
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
            <h1>Cadastro de Peças</h1>
            <div class="input-box">
                <form method="POST" action="salvar-produto.php">
                    <label id="tipodeproduto">Tipo de Produto</label>
                    <select id="tipoProduto" name="tipo" required>
                        <option value="">Selecione</option>
                        <option value="ram">Memória RAM</option>
                        <option value="processador">Processador</option>
                        <option value="placa_mae">Placa Mãe</option>
                        <option value="gpu">Placa de Vídeo</option>
                        <option value="ssd">SSD</option>
                        <option value="hd">HD</option>
                        <option value="psu">Fonte</option>
                        <option value="aircooler">Air Cooler</option>
                        <option value="watercooler">Water Cooler</option>
                    </select>

                    <!-- Processador -->
                    <div id="processador" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_processador">

                        <label for="chipset_processador">Chipset</label>
                        <select id="chipset_processador" name="chipset_processador" required>
                            <optgroup label="Intel">
                                <option value="LGA1151">LGA1151</option>
                                <option value="LGA1200">LGA1200</option>
                                <option value="LGA1700">LGA1700</option>
                            </optgroup>
                            <optgroup label="AMD">
                                <option value="AM4">AM4</option>
                                <option value="AM5">AM5</option>
                            </optgroup>
                        </select>

                        <label for="ddr_processador">DDR do Processador</label>
                        <select id="ddr_processador" name="ddr_processador" required>
                            <option value="DDR4">DDR4</option>
                            <option value="DDR5">DDR5</option>
                        </select>

                        <label>TDP</label>
                        <input type="number" name="tdp_processador">
                    </div>

                    <!-- RAM -->
                    <div id="ram" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_ram">

                        <label for="capacidade_ram">Capacidade (GB)</label>
                        <select id="capacidade_ram" name="capacidade_ram" required>
                            <option value="4GB">4GB</option>
                            <option value="8GB">8GB</option>
                            <option value="16GB">16GB</option>
                            <option value="32GB">32GB</option>
                        </select>

                        <label for="ddr_ram">DDR da RAM</label>
                        <select id="ddr_ram" name="ddr_ram" required>
                            <option value="DDR4">DDR4</option>
                            <option value="DDR5">DDR5</option>
                        </select>

                        <label for="freq_ram">Frequência da RAM (MHz)</label>
                        <select id="freq_ram" name="freq_ram" required>
                            <option value="2666">2666</option>
                            <option value="3000">3000</option>
                            <option value="3200">3200</option>
                            <option value="3600">3600</option>
                        </select>

                        <label>TDP (W)</label>
                        <input type="number" name="tdp_ram">
                    </div>

                                        <!-- Placa-Mãe -->
                    <div id="placa_mae" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_mobo">

                        <label for="chipset_mobo">Chipset</label>
                        <select id="chipset_mobo" name="chipset_mobo" required>
                            <optgroup label="Intel">
                                <option value="LGA1151">LGA1151</option>
                                <option value="LGA1200">LGA1200</option>
                                <option value="LGA1700">LGA1700</option>
                            </optgroup>
                            <optgroup label="AMD">
                                <option value="AM4">AM4</option>
                                <option value="AM5">AM5</option>
                            </optgroup>
                        </select>

                        <label for="ddr_mobo">DDR da Placa-Mãe</label>
                        <select id="ddr_mobo" name="ddr_mobo" required>
                            <option value="DDR4">DDR4</option>
                            <option value="DDR5">DDR5</option>
                        </select>

                        <label for="tdp_mobo">TDP</label>
                        <input type="number" name="tdp_mobo">
                    </div>

                    <!-- Fonte -->
                    <div id="psu" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_psu">

                        <label for="potencia_psu">Potência</label>
                        <select name="potencia_psu" id="potencia_psu">
                            <option value="400">400W</option>
                            <option value="500">500W</option>
                            <option value="650">650W</option>
                            <option value="750">750W</option>
                            <option value="1000">1000W</option>
                        </select>

                        <label for="ismodular_psu">Modular?</label>
                        <select id="ismodular_psu" name="ismodular_psu" required>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>

                        <label for="certificado_psu">Certificado</label>
                        <select name="certificado_psu" id="certificado_psu">
                            <option value="80simples">80+</option>
                            <option value="80bronze">80+ Bronze</option>
                            <option value="80silver">80+ Silver</option>
                            <option value="80gold">80+ Gold</option>
                        </select>
                    </div>

                    <!-- Placa de Vídeo -->
                    <div id="gpu" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_gpu">

                        <label for="mem_gpu">Memória da GPU</label>
                        <select name="mem_gpu" id="mem_gpu">
                            <option value="4">4GB</option>
                            <option value="6">6GB</option>
                            <option value="8">8GB</option>
                            <option value="10">10GB</option>
                            <option value="12">12GB</option>
                            <option value="16">16GB</option>
                        </select>

                        <label>TDP</label>
                        <input type="number" name="tdp_gpu">
                    </div>

                    <!-- SSD -->
                    <div id="ssd" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_ssd">

                        <label for="capacidade_ssd">Capacidade SSD</label>
                        <select name="capacidade_ssd" id="capacidade_ssd">
                            <option value="120">120GB</option>
                            <option value="240">240GB</option>
                            <option value="480">480GB</option>
                            <option value="512">512GB</option>
                            <option value="960">960GB</option>
                            <option value="1024">1024GB</option>
                        </select>

                        <label>TDP (W)</label>  <!-- Novo campo -->
                        <input type="number" name="tdp_ssd">
                    </div>

                    <!-- HD -->
                    <div id="hd" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_hd">

                        <label for="capacidade_hd">Capacidade HD</label>
                        <select name="capacidade_hd" id="capacidade_hd">
                            <option value="500">500GB</option>
                            <option value="1000">1000GB</option>
                            <option value="2000">2000GB</option>
                        </select>

                        <label for="tam_hd">Tamanho</label>
                        <select name="tam_hd" id="tam_hd">
                            <option value="2.5">2,5''</option>
                            <option value="3.5">3,5''</option>
                        </select>

                        <label>TDP (W)</label>  <!-- Novo campo -->
                        <input type="number" name="tdp_hd">
                    </div>

                    <!-- Air Cooler -->
                    <div id="aircooler" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_air">
                        
                        <label>TDP Máximo (W)</label>
                        <input type="number" name="tdp_cpumax_air">
                        
                        <div class="checkbox-group">
                            <label>Soquetes compatíveis:</label>
                            <label><input type="checkbox" name="soquetes_air[]" value="AM4"> AM4</label>
                            <label><input type="checkbox" name="soquetes_air[]" value="AM5"> AM5</label>
                            <label><input type="checkbox" name="soquetes_air[]" value="LGA1151"> LGA 1151</label>
                            <label><input type="checkbox" name="soquetes_air[]" value="LGA1200"> LGA1200</label>
                            <label><input type="checkbox" name="soquetes_air[]" value="LGA1700"> LGA1700</label>
                        </div>
                    </div>

                    <!-- Water Cooler -->
                    <div id="watercooler" class="atributos">
                        <label>Nome</label>
                        <input type="text" name="nome_water">
                        
                        <label>TDP Máximo (W)</label>
                        <input type="number" name="tdp_cpumax_water">
                        
                        <div class="checkbox-group">
                            <label>Soquetes compatíveis:</label>
                            <label><input type="checkbox" name="soquetes_water[]" value="AM4"> AM4</label>
                            <label><input type="checkbox" name="soquetes_water[]" value="AM5"> AM5</label>
                            <label><input type="checkbox" name="soquetes_water[]" value="LGA1151"> LGA 1151</label>
                            <label><input type="checkbox" name="soquetes_water[]" value="LGA1200"> LGA1200</label>
                            <label><input type="checkbox" name="soquetes_water[]" value="LGA1700"> LGA1700</label>
                        </div>
                    </div>

                    <button type="submit">Cadastrar</button>
                    <br>
                    <a href="restrita.php" class="voltar">Voltar</a>
                </form>
            </div>
            
            <script>
                const select = document.getElementById("tipoProduto");
                const atributos = document.querySelectorAll(".atributos");

                select.addEventListener("change", function() {
                    atributos.forEach(div => div.style.display = "none"); // Esconde todos
                    const escolhido = document.getElementById(this.value);
                    if (escolhido) escolhido.style.display = "block"; // Mostra o escolhido
                });
            </script>
        </div>
    </div>
</body>
</html>
