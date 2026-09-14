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
    <link rel="stylesheet" href="../CSS/visualizar-produtos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Visualizar Produtos - PCMaker</title>
</head>
<body>
    <nav>
        <a href="../index.html"><img src="../IMGS/logopcmaker.png"></a>
        <div class="nav-links" id="navLinks">
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="pcmaker.php">Monte seu PC</a></li>
                <li><a href="psucalc.php">Calculadora de Fonte</a></li>
                <li><a href="../HTML/aboutus.html">Sobre nós</a></li>
                <li><a href="tutoriais.php">Tutoriais</a></li>
                <li><a href="../HTML/login-admin.html">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Visualizar Produtos</h1>
        
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

        <div class="products-table" id="productsTable" style="display: none;">
            <h3 id="tableTitle">Produtos</h3>
            <div class="table-container">
                <table id="productsList">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Os produtos serão carregados aqui -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Visualizar -->
        <div class="product-details-modal" id="productModal" style="display: none;">
            <div class="modal-content">
                <span class="close-btn" onclick="fecharModal()">&times;</span>
                <h3>Detalhes do Produto</h3>
                <div id="modalDetails"></div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div class="product-details-modal" id="editModal" style="display: none;">
            <div class="modal-content">
                <span class="close-btn" onclick="fecharEditModal()">&times;</span>
                <h3>Editar Produto</h3>
                <form id="editForm" class="edit-form">
                    <input type="hidden" id="editCategoria" name="categoria">
                    <input type="hidden" id="editId" name="id">
                    <div id="editFields">
                        <!-- Campos do formulário serão gerados aqui -->
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="save-btn">Salvar Alterações</button>
                        <button type="button" class="cancel-btn" onclick="fecharEditModal()">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="message" class="message"></div>

        <!-- BOTÃO VOLTAR -->
        <div class="back-button-container">
            <a href="javascript:void(0)" onclick="voltar()" class="back-btn">Voltar</a>
        </div>
    </div>

<script>
    // Opções pré-definidas para cada campo
    const opcoesPredefinidas = {
        'ddr_processador': ['DDR4', 'DDR5'],
        'ddr_motherboard': ['DDR4', 'DDR5'],
        'ddr_ram': ['DDR4', 'DDR5'],
        'chipset_processador': ['LGA 1151', 'LGA 1200', 'LGA 1700', 'AM4', 'AM5'],
        'chipset_motherborad': ['LGA 1151', 'LGA 1200', 'LGA 1700', 'AM4', 'AM5'],
        'freq_ram': ['2666', '3000', '3200', '3600'],
        'tam_ram': ['4', '8', '16', '32', '64'],
        'tam_mem_gpu': ['4', '6', '8', '10', '12', '16'],
        'capacidade_ssd': ['128', '256', '512', '960', '1024'],
        'capacidade_hd': ['500', '1000', '2000'],
        'tam_hd': ['2.5"', '3.5"'],
        'watts_psu': ['400','500', '650', '750','1000'],
        'certificado': ['80 Plus', '80 Plus Bronze', '80 Plus Silver'],
        'ismodular': ['Sim', 'Não'],
        'suporte_air': ['LGA 1151', 'LGA 1200', 'LGA 1700', 'AM4', 'AM5'],
        'suporte_water': ['LGA 1151', 'LGA 1200', 'LGA 1700', 'AM4', 'AM5']
    };

    // Função para voltar à página anterior
    function voltar() {
        window.history.back();
    }

    // Carregar produtos quando selecionar categoria
    document.getElementById('categoria').addEventListener('change', function() {
        const categoria = this.value;
        const productsTable = document.getElementById('productsTable');
        
        if (categoria) {
            carregarProdutos(categoria);
            productsTable.style.display = 'block';
        } else {
            productsTable.style.display = 'none';
        }
    });

    function carregarProdutos(categoria) {
        const tableBody = document.getElementById('tableBody');
        const tableTitle = document.getElementById('tableTitle');
        
        tableBody.innerHTML = '<tr><td colspan="3">Carregando...</td></tr>';
        
        // Atualizar título da tabela
        const categoriaNomes = {
            'processador': 'Processadores',
            'gpu': 'Placas de Vídeo',
            'motherboard': 'Placas-Mãe',
            'memoram': 'Memórias RAM',
            'memossd': 'SSDs',
            'memohd': 'HDs',
            'psu': 'Fontes',
            'air_cooler': 'Air Coolers',
            'water_cooler': 'Water Coolers'
        };
        tableTitle.textContent = categoriaNomes[categoria] || 'Produtos';
        
        fetch(`../PHP/buscar-todos-produtos.php?categoria=${categoria}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na rede: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Dados recebidos:', data); // Debug
                tableBody.innerHTML = '';
                
                if (data.error) {
                    tableBody.innerHTML = `<tr><td colspan="3">Erro: ${data.error}</td></tr>`;
                    return;
                }
                
                if (data.length > 0) {
                    data.forEach(produto => {
                        const row = document.createElement('tr');
                        
                        // Coluna ID
                        const tdId = document.createElement('td');
                        tdId.textContent = produto.id;
                        row.appendChild(tdId);
                        
                        // Coluna Nome
                        const tdNome = document.createElement('td');
                        tdNome.textContent = produto.nome;
                        row.appendChild(tdNome);
                        
                        // Coluna Ações
                        const tdAcoes = document.createElement('td');
                        tdAcoes.className = 'actions-column';
                        
                        // Botão Visualizar
                        const btnVisualizar = document.createElement('button');
                        btnVisualizar.className = 'view-btn';
                        btnVisualizar.innerHTML = '<i class="fa fa-eye"></i> Visualizar';
                        btnVisualizar.onclick = () => visualizarProduto(categoria, produto.id);
                        tdAcoes.appendChild(btnVisualizar);
                        
                        // Botão Editar
                        const btnEditar = document.createElement('button');
                        btnEditar.className = 'edit-btn';
                        btnEditar.innerHTML = '<i class="fa fa-edit"></i> Editar';
                        btnEditar.onclick = () => editarProduto(categoria, produto.id);
                        tdAcoes.appendChild(btnEditar);
                        
                        row.appendChild(tdAcoes);
                        tableBody.appendChild(row);
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="3">Nenhum produto encontrado</td></tr>';
                }
            })
            .catch(error => {
                console.error('Erro completo:', error);
                tableBody.innerHTML = '<tr><td colspan="3">Erro ao carregar produtos</td></tr>';
            });
    }

    function visualizarProduto(categoria, produtoId) {
        fetch(`../PHP/buscar-info-completo-produto.php?categoria=${categoria}&id=${produtoId}`)
            .then(response => response.json())
            .then(data => {
                const modalDetails = document.getElementById('modalDetails');
                let html = '<div class="product-details-grid">';
                
                for (const [key, value] of Object.entries(data)) {
                    if (value !== null && value !== '') {
                        html += `
                            <div class="detail-row">
                                <span class="detail-label">${formatarCampo(key)}:</span>
                                <span class="detail-value">${value}</span>
                            </div>
                        `;
                    }
                }
                
                html += '</div>';
                modalDetails.innerHTML = html;
                
                // Mostrar modal
                document.getElementById('productModal').style.display = 'block';
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao carregar detalhes do produto');
            });
    }

    function editarProduto(categoria, produtoId) {
        fetch(`../PHP/buscar-info-completo-produto.php?categoria=${categoria}&id=${produtoId}`)
            .then(response => response.json())
            .then(data => {
                console.log('Dados para edição:', data);
                
                document.getElementById('editCategoria').value = categoria;
                document.getElementById('editId').value = produtoId;
                
                const editFields = document.getElementById('editFields');
                editFields.innerHTML = '';
                
                for (const [key, value] of Object.entries(data)) {
                    // Ignorar campos de ID
                    if (key.includes('cod_') || key.includes('id_') || key === 'id') {
                        continue;
                    }
                    
                    const fieldDiv = document.createElement('div');
                    fieldDiv.className = 'form-group';
                    
                    const label = document.createElement('label');
                    label.textContent = formatarCampo(key);
                    label.htmlFor = `edit_${key}`;
                    
                    // Verificar se é um campo com opções pré-definidas
                    if (opcoesPredefinidas[key]) {
                        // Criar select para campos pré-definidos
                        const select = document.createElement('select');
                        select.id = `edit_${key}`;
                        select.name = key;
                        select.className = 'form-select';
                        
                        // Opção vazia
                        const emptyOption = document.createElement('option');
                        emptyOption.value = '';
                        emptyOption.textContent = 'Selecione...';
                        select.appendChild(emptyOption);
                        
                        // Adicionar opções pré-definidas
                        opcoesPredefinidas[key].forEach(opcao => {
                            const option = document.createElement('option');
                            option.value = opcao;
                            option.textContent = opcao;
                            if (value == opcao) {
                                option.selected = true;
                            }
                            select.appendChild(option);
                        });
                        
                        fieldDiv.appendChild(label);
                        fieldDiv.appendChild(select);
                    } else {
                        // Criar input para campos de texto livre (incluindo TDPs)
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.id = `edit_${key}`;
                        input.name = key;
                        input.value = value || '';
                        input.className = 'form-input';
                        
                        // Adicionar placeholder para TDPs
                        if (key.includes('tdp')) {
                            input.placeholder = 'Ex: 65, 95, 125...';
                        }
                        
                        fieldDiv.appendChild(label);
                        fieldDiv.appendChild(input);
                    }
                    
                    editFields.appendChild(fieldDiv);
                }
                
                // Mostrar modal de edição
                document.getElementById('editModal').style.display = 'block';
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao carregar dados para edição');
            });
    }

    // Formulário de edição
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const categoria = document.getElementById('editCategoria').value;
        const id = document.getElementById('editId').value;
        
        // Adicionar categoria e ID ao formData
        formData.append('categoria', categoria);
        formData.append('id', id);
        
        fetch('../PHP/editar-produto.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Produto atualizado com sucesso!');
                fecharEditModal();
                carregarProdutos(categoria); // Recarregar a lista
            } else {
                alert('Erro ao atualizar: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao atualizar produto');
        });
    });

    function fecharModal() {
        document.getElementById('productModal').style.display = 'none';
    }

    function fecharEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function formatarCampo(campo) {
        const campos = {
            'nome_processador': 'Nome',
            'chipset_processador': 'Chipset',
            'ddr_processador': 'DDR',
            'tdp_processador': 'TDP',
            'nome_gpu': 'Nome',
            'tam_mem_gpu': 'Memória (GB)',
            'tdp_gpu': 'TDP',
            'nome_mobo': 'Nome',
            'chipset_motherborad': 'Chipset',
            'ddr_motherboard': 'DDR',
            'tdp_motherboard': 'TDP',
            'nome_ram': 'Nome',
            'ddr_ram': 'DDR',
            'freq_ram': 'Frequência (MHz)',
            'tam_ram': 'Tamanho (GB)',
            'tdp_ram': 'TDP',
            'nome_ssd': 'Nome',
            'capacidade_ssd': 'Capacidade (GB)',
            'tdp_ssd': 'TDP',
            'nome_hd': 'Nome',
            'capacidade_hd': 'Capacidade (GB)',
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
        
        return campos[campo] || campo.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
    }

    // Fechar modal clicando fora
    window.onclick = function(event) {
        const modal = document.getElementById('productModal');
        const editModal = document.getElementById('editModal');
        
        if (event.target == modal) {
            fecharModal();
        }
        if (event.target == editModal) {
            fecharEditModal();
        }
    }
</script>
</body>
</html>