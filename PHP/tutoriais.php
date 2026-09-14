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
    <link rel="stylesheet" href="../CSS/tutoriais.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Tutoriais - PCMaker</title>
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
        <h1 class="main-title">Tutoriais de Montagem de Computadores</h1>
        <p class="subtitle">Aprenda passo a passo como montar seu próprio PC</p>

        <div class="intro-section">
            <div class="intro-card">
                <h2><i class="fas fa-graduation-cap"></i> Por que montar seu próprio PC?</h2>
                <p>Montar seu próprio computador oferece diversas vantagens: melhor custo-benefício, personalização total, aprendizado técnico e a satisfação de construir algo com suas próprias mãos.</p>
            </div>
        </div>

        <div class="tutorial-steps">
            <h2 class="section-title">Passo a Passo da Montagem</h2>
            
            <!-- Etapa 1 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">1</span>
                    <h3>Preparação do Ambiente</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1587202372634-32705e3bf49c?w=600&auto=format&fit=crop" alt="Ambiente de trabalho">
                    </div>
                    <div class="step-details">
                        <h4>Materiais necessários:</h4>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Chave de fenda Phillips</li>
                            <li><i class="fas fa-check-circle"></i> Pulseira antiestática</li>
                            <li><i class="fas fa-check-circle"></i> Mesa ampla e limpa</li>
                            <li><i class="fas fa-check-circle"></i> Boa iluminação</li>
                            <li><i class="fas fa-check-circle"></i> Organizadores para parafusos</li>
                        </ul>
                        <div class="tip-box">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Dica:</strong> Trabalhe em uma superfície não condutora como madeira ou plástico para evitar descargas estáticas.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 2 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">2</span>
                    <h3>Instalação da Placa-Mãe</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=600&auto=format&fit=crop" alt="Placa-mãe">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento:</h4>
                        <ol>
                            <li>Coloque os suportes (standoffs) no gabinete</li>
                            <li>Alinhe a placa-mãe com os furos do gabinete</li>
                            <li>Parafuse a placa-mãe firmemente</li>
                            <li>Conecte os cabos do painel frontal (power, reset, LEDs)</li>
                        </ol>
                        <div class="warning-box">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p><strong>Atenção:</strong> Não force a placa-mãe! Se não encaixar facilmente, verifique a posição.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 3 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">3</span>
                    <h3>Instalação do Processador</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1587202372709-33d45a1c71d1?w=600&auto=format&fit=crop" alt="Processador">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento:</h4>
                        <ol>
                            <li>Abra a alavanca do soquete da placa-mãe</li>
                            <li>Alinhe a seta dourada do processador com a do soquete</li>
                            <li>Coloque o processador sem força - ele deve cair no lugar</li>
                            <li>Feche a alavanca para travar o processador</li>
                        </ol>
                        <div class="tip-box">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Importante:</strong> Nunca toque nos pinos do processador! Segure-o pelas bordas.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 4 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">4</span>
                    <h3>Instalação do Cooler</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w-600&auto=format&fit-crop" alt="Cooler do processador">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento:</h4>
                        <ol>
                            <li>Aplique pasta térmica no processador (uma quantidade do tamanho de uma ervilha)</li>
                            <li>Posicione o cooler sobre o processador</li>
                            <li>Encaixe ou parafuse o cooler conforme instruções do fabricante</li>
                            <li>Conecte o cabo de alimentação do cooler na placa-mãe (CPU_FAN)</li>
                        </ol>
                        <div class="warning-box">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p><strong>Cuidado:</strong> Excesso de pasta térmica pode causar superaquecimento!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 5 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">5</span>
                    <h3>Instalação da Memória RAM</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=600&auto=format&fit=crop" alt="Memória RAM">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento:</h4>
                        <ol>
                            <li>Abra as travas das slots de memória</li>
                            <li>Alinhe o encaixe da RAM com o da placa-mãe</li>
                            <li>Pressione até as travas fecharem automaticamente</li>
                            <li>Para dual channel, use slots de cores iguais (ex: slots 1 e 3 ou 2 e 4)</li>
                        </ol>
                        <div class="tip-box">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Configuração ideal:</strong> Consulte o manual da placa-mãe para a melhor configuração de dual channel.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 6 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">6</span>
                    <h3>Instalação da Placa de Vídeo</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=600&auto=format&fit=crop" alt="Placa de vídeo">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento:</h4>
                        <ol>
                            <li>Remova as tampas do gabinete correspondentes aos slots da GPU</li>
                            <li>Abra a trava do slot PCIe x16</li>
                            <li>Insira a placa de vídeo até ouvir o clique da trava</li>
                            <li>Parafuse a placa no gabinete</li>
                            <li>Conecte os cabos de energia da fonte (6+2 pinos)</li>
                        </ol>
                        <div class="warning-box">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p><strong>Verifique:</strong> Algumas GPUs potentes precisam de 2 ou 3 conectores de energia.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 7 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">7</span>
                    <h3>Instalação do Armazenamento</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1591798792026-8d1d5d1a6a5a?w=600&auto=format&fit=crop" alt="SSD e HD">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento (SSD M.2):</h4>
                        <ol>
                            <li>Localize o slot M.2 na placa-mãe</li>
                            <li>Insira o SSD em ângulo de 30 graus</li>
                            <li>Parafuse o SSD no suporte</li>
                        </ol>
                        <h4>Procedimento (HD/SSD SATA):</h4>
                        <ol>
                            <li>Instale na baía do gabinete</li>
                            <li>Conecte o cabo SATA da placa-mãe</li>
                            <li>Conecte o cabo de energia da fonte</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Etapa 8 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">8</span>
                    <h3>Instalação da Fonte de Alimentação</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1510511459019-5dda7724fd87?w=600&auto=format&fit=crop" alt="Fonte de alimentação">
                    </div>
                    <div class="step-details">
                        <h4>Procedimento:</h4>
                        <ol>
                            <li>Posicione a fonte no local designado do gabinete</li>
                            <li>Parafuse a fonte firmemente</li>
                            <li>Conecte os cabos de energia:
                                <ul>
                                    <li>24-pin na placa-mãe</li>
                                    <li>4+4 pinos CPU</li>
                                    <li>Cabo(s) PCIe para GPU</li>
                                    <li>Cabo(s) SATA para armazenamento</li>
                                </ul>
                            </li>
                        </ol>
                        <div class="tip-box">
                            <i class="fas fa-lightbulb"></i>
                            <p><strong>Organização:</strong> Use o sistema de gerenciamento de cabos do gabinete para melhor fluxo de ar.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Etapa 9 -->
            <div class="step-card">
                <div class="step-header">
                    <span class="step-number">9</span>
                    <h3>Conexões Finais e Primeira Inicialização</h3>
                </div>
                <div class="step-content">
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&auto=format&fit=crop" alt="Computador montado">
                    </div>
                    <div class="step-details">
                        <h4>Verificações finais:</h4>
                        <ol>
                            <li>Verifique todas as conexões</li>
                            <li>Organize os cabos com abraçadeiras</li>
                            <li>Feche o gabinete</li>
                            <li>Conecte monitor, teclado e mouse</li>
                            <li>Conecte o cabo de energia</li>
                        </ol>
                        <h4>Primeira inicialização:</h4>
                        <ol>
                            <li>Ligue o computador</li>
                            <li>Acesse a BIOS (DEL ou F2 durante o boot)</li>
                            <li>Verifique se todos os componentes são detectados</li>
                            <li>Configure a ordem de boot para instalar o sistema operacional</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-section">
            <h2 class="section-title">Perguntas Frequentes</h2>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <h3><i class="fas fa-question-circle"></i> Quanto tempo leva para montar um PC?</h3>
                    <p>Para um iniciante, de 2 a 4 horas. Com experiência, em cerca de 1 hora.</p>
                </div>
                
                <div class="faq-item">
                    <h3><i class="fas fa-question-circle"></i> Preciso de pasta térmica?</h3>
                    <p>Sim! A pasta térmica é essencial para a transferência de calor entre o processador e o cooler.</p>
                </div>
                
                <div class="faq-item">
                    <h3><i class="fas fa-question-circle"></i> Posso montar sem pulseira antiestática?</h3>
                    <p>Recomenda-se usar, mas pode tocar em uma parte metálica do gabinete antes de manusear componentes.</p>
                </div>
                
                <div class="faq-item">
                    <h3><i class="fas fa-question-circle"></i> Meu PC ligou mas não dá vídeo. E agora?</h3>
                    <p>Verifique: 1) Conexão da GPU, 2) Cabo do monitor, 3) Memória RAM bem encaixada, 4) Cabo de energia da GPU.</p>
                </div>
            </div>
        </div>

        <div class="tools-section">
            <h2 class="section-title">Ferramentas do PCMaker para Ajudar</h2>
            
            <div class="tools-grid">
                <div class="tool-card">
                    <i class="fas fa-desktop"></i>
                    <h3>Monte seu PC</h3>
                    <p>Use nosso simulador para montar seu PC virtualmente e verificar compatibilidade.</p>
                    <a href="pcmaker.php" class="tool-btn">Acessar</a>
                </div>
                
                <div class="tool-card">
                    <i class="fas fa-bolt"></i>
                    <h3>Calculadora de Fonte</h3>
                    <p>Calcule a potência necessária da fonte para sua configuração.</p>
                    <a href="psucalc.php" class="tool-btn">Calcular</a>
                </div>
                
                <div class="tool-card">
                    <i class="fas fa-shopping-cart"></i>
                    <h3>Compatibilidade</h3>
                    <p>Verifique automaticamente se suas peças são compatíveis entre si.</p>
                    <a href="pcmaker.php#compatibilidade" class="tool-btn">Verificar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Função para o menu mobile (se já não tiver)
        function showMenu() {
            document.getElementById("navLinks").style.right = "0";
        }

        function hideMenu() {
            document.getElementById("navLinks").style.right = "-200px";
        }

        // Animação suave para os passos
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-step');
                    }
                });
            }, { threshold: 0.1 });
            
            steps.forEach(step => {
                observer.observe(step);
            });
        });
    </script>
</body>
</html>