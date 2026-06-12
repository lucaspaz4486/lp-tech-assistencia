<?php

$whatsapp = "5561994120829";



// Verificação de envio de formulário

$mensagem_sucesso = isset($_GET['sucesso']) ? true : false;



// 1. Catálogo de Serviços Expandido

$servicos = [

["icone" => "fa-laptop-code", "titulo" => "Notebooks", "descricao" => "Formatação avançada, limpeza profunda, troca de pasta térmica e troca de componentes."],

["icone" => "fa-desktop", "titulo" => "Desktops & Gamers", "descricao" => "Cable management, limpeza profunda, troca de pasta térmica e otimização."],

["icone" => "fa-microchip", "titulo" => "Upgrades", "descricao" => "Instalação de SSD NVMe, memórias DDR4/DDR5 e placas de vídeo."],

["icone" => "fa-tools", "titulo" => "Montagem de Computadores", "descricao" => "Montagem personalizada do zero com gerenciamento de cabos rigoroso e testes de estresse."]

];



$estatisticas = [

["valor" => "1500+", "texto" => "Aparelhos Reparados"],

["valor" => "98%", "texto" => "De Satisfação"],

["valor" => "+5", "texto" => "Anos de Experiência"]

];



// 2. Banco de Dados Fictício com 10 Depoimentos para o Carrossel

$depoimentos = [

["nome" => "Bruno Silva", "texto" => "Montaram meu PC Gamer com um cable management impecável. Ficou sensacional!", "avatar" => "https://i.pravatar.cc/150?u=bruno"],

["nome" => "Fernando Lima", "texto" => "Minha formatação ficou pronta em menos de 2 horas. Agilidade incrível!", "avatar" => "https://i.pravatar.cc/150?u=fernanda"],

["nome" => "Gabriel Costa", "texto" => "Trocaram a tela do meu notebook e ficou perfeito. Preço super justo.", "avatar" => "https://i.pravatar.cc/150?u=joao"],

["nome" => "Mariana Souza", "texto" => "Fizeram um upgrade de SSD NVMe no meu Mac, agora ele liga em segundos!", "avatar" => "https://i.pravatar.cc/150?u=marcia"],

["nome" => "Pamela Alves", "texto" => "O robô de atendimento facilitou demais o envio do meu orçamento.", "avatar" => "https://i.pravatar.cc/150?u=rodrigo"],

["nome" => "Allan Rocha", "texto" => "Limpeza interna profunda excelente. Meu computador parou de esquentar.", "avatar" => "https://i.pravatar.cc/150?u=amanda"],

["nome" => "Adriana Mendes", "texto" => "Atendimento tecnológico de primeira linha, laboratório muito limpo.", "avatar" => "https://i.pravatar.cc/150?u=lucasm"],

["nome" => "Camila Oliveira", "texto" => "Melhor assistência de Brasília. Resolveram um curto na placa-mãe do meu PC.", "avatar" => "https://i.pravatar.cc/150?u=carol"],

["nome" => "Rafael Santos", "texto" => "Upgrade de memória RAM DDR5 realizado com sucesso. Máquina voando!", "avatar" => "https://i.pravatar.cc/150?u=rafael"],

["nome" => "Juliana Vieira", "texto" => "Garantia cumprida à risca e excelente suporte pós-entrega.", "avatar" => "https://i.pravatar.cc/150?u=juliana"]

];



// Lógica da Árvore de Decisão do Chat
$bot_flow = [
    "inicio" => [
        "text" => "Como posso te ajudar hoje?",
        "options" => [
            ["label" => "🔧 Manutenção e Reparos", "target" => "categorias"],
            ["label" => "🖥️ Montagem de PC (Setups)", "target" => "setups_pc"],
            ["label" => "📍 Como Funciona / Local", "target" => "local"],
            ["label" => "👩‍💻 Falar com Atendente", "action" => "whatsapp", "msg" => "Olá, preciso falar com um atendente humano."]
        ]
    ],

    // ==========================================
    // FLUXO 1: MANUTENÇÃO (Melhorado)
    // ==========================================
    "categorias" => [
        "text" => "Temos técnicos prontos para resolver seu problema. \nQual equipamento precisa de reparo?",
        "options" => [
            ["label" => "💻 Manutenção em Notebook", "target" => "precos_note"],
            ["label" => "🖥️ Manutenção em Computador", "target" => "precos_pc"],
            ["label" => "⬅️ Voltar ao início", "target" => "inicio"]
        ]
    ],
    "precos_note" => [
        "text" => "*Tabela Base - Notebooks:*\n• Formatação + Backup: R$ 150\n• Limpeza + Pasta Térmica: R$ 120\n• Troca de Tela/Bateria: Sob avaliação\n\nQual serviço você precisa?",
        "options" => [
            ["label" => "✅ Formatação", "action" => "whatsapp", "msg" => "Olá! Quero agendar a formatação do meu Notebook."],
            ["label" => "✅ Limpeza Interna", "action" => "whatsapp", "msg" => "Olá! Quero agendar a limpeza do meu Notebook."],
            ["label" => "✅ Orçamento de Peças", "action" => "whatsapp", "msg" => "Olá! Preciso de um orçamento para consertar defeitos no meu Notebook."],
            ["label" => "⬅️ Voltar", "target" => "categorias"]
        ]
    ],
    "precos_pc" => [
        "text" => "*Tabela Base - Computadores:*\n• Formatação Windows: R$ 120\n• Montagem (Trazendo as peças): R$ 250\n• Limpeza Profunda: R$ 180\n\nO que vamos fazer no seu PC?",
        "options" => [
            ["label" => "✅ Montar meu PC", "action" => "whatsapp", "msg" => "Olá! Tenho as peças e quero solicitar a montagem do meu PC."],
            ["label" => "✅ Limpeza Completa", "action" => "whatsapp", "msg" => "Olá! Preciso de uma limpeza profunda no meu PC."],
            ["label" => "✅ Identificar Defeito", "action" => "whatsapp", "msg" => "Olá! Meu computador está com defeito e preciso de diagnóstico."],
            ["label" => "⬅️ Voltar", "target" => "categorias"]
        ]
    ],

    // ==========================================
    // FLUXO 2: SETUPS INTEL E AMD (Novo)
    // ==========================================
    "setups_pc" => [
        "text" => "Montamos a máquina ideal para sua necessidade!\nEscolha a categoria do PC que você procura:",
        "options" => [
            ["label" => "🟢 Básico (Sem Placa de Vídeo)", "target" => "pc_basico"],
            ["label" => "🟡 Intermediário (Com Placa de Vídeo)", "target" => "pc_intermediario"],
            ["label" => "🔴 High-End (Máxima Performance)", "target" => "pc_highend"],
            ["label" => "⬅️ Voltar ao início", "target" => "inicio"]
        ]
    ],
    "pc_basico" => [
        "text" => "*Opções Básicas (Vídeo Integrado)* - Ideais para trabalho, estudo e jogos leves:\n\n*Opção AMD:* Processador AMD Ryzen 5 5600G, Placa-mãe ASUS TUF A520M, 16GB RAM DDR4, SSD 500GB NVMe, Gabinete Minimalista Pichau Office L2.\n\n*Opção Intel:* Core i5-12400, Placa-mãe H610M, 16GB RAM DDR4, SSD 500GB NVMe, Gabinete Office.\n\nQual base deseja orçar?",
        "options" => [
            ["label" => "✅ Orçamento AMD Básico", "action" => "whatsapp", "msg" => "Olá! Gostaria de um orçamento atualizado para o Setup Básico com AMD Ryzen."],
            ["label" => "✅ Orçamento Intel Básico", "action" => "whatsapp", "msg" => "Olá! Gostaria de um orçamento atualizado para o Setup Básico com Intel."],
            ["label" => "⬅️ Voltar", "target" => "setups_pc"]
        ]
    ],
    "pc_intermediario" => [
        "text" => "*Opções Intermediárias (C/ Placa de Vídeo)* - Para rodar tudo em Full HD com folga:\n\n*Opção AMD:* Processador AMD Ryzen 5 5600, Placa-mãe ASUS TUF Gaming B550M, 16GB RAM DDR4, RTX 4060 8GB, SSD 1TB, Gabinete Minimalista/Organizado.\n\n*Opção Intel:* Core i5-13400F, Placa-mãe B760M, 16GB RAM DDR4, RTX 4060 8GB, SSD 1TB, Gabinete ATX Gamer.\n\nQual das duas opções prefere?",
        "options" => [
            ["label" => "✅ Orçamento AMD Inter.", "action" => "whatsapp", "msg" => "Olá! Quero um orçamento do Setup Intermediário com AMD e RTX 4060."],
            ["label" => "✅ Orçamento Intel Inter.", "action" => "whatsapp", "msg" => "Olá! Quero um orçamento do Setup Intermediário com Intel e RTX 4060."],
            ["label" => "⬅️ Voltar", "target" => "setups_pc"]
        ]
    ],
    "pc_highend" => [
        "text" => "*Opções High-End* - Para 4K, edição pesada ou processamento avançado:\n\n*Opção AMD:* Processador AMD Ryzen 7 7800X3D, Placa-mãe ASUS TUF X670E, 32GB RAM DDR5, RTX 4070 Ti SUPER, SSD 2TB, Gabinete Premium.\n\n*Opção Intel:* Core i7-14700K, Placa-mãe Z790, 32GB RAM DDR5, RTX 4070 Ti SUPER, SSD 2TB, Gabinete Premium.\n\nQual monstro vamos montar?",
        "options" => [
            ["label" => "✅ Orçamento AMD High-End", "action" => "whatsapp", "msg" => "Olá! Quero montar a máquina High-End com Ryzen 7 e RTX 4070 Ti SUPER."],
            ["label" => "✅ Orçamento Intel High-End", "action" => "whatsapp", "msg" => "Olá! Quero montar a máquina High-End com Intel Core i7 e RTX 4070 Ti SUPER."],
            ["label" => "⬅️ Voltar", "target" => "setups_pc"]
        ]
    ],

    // ==========================================
    // FLUXO 3: INFORMAÇÕES
    // ==========================================
    "local" => [
        "text" => "Trabalhamos de forma ágil com coleta/entrega, ou você pode trazer o equipamento direto em nosso laboratório.\n\n* Diagnóstico médio: 24h\n* Garantia em todos os serviços.\n\nComo prefere seguir?",
        "options" => [
            ["label" => "🚚 Solicitar Coleta", "action" => "whatsapp", "msg" => "Olá, gostaria de saber como funciona a coleta de equipamentos na minha região."],
            ["label" => "📍 Ver Endereço/Laboratório", "action" => "whatsapp", "msg" => "Olá, podem me enviar a localização do laboratório de vocês?"],
            ["label" => "⬅️ Voltar ao início", "target" => "inicio"]
        ]
    ]
];

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>L.P. Tech | Assistência Avançada</title>

<link rel="icon" type="image/png" href="/img/favicon.ico">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


<link rel="stylesheet" href="css/style.css">


<style>

.testimonials-section { padding: 80px 0; background: rgba(13, 19, 38, 0.2); }

.swiper { width: 100%; padding-top: 20px; padding-bottom: 50px; }

.testimonial-card {

background: rgba(13, 19, 38, 0.6);

backdrop-filter: blur(10px);

border: 1px solid rgba(0, 243, 255, 0.1);

border-radius: 12px;

padding: 30px;

height: auto;

display: flex;

flex-direction: column;

justify-content: space-between;

gap: 15px;

}

.testimonial-client { display: flex; align-items: center; gap: 15px; margin-top: 15px; }

.testimonial-client img { width: 50px; height: 50px; border-radius: 50%; border: 2px solid #00F3FF; }

.testimonial-client h4 { color: #E2E8F0; font-size: 1rem; font-weight: 600; margin: 0; }

.testimonial-text { color: #8B9BB4; font-size: 0.95rem; font-style: italic; line-height: 1.5; }

.swiper-pagination-bullet { background: #8B9BB4 !important; }

.swiper-pagination-bullet-active { background: #00F3FF !important; box-shadow: 0 0 10px #00F3FF; }

</style>

</head>

<body>



<div class="cyber-grid"></div>



<header class="navbar">

<div class="container nav-content">

<div class="logo">

<i class="fa-brands fa-grav"></i> L.P. <span class="neon-text">TECH</span>

</div>

<nav>

<a href="#servicos" class="nav-link">Serviços</a>

<a href="#depoimentos" class="nav-link">Opiniões</a>

<a href="#contato" class="nav-link">Contato</a>

<a href="https://wa.me/<?php echo $whatsapp; ?>" class="btn-neon" target="_blank">WhatsApp</a>

</nav>

</div>

</header>



<section class="hero">

<div class="container hero-container">

<div class="hero-text">

<div class="badge">SISTEMA ONLINE</div>

<h1>Desempenho máximo para o seu <span class="neon-text">Setup</span>.</h1>

<p>Laboratório técnico especializado. Restauramos a performance de computadores e notebooks com precisão cirúrgica e tecnologia de ponta.</p>

<div class="hero-buttons">

<a href="#contato" class="btn-neon">Iniciar Diagnóstico</a>

<a href="#servicos" class="btn-outline">Ver Tecnologias</a>

</div>

</div>

<div class="hero-image">

<div class="hologram-effect">

<i class="fa-solid fa-laptop-code core-icon"></i>

<div class="scan-line"></div>

</div>

</div>

</div>

</section>



<section id="servicos" class="services">

<div class="container">

<h2 class="section-title">Protocolos de <span class="neon-text">Manutenção</span></h2>

<div class="cards-grid">

<?php foreach($servicos as $servico): ?>

<div class="glass-card">

<i class="fa-solid <?php echo $servico['icone']; ?> card-icon"></i>

<h3><?php echo $servico['titulo']; ?></h3>

<p><?php echo $servico['descricao']; ?></p>

</div>

<?php endforeach; ?>

</div>

</div>

</section>



<section id="estatisticas" class="stats-section">

<div class="container stats-grid">

<?php foreach($estatisticas as $stat): ?>

<div class="stat-item glass-card text-center">

<h2 class="neon-text stat-value"><?php echo $stat['valor']; ?></h2>

<p><?php echo $stat['texto']; ?></p>

</div>

<?php endforeach; ?>

</div>

</section>



<section id="depoimentos" class="testimonials-section">

<div class="container">

<h2 class="section-title">Relatos dos nossos <span class="neon-text">Clientes</span></h2>


<div class="swiper testimonialSwiper">

<div class="swiper-wrapper">

<?php foreach($depoimentos as $feedback): ?>

<div class="swiper-slide">

<div class="testimonial-card">

<p class="testimonial-text">"<?php echo $feedback['texto']; ?>"</p>

<div class="testimonial-client">

<img src="<?php echo $feedback['avatar']; ?>" alt="Avatar fictício de <?php echo $feedback['nome']; ?>">

<h4><?php echo $feedback['nome']; ?></h4>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

<div class="swiper-pagination"></div>

</div>

</div>

</section>



<section id="contato" class="contact-section">

<div class="container two-cols">

<div class="contact-info">

<h2 class="section-title text-left">Entre em contato <span class="neon-text">por e-mail</span></h2>

<p>Precisa de ajuda urgente? Preencha os dados ao lado para enviar uma notificação direta ao nosso laboratório ou inicie nosso assistente virtual pelo WhatsApp.</p>

<br><br>

<div class="contact-methods">

<a href="https://wa.me/<?php echo $whatsapp; ?>" target="_blank" class="method">

<i class="fa-brands fa-whatsapp"></i> (61) 99412-0829

</a>

</div>

</div>



<div class="contact-form-area">

<?php if($mensagem_sucesso): ?>

<div class="alert-success">

<i class="fa-solid fa-circle-check"></i> Dados recebidos com sucesso no servidor! Em breve retornaremos.

</div>

<?php endif; ?>


<form action="processa_formulario.php" method="POST" class="glass-form">

<div class="input-group">

<label for="nome">Nome / Empresa</label>

<input type="text" id="nome" name="nome" required placeholder="Digite seu nome">

</div>

<div class="input-group">

<label for="email">E-mail de Contato</label>

<input type="email" id="email" name="email" required placeholder="seu@email.com">

</div>

<div class="input-group">

<label for="mensagem">Descreva o problema do aparelho</label>

<textarea id="mensagem" name="mensagem" rows="4" required placeholder="Ex: Meu notebook não liga..."></textarea>

</div>

<button type="submit" class="btn-neon w-100">Enviar Diagnóstico</button>

</form>

</div>

</div>

</section>



<div class="chat-overlay" id="chat-overlay"></div>

<div class="chat-window" id="chat-window">

<div class="chat-header">

<div class="chat-profile">

<div class="avatar"><i class="fa-solid fa-robot"></i></div>

<div class="info">

<h4>Suporte L.P. Tech</h4>

<span><span class="status-dot"></span> Online</span>

</div>

</div>

<button class="close-chat" id="close-chat"><i class="fa-solid fa-xmark"></i></button>

</div>


<div class="chat-body" id="chat-body">

<div class="message bot-message">Olá! ⚡ Bem-vindo à L.P. Tech.</div>

<div class="message bot-message">Sou a IA de triagem. Para começarmos, como posso te chamar?</div>

</div>



<div class="chat-footer">

<div class="input-area" id="name-input-area">

<input type="text" id="user-name-input" placeholder="Digite seu nome...">

<button id="send-name-btn"><i class="fa-solid fa-paper-plane"></i></button>

</div>

<div class="options-area" id="options-area" style="display: none;"></div>

</div>

</div>



<button class="chat-fab" id="chat-fab">

<i class="fa-brands fa-whatsapp"></i>

<span class="ping"></span>

</button>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



<script>

document.addEventListener('DOMContentLoaded', () => {

new Swiper('.testimonialSwiper', {

loop: true,

autoplay: {

delay: 3500,

disableOnInteraction: false,

},

pagination: {

el: '.swiper-pagination',

clickable: true,

},

breakpoints: {

320: { slidesPerView: 1, spaceBetween: 20 },

768: { slidesPerView: 2, spaceBetween: 30 },

1024: { slidesPerView: 3, spaceBetween: 30 }

}

});

});

</script>



<script type="application/json" id="bot-flow-data">

<?php echo json_encode($bot_flow, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>

</script>

<script>const WHATSAPP_NUMBER = "<?php echo $whatsapp; ?>";</script>

<script src="js/script.js"></script>

</body>

</html>