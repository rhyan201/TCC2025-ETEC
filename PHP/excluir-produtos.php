<?php
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../CSS/excluir-produtos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Excluir Produtos - PCMaker</title>
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
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <div class="container">
        <h1>Excluir Produtos</h1>
        
        <div class="category-selector">
            <label for="categoria">Selecione a Categoria:</label>
            <select id="categoria" name="categoria">
                <option value="">Selecione uma categoria</option>
                <option value="processador">Processador</option>
                <option value="gpu">Placa de Vídeo (GPU)</option>
                <option value="motherboard">Placa-Mãe</option>
                <option value="memoram">Memória RAM</option>
                <option value="memossd">SSD</option>
                <option value="memohd">HD</option>
                <option value="psu">Fonte</option>
                <option value="air_cooler">Air Cooler</option>
                <option value="water_cooler">Water Cooler</option>
            </select>
        </div>

        <div class="product-selector" id="productSelector" style="display: none;">
            <label for="produto">Selecione o Produto:</label>
            <select id="produto" name="produto">
                <option value="">Selecione um produto</option>
            </select>
        </div>

        <div class="product-info" id="productInfo" style="display: none;">
            <h3>Informações do Produto</h3>
            <div id="productDetails"></div>
            <button class="delete-btn" onclick="excluirProduto()">Excluir Produto</button>
        </div>

        <div id="message" class="message"></div>

        <div class="back-button-container">
            <a href="javascript:void(0)" onclick="voltar()" class="back-btn">Voltar</a>
        </div>
    </div>

    <script>
        function voltar() {
            window.history.back();
        }
        document.getElementById('categoria').addEventListener('change', function() {
            const categoria = this.value;
            const productSelector = document.getElementById('productSelector');
            const productInfo = document.getElementById('productInfo');
            
            if (categoria) {
                carregarProdutos(categoria);
                productSelector.style.display = 'block';
                productInfo.style.display = 'none';
            } else {
                productSelector.style.display = 'none';
                productInfo.style.display = 'none';
            }
        });

        document.getElementById('produto').addEventListener('change', function() {
            const categoria = document.getElementById('categoria').value;
            const produtoId = this.value;
            const productInfo = document.getElementById('productInfo');
            
            if (produtoId) {
                carregarInfoProduto(categoria, produtoId);
                productInfo.style.display = 'block';
            } else {
                productInfo.style.display = 'none';
            }
        });

        function carregarProdutos(categoria) {
            const selectProduto = document.getElementById('produto');
            selectProduto.innerHTML = '<option value="">Carregando...</option>';
            
            fetch(`../PHP/buscar-produtos.php?categoria=${categoria}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na rede: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Dados recebidos:', data);
                    
                    selectProduto.innerHTML = '<option value="">Selecione um produto</option>';
                    
                    if (data.error) {
                        selectProduto.innerHTML = `<option value="">Erro: ${data.error}</option>`;
                        return;
                    }
                    
                    if (data.length > 0) {
                        data.forEach(produto => {
                            const option = document.createElement('option');
                            option.value = produto.id;
                            option.textContent = produto.nome;
                            selectProduto.appendChild(option);
                        });
                    } else {
                        selectProduto.innerHTML = '<option value="">Nenhum produto encontrado</option>';
                    }
                })
                .catch(error => {
                    console.error('Erro completo:', error);
                    selectProduto.innerHTML = '<option value="">Erro ao carregar produtos</option>';
                });
        }

        function carregarInfoProduto(categoria, produtoId) {
            fetch(`../PHP/buscar-info-produto.php?categoria=${categoria}&id=${produtoId}`)
                .then(response => response.json())
                .then(data => {
                    const detailsDiv = document.getElementById('productDetails');
                    let html = '<div class="product-details">';
                    
                    for (const [key, value] of Object.entries(data)) {
                        if (key !== 'id' && value !== null) {
                            html += `<p><strong>${formatarCampo(key)}:</strong> ${value}</p>`;
                        }
                    }
                    
                    html += '</div>';
                    detailsDiv.innerHTML = html;
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        }

        function formatarCampo(campo) {
            const campos = {
                'nome_processador': 'Nome',
                'chipset_processador': 'Chipset',
                'ddr_processador': 'DDR',
                'tdp_processador': 'TDP',
                'nome_gpu': 'Nome',
                'tam_mem_gpu': 'Memória',
                'tdp_gpu': 'TDP',
                'nome_mobo': 'Nome',
                'chipset_motherborad': 'Chipset',
                'ddr_motherboard': 'DDR',
                'tdp_motherboard': 'TDP',
                'nome_ram': 'Nome',
                'ddr_ram': 'DDR',
                'freq_ram': 'Frequência',
                'tam_ram': 'Tamanho',
                'tdp_ram': 'TDP',
                'nome_ssd': 'Nome',
                'capacidade_ssd': 'Capacidade',
                'tdp_ssd': 'TDP',
                'nome_hd': 'Nome',
                'capacidade_hd': 'Capacidade',
                'tam_hd': 'Tamanho',
                'tdp_hd': 'TDP',
                'nome_psu': 'Nome',
                'watts_psu': 'Watts',
                'certificado': 'Certificado',
                'ismodular': 'Modular',
                'nome_air': 'Nome',
                'suporte_air': 'Suporte',
                'tdp_cpumax_air': 'TDP Máximo CPU',
                'nome_water': 'Nome',
                'suporte_water': 'Suporte',
                'tdp_cpumax_water': 'TDP Máximo CPU'
            };
            
            return campos[campo] || campo;
        }

        function excluirProduto() {
            const categoria = document.getElementById('categoria').value;
            const produtoId = document.getElementById('produto').value;
            
            if (!confirm('Tem certeza que deseja excluir este produto? Esta ação não pode ser desfeita.')) {
                return;
            }
            
            fetch('../PHP/executar-exclusao.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `categoria=${categoria}&id=${produtoId}`
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('message');
                if (data.success) {
                    messageDiv.innerHTML = '<div class="success">Produto excluído com sucesso!</div>';
                    carregarProdutos(categoria);
                    document.getElementById('productInfo').style.display = 'none';
                    document.getElementById('produto').value = '';
                } else {
                    messageDiv.innerHTML = `<div class="error">Erro: ${data.message}</div>`;
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                document.getElementById('message').innerHTML = '<div class="error">Erro ao excluir produto</div>';
            });
        }
    </script>
</body>
</html>