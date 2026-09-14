<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monte seu computador</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/pcmaker.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"></link>
    <style>
.mensagem-cooler {
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    font-weight: bold;
    text-align: center;
    display: none;
}

.mensagem-info {
    background-color: #e6f7ff;
    color: #0066cc;
    border: 2px solid #b3e0ff;
}

select:disabled {
    background-color: #f5f5f5;
    color: #999;
    cursor: not-allowed;
}
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
    <div class="input-box">
    <h1>Monte seu computador</h1>
    <br>
    <h2>Selecione um Processador</h2>

<select name="select" id="processador_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM processador");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_processador'];?>" 
          data-ddr="<?php echo $dados['ddr_processador'] ?? '';?>"
          data-chipset="<?php echo $dados['chipset_processador'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_processador'] ?? '';?>">
    <?php echo $dados['nome_processador'];?>
  </option>
<?php } ?>
</select>

<br>
    <h2>Selecione uma Placa Mãe</h2>

<select name="select" id="motherboard_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM motherboard");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_motherboard'];?>" 
          data-ddr="<?php echo $dados['ddr_motherboard'] ?? '';?>"
          data-chipset="<?php echo $dados['chipset_motherborad'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_motherboard'] ?? '';?>">
    <?php echo $dados['nome_mobo'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione uma Memória RAM</h2>

<select name="select" id="ram_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM memoram");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_ram'];?>" 
          data-ddr="<?php echo $dados['ddr_ram'] ?? '';?>"
          data-freq="<?php echo $dados['freq_ram'] ?? '';?>"
          data-tam="<?php echo $dados['tam_ram'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_ram'] ?? '';?>">
    <?php echo $dados['nome_ram'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione uma Placa de Vídeo</h2>

<select name="select" id="gpu_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM gpu");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_gpu'];?>" 
          data-tam_mem="<?php echo $dados['tam_mem_gpu'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_gpu'] ?? '';?>">
    <?php echo $dados['nome_gpu'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione um HD</h2>

<select name="select" id="hd_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM memohd");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_hd'];?>" 
          data-capacidade="<?php echo $dados['capacidade_hd'] ?? '';?>"
          data-tam="<?php echo $dados['tam_hd'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_hd'] ?? '';?>">
    <?php echo $dados['nome_hd'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione um SSD</h2>

<select name="select" id="ssd_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM memossd");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_ssd'];?>" 
          data-capacidade="<?php echo $dados['capacidade_ssd'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_ssd'] ?? '';?>">
    <?php echo $dados['nome_ssd'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione uma Fonte de Alimentação</h2>

<select name="select" id="psu_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM psu");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['cod_psu'];?>" 
          data-watts="<?php echo $dados['watts_psu'] ?? '';?>"
          data-certificado="<?php echo $dados['certificado'] ?? '';?>"
          data-ismodular="<?php echo $dados['ismodular'] ?? '';?>">
    <?php echo $dados['nome_psu'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione um Air Cooler</h2>

<select name="select" id="air_cooler_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM air_cooler");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['id_air'];?>" 
          data-suporte="<?php echo $dados['suporte_air'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_cpumax_air'] ?? '';?>">
    <?php echo $dados['nome_air'];?>
  </option>
<?php } ?>
</select>
<br>
    <h2>Selecione um Water Cooler</h2>

<select name="select" id="water_cooler_pc">
<option value="">Selecione...</option>
 <?php
	$query = mysqli_query($conn,"SELECT * FROM water_cooler");
	while($dados=mysqli_fetch_array($query)){
  ?>
  <option value="<?php echo $dados['id_water'];?>" 
          data-suporte="<?php echo $dados['suporte_water'] ?? '';?>"
          data-tdp="<?php echo $dados['tdp_cpumax_water'] ?? '';?>">
    <?php echo $dados['nome_water'];?>
  </option>
<?php } ?>
</select>

<div id="mensagem-cooler" class="mensagem-cooler"></div>
 
</div>
</div>
    
<div class="wrapper2">
    <h1>Resumo da sua configuração:</h1>
    <br>
    
    <h2>Processador:</h2>
    <p id="res-processador">-</p>
    <br>
    
    <h2>Placa Mãe:</h2>
    <p id="res-mobo">-</p>
    <br>
    
    <h2>Memória RAM:</h2>
    <p id="res-ram">-</p>
    <br>
    
    <h2>Placa de Video:</h2>
    <p id="res-gpu">-</p>
    <br>
    
    <h2>HD:</h2>
    <p id="res-hd">-</p>
    <br>
    
    <h2>SSD:</h2>
    <p id="res-ssd">-</p>
    <br>
    
    <h2>Fonte:</h2>  
    <p id="res-psu">-</p>
    <br>
    
    <h2>Air Cooler:</h2>
    <p id="res-air-cooler">-</p>
    <br>
    
    <h2>Water Cooler:</h2>
    <p id="res-water-cooler">-</p>
    <br>
    
    <div id="compatibilidade">
        <h2>Status de Compatibilidade:</h2>
        <div id="compatibilidade-resultados">
            <!-- As mensagens de compatibilidade aparecerão aqui -->
        </div>
    </div>
</div>
    
</div>

<script>
// Objeto para armazenar os dados das peças selecionadas
let pecasSelecionadas = {
    processador: null,
    motherboard: null,
    ram: null,
    gpu: null,
    hd: null,
    ssd: null,
    psu: null,
    air_cooler: null,
    water_cooler: null
};

function formatarInformacoes(option, campos) {
    let info = [];
    for (let campo of campos) {
        const valor = option.getAttribute(campo.attr);
        if (valor && valor !== '' && valor !== 'null') {
            info.push(`${campo.label}: ${valor}${campo.unidade || ''}`);
        }
    }
    return info.length > 0 ? '<br><small>' + info.join(' | ') + '</small>' : '';
}

function verificarCompatibilidadeSoquetes(soquetesCooler, soqueteMobo) {
    if (!soquetesCooler || !soqueteMobo) return false;
    
    // Se o cooler suporta múltiplos soquetes (separados por vírgula)
    const soquetesArray = soquetesCooler.split(',').map(s => s.trim().toUpperCase());
    const soqueteMoboLimpo = soqueteMobo.trim().toUpperCase();
    
    console.log('Verificando compatibilidade:');
    console.log('Soquetes do cooler:', soquetesArray);
    console.log('Soquete da mobo:', soqueteMoboLimpo);
    console.log('É compatível?', soquetesArray.includes(soqueteMoboLimpo));
    
    return soquetesArray.includes(soqueteMoboLimpo);
}

// ... código anterior ...

function debugCompatibilidadeDetalhada() {
    console.log('=== DEBUG DETALHADO - COOLERS ===');
    
    if (pecasSelecionadas.air_cooler) {
        console.log('Air Cooler - Suporte:', pecasSelecionadas.air_cooler.suporte);
        console.log('Tipo:', typeof pecasSelecionadas.air_cooler.suporte);
    }
    
    if (pecasSelecionadas.water_cooler) {
        console.log('Water Cooler - Suporte:', pecasSelecionadas.water_cooler.suporte);
        console.log('Tipo:', typeof pecasSelecionadas.water_cooler.suporte);
    }
    
    if (pecasSelecionadas.motherboard) {
        console.log('Motherboard - Chipset:', pecasSelecionadas.motherboard.chipset);
        console.log('Tipo:', typeof pecasSelecionadas.motherboard.chipset);
    }
    
    // Testar a função de verificação
    if (pecasSelecionadas.air_cooler && pecasSelecionadas.motherboard) {
        const suporteAir = pecasSelecionadas.air_cooler.suporte;
        const socketMobo = pecasSelecionadas.motherboard.chipset;
        console.log('--- TESTE AIR COOLER ---');
        console.log('Suporte:', suporteAir);
        console.log('Socket Mobo:', socketMobo);
        console.log('Resultado:', verificarCompatibilidadeSoquetes(suporteAir, socketMobo));
    }
    
    if (pecasSelecionadas.water_cooler && pecasSelecionadas.motherboard) {
        const suporteWater = pecasSelecionadas.water_cooler.suporte;
        const socketMobo = pecasSelecionadas.motherboard.chipset;
        console.log('--- TESTE WATER COOLER ---');
        console.log('Suporte:', suporteWater);
        console.log('Socket Mobo:', socketMobo);
        console.log('Resultado:', verificarCompatibilidadeSoquetes(suporteWater, socketMobo));
    }
}

// MODIFIQUE a função verificarCompatibilidadeSoquetes para ficar assim:
function verificarCompatibilidadeSoquetes(soquetesCooler, soqueteMobo) {
    if (!soquetesCooler || !soqueteMobo) {
        console.log('❌ Um dos valores está vazio:', {soquetesCooler, soqueteMobo});
        return false;
    }
    
    console.log('--- PROCESSANDO COMPATIBILIDADE ---');
    console.log('Soquetes Cooler (original):', soquetesCooler);
    console.log('Soquete Mobo (original):', soqueteMobo);
    
    // Se o cooler suporta múltiplos soquetes (separados por vírgula)
    const soquetesArray = soquetesCooler.split(',').map(s => s.trim().toUpperCase());
    const soqueteMoboLimpo = soqueteMobo.trim().toUpperCase();
    
    console.log('Soquetes Array:', soquetesArray);
    console.log('Soquete Mobo Limpo:', soqueteMoboLimpo);
    console.log('Inclui?', soquetesArray.includes(soqueteMoboLimpo));
    
    const resultado = soquetesArray.includes(soqueteMoboLimpo);
    console.log('✅ Resultado Final:', resultado);
    
    return resultado;
}

function gerenciarCompatibilidadeCoolers() {
    const airCoolerSelect = document.getElementById("air_cooler_pc");
    const waterCoolerSelect = document.getElementById("water_cooler_pc");
    const mensagemDiv = document.getElementById("mensagem-cooler");
    
    function mostrarMensagem(texto) {
        mensagemDiv.textContent = texto;
        mensagemDiv.className = "mensagem-cooler mensagem-info";
        mensagemDiv.style.display = 'block';
        
        // Esconde a mensagem após 4 segundos
        setTimeout(() => {
            mensagemDiv.style.display = 'none';
        }, 4000);
    }
    
    airCoolerSelect.addEventListener("change", function() {
        if (this.selectedIndex > 0) {
            waterCoolerSelect.disabled = true;
            waterCoolerSelect.selectedIndex = 0;
            document.getElementById("res-water-cooler").innerHTML = "-";
            pecasSelecionadas.water_cooler = null;
            mostrarMensagem("Air Cooler selecionado! Water Cooler foi desabilitado.");
        } else {
            waterCoolerSelect.disabled = false;
            mensagemDiv.style.display = 'none';
        }
        atualizarResultado();
    });
    
    waterCoolerSelect.addEventListener("change", function() {
        if (this.selectedIndex > 0) {
            airCoolerSelect.disabled = true;
            airCoolerSelect.selectedIndex = 0;
            document.getElementById("res-air-cooler").innerHTML = "-";
            pecasSelecionadas.air_cooler = null;
            mostrarMensagem("Water Cooler selecionado! Air Cooler foi desabilitado.");
        } else {
            airCoolerSelect.disabled = false;
            mensagemDiv.style.display = 'none';
        }
        atualizarResultado();
    });
}

// ... continue com a função atualizarResultado() existente ...

function atualizarResultado() {
    // Processador
    let procSelect = document.getElementById("processador_pc");
    let procOption = procSelect.options[procSelect.selectedIndex];
    let procText = procOption.text;
    if (procSelect.selectedIndex > 0) {
        procText += formatarInformacoes(procOption, [
            {attr: 'data-chipset', label: 'Soquete'},
            {attr: 'data-ddr', label: 'DDR'},
            {attr: 'data-tdp', label: 'TDP', unidade: 'W'}
        ]);
        pecasSelecionadas.processador = {
            ddr: procOption.getAttribute('data-ddr'),
            chipset: procOption.getAttribute('data-chipset'),
            tdp: procOption.getAttribute('data-tdp')
        };
    } else {
        pecasSelecionadas.processador = null;
    }
    document.getElementById("res-processador").innerHTML = procText;

    // Placa mãe
    let moboSelect = document.getElementById("motherboard_pc");
    let moboOption = moboSelect.options[moboSelect.selectedIndex];
    let moboText = moboOption.text;
    if (moboSelect.selectedIndex > 0) {
        moboText += formatarInformacoes(moboOption, [
            {attr: 'data-chipset', label: 'Soquete'},
            {attr: 'data-ddr', label: 'DDR'},
            {attr: 'data-tdp', label: 'TDP', unidade: 'W'}
        ]);
        pecasSelecionadas.motherboard = {
            ddr: moboOption.getAttribute('data-ddr'),
            chipset: moboOption.getAttribute('data-chipset'),
            tdp: moboOption.getAttribute('data-tdp')
        };
    } else {
        pecasSelecionadas.motherboard = null;
    }
    document.getElementById("res-mobo").innerHTML = moboText;

    // Memória RAM
    let ramSelect = document.getElementById("ram_pc");
    let ramOption = ramSelect.options[ramSelect.selectedIndex];
    let ramText = ramOption.text;
    if (ramSelect.selectedIndex > 0) {
        ramText += formatarInformacoes(ramOption, [
            {attr: 'data-ddr', label: 'DDR'},
            {attr: 'data-freq', label: 'Frequência', unidade: 'MHz'},
            {attr: 'data-tam', label: 'Tamanho', unidade: 'GB'},
            {attr: 'data-tdp', label: 'TDP', unidade: 'W'}
        ]);
        pecasSelecionadas.ram = {
            ddr: ramOption.getAttribute('data-ddr')
        };
    } else {
        pecasSelecionadas.ram = null;
    }
    document.getElementById("res-ram").innerHTML = ramText;

    // Placa de vídeo
    let gpuSelect = document.getElementById("gpu_pc");
    let gpuOption = gpuSelect.options[gpuSelect.selectedIndex];
    let gpuText = gpuOption.text;
    if (gpuSelect.selectedIndex > 0) {
        gpuText += formatarInformacoes(gpuOption, [
            {attr: 'data-tam_mem', label: 'VRAM', unidade: 'GB'},
            {attr: 'data-tdp', label: 'TDP', unidade: 'W'}
        ]);
    }
    document.getElementById("res-gpu").innerHTML = gpuText;

    // HD
    let hdSelect = document.getElementById("hd_pc");
    let hdOption = hdSelect.options[hdSelect.selectedIndex];
    let hdText = hdOption.text;
    if (hdSelect.selectedIndex > 0) {
        hdText += formatarInformacoes(hdOption, [
            {attr: 'data-capacidade', label: 'Capacidade', unidade: 'GB'},
            {attr: 'data-tam', label: 'Tamanho', unidade: '"'},
            {attr: 'data-tdp', label: 'TDP', unidade: 'W'}
        ]);
    }
    document.getElementById("res-hd").innerHTML = hdText;

    // SSD
    let ssdSelect = document.getElementById("ssd_pc");
    let ssdOption = ssdSelect.options[ssdSelect.selectedIndex];
    let ssdText = ssdOption.text;
    if (ssdSelect.selectedIndex > 0) {
        ssdText += formatarInformacoes(ssdOption, [
            {attr: 'data-capacidade', label: 'Capacidade', unidade: 'GB'},
            {attr: 'data-tdp', label: 'TDP', unidade: 'W'}
        ]);
    }
    document.getElementById("res-ssd").innerHTML = ssdText;

    // Fonte
    let psuSelect = document.getElementById("psu_pc");
    let psuOption = psuSelect.options[psuSelect.selectedIndex];
    let psuText = psuOption.text;
    if (psuSelect.selectedIndex > 0) {
        psuText += formatarInformacoes(psuOption, [
            {attr: 'data-watts', label: 'Potência', unidade: 'W'},
            {attr: 'data-certificado', label: 'Certificação'},
            {attr: 'data-ismodular', label: 'Modular'}
        ]);
    }
    document.getElementById("res-psu").innerHTML = psuText;

    // Air Cooler
    let airSelect = document.getElementById("air_cooler_pc");
    let airOption = airSelect.options[airSelect.selectedIndex];
    let airText = airOption.text;
    if (airSelect.selectedIndex > 0) {
        airText += formatarInformacoes(airOption, [
            {attr: 'data-suporte', label: 'Suporte'},
            {attr: 'data-tdp', label: 'TDP Máx', unidade: 'W'}
        ]);
        pecasSelecionadas.air_cooler = {
            suporte: airOption.getAttribute('data-suporte'),
            tdp: airOption.getAttribute('data-tdp')
        };
    } else {
        pecasSelecionadas.air_cooler = null;
    }
    document.getElementById("res-air-cooler").innerHTML = airText;

    // Water Cooler
    let waterSelect = document.getElementById("water_cooler_pc");
    let waterOption = waterSelect.options[waterSelect.selectedIndex];
    let waterText = waterOption.text;
    if (waterSelect.selectedIndex > 0) {
        waterText += formatarInformacoes(waterOption, [
            {attr: 'data-suporte', label: 'Suporte'},
            {attr: 'data-tdp', label: 'TDP Máx', unidade: 'W'}
        ]);
        pecasSelecionadas.water_cooler = {
            suporte: waterOption.getAttribute('data-suporte'),
            tdp: waterOption.getAttribute('data-tdp')
        };
    } else {
        pecasSelecionadas.water_cooler = null;
    }
    document.getElementById("res-water-cooler").innerHTML = waterText;

     debugCompatibilidadeDetalhada();
    // Verificar compatibilidade
    verificarCompatibilidade();
}

function verificarCompatibilidade() {
    const resultados = document.getElementById('compatibilidade-resultados');
    resultados.innerHTML = '';

    const mensagens = [];

    // DEBUG: Mostrar dados no console
    console.log('=== DADOS DAS PEÇAS ===');
    console.log('Processador:', pecasSelecionadas.processador);
    console.log('Motherboard:', pecasSelecionadas.motherboard);
    console.log('Air Cooler:', pecasSelecionadas.air_cooler);
    console.log('Water Cooler:', pecasSelecionadas.water_cooler);

    // Verificar 1: DDR Processador x Motherboard
    if (pecasSelecionadas.processador && pecasSelecionadas.motherboard) {
        if (pecasSelecionadas.processador.ddr && pecasSelecionadas.motherboard.ddr && 
            pecasSelecionadas.processador.ddr === pecasSelecionadas.motherboard.ddr) {
            mensagens.push('✅ DDR do Processador compatível com a Placa Mãe');
        } else {
            mensagens.push('❌ DDR do Processador INCOMPATÍVEL com a Placa Mãe');
        }
    }

    // Verificar 2: DDR Motherboard x RAM
    if (pecasSelecionadas.motherboard && pecasSelecionadas.ram) {
        if (pecasSelecionadas.motherboard.ddr && pecasSelecionadas.ram.ddr && 
            pecasSelecionadas.motherboard.ddr === pecasSelecionadas.ram.ddr) {
            mensagens.push('✅ DDR da Placa Mãe compatível com a Memória RAM');
        } else {
            mensagens.push('❌ DDR da Placa Mãe INCOMPATÍVEL com a Memória RAM');
        }
    }

    // Verificar 3: DDR Processador x RAM
    if (pecasSelecionadas.processador && pecasSelecionadas.ram) {
        if (pecasSelecionadas.processador.ddr && pecasSelecionadas.ram.ddr && 
            pecasSelecionadas.processador.ddr === pecasSelecionadas.ram.ddr) {
            mensagens.push('✅ DDR do Processador compatível com a Memória RAM');
        } else {
            mensagens.push('❌ DDR do Processador INCOMPATÍVEL com a Memória RAM');
        }
    }

    // Verificar 4: Chipset (Socket) Processador x Chipset (Socket) Motherboard
    if (pecasSelecionadas.processador && pecasSelecionadas.motherboard) {
        const socketProc = pecasSelecionadas.processador.chipset;
        const socketMobo = pecasSelecionadas.motherboard.chipset;
        
        console.log('Comparando soquetes Processador x Motherboard:');
        console.log('Soquete Processador:', socketProc);
        console.log('Soquete Motherboard:', socketMobo);
        
        if (socketProc && socketMobo && socketProc.trim().toUpperCase() === socketMobo.trim().toUpperCase()) {
            mensagens.push('✅ Soquete do Processador compatível com o Soquete da Placa Mãe');
        } else {
            mensagens.push('❌ Soquete do Processador INCOMPATÍVEL com o Soquete da Placa Mãe');
        }
    }

    // Verificar 5: Suporte Air Cooler x Chipset Motherboard
    if (pecasSelecionadas.air_cooler && pecasSelecionadas.motherboard) {
        const suporteAir = pecasSelecionadas.air_cooler.suporte;
        const socketMobo = pecasSelecionadas.motherboard.chipset;
        
        const compativel = verificarCompatibilidadeSoquetes(suporteAir, socketMobo);
        
        if (compativel) {
            mensagens.push('✅ Suporte do Air Cooler compatível com o Soquete da Placa Mãe');
        } else {
            mensagens.push('❌ Suporte do Air Cooler INCOMPATÍVEL com o Soquete da Placa Mãe');
        }
    }

    // Verificar 6: Suporte Water Cooler x Chipset Motherboard
    if (pecasSelecionadas.water_cooler && pecasSelecionadas.motherboard) {
        const suporteWater = pecasSelecionadas.water_cooler.suporte;
        const socketMobo = pecasSelecionadas.motherboard.chipset;
        
        const compativel = verificarCompatibilidadeSoquetes(suporteWater, socketMobo);
        
        if (compativel) {
            mensagens.push('✅ Suporte do Water Cooler compatível com o Soquete da Placa Mãe');
        } else {
            mensagens.push('❌ Suporte do Water Cooler INCOMPATÍVEL com o Soquete da Placa Mãe');
        }
    }

    // Exibir mensagens
    if (mensagens.length === 0) {
        resultados.innerHTML = '<p>Selecione as peças para verificar a compatibilidade</p>';
    } else {
        mensagens.forEach(msg => {
            const p = document.createElement('p');
            p.innerHTML = msg;
            p.style.padding = '8px';
            p.style.margin = '5px 0';
            p.style.borderRadius = '4px';
            
            if (msg.includes('❌')) {
                p.style.backgroundColor = '#ffe6e6';
                p.style.color = '#d63031';
                p.style.border = '1px solid #ffcccc';
            } else if (msg.includes('✅')) {
                p.style.backgroundColor = '#e6ffe6';
                p.style.color = '#00b894';
                p.style.border = '1px solid #ccffcc';
            }
            
            resultados.appendChild(p);
        });
    }
}

// Adiciona evento de mudança em todos os selects
document.querySelectorAll("select").forEach(select => {
    select.addEventListener("change", atualizarResultado);
});

gerenciarCompatibilidadeCoolers();

// Inicializar
atualizarResultado();
</script>

</body>
</html>