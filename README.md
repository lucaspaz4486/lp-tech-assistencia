# L.P. Tech - Assistência Técnica Avançada ⚡

![Badge Status](https://img.shields.io/badge/Status-Concluído-success)
![PHP](https://img.shields.io/badge/PHP-Backend-777BB4?logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-Frontend-F7DF1E?logo=javascript&logoColor=black)

## 📌 Sobre o Projeto
Landing Page desenvolvida como parte de uma avaliação técnica para a vaga de Web Developer. O projeto simula o ambiente digital de um laboratório de manutenção tecnológica e montagem de computadores (Setups Intel/AMD), adotando uma identidade visual moderna (Dark Mode/Cyberpunk) com efeitos de Neon e Glassmorphism.

O grande diferencial deste projeto é a construção de uma **arquitetura limpa e eficiente**, separando o processamento de dados (Back-end) da interface do usuário (Front-end), com destaque para o motor lógico do Chatbot gerado via PHP.

## 🚀 Funcionalidades e Diferenciais Técnicos

* **🤖 Smart Chatbot via PHP:** Em vez de "chumbar" as respostas no JavaScript, toda a árvore de decisão do bot (menus, categorias de setups e orçamentos) é renderizada através de um *Array Associativo* em PHP. O Back-end codifica a lógica em JSON e o Front-end apenas a consome, tornando a manutenção e atualização de preços escalável e segura.
* **📬 Processamento de Formulário Seguro:** Envio de requisições via método `POST` tratadas por um arquivo PHP dedicado (`processa_formulario.php`), aplicando filtros de sanitização (`htmlspecialchars`, `filter_var`) e redirecionamento de estado.
* **🔄 Integração Assíncrona via JS:** Manipulação limpa do DOM (Vanilla JS) para a interface do Chatbot, simulando digitação, transições de layout e geração dinâmica de links diretos para a API do WhatsApp (`wa.me`).
* **✨ Carrossel Infinito:** Utilização da biblioteca `Swiper.js` para um display rotativo e responsivo de depoimentos de clientes.
* **🎨 Styling com SCSS:** Código estilizado com pré-processador SCSS, utilizando variáveis globais de cor, *mixins* para reaproveitamento de código (sombras neon e tipografia) e animações CSS fluídas.

## 🛠️ Tecnologias Utilizadas

* **Linguagem Principal:** PHP 8+
* **Front-end:** HTML5, SCSS / CSS3, JavaScript (ES6)
* **Bibliotecas/Ferramentas:** Font Awesome (Ícones), Swiper.js (Carrossel), Google Fonts (Inter & JetBrains Mono)
* **Ambiente de Desenvolvimento:** XAMPP / VS Code

## ⚙️ Como executar o projeto localmente

1. Certifique-se de ter o **PHP** instalado na sua máquina (recomenda-se o uso do XAMPP ou Laragon).
2. Faça o clone ou download deste repositório.
3. Mova a pasta do projeto para o diretório de servidor local (ex: `C:\xampp\htdocs\`).
4. Inicie o servidor Apache através do painel de controle do XAMPP.
5. Acesse no seu navegador: `http://localhost/nome-da-pasta-do-projeto/`
*(Nota: O projeto também pode ser testado rapidamente via extensão "PHP Server" do VS Code).*

## 👨‍💻 Autor

Desenvolvido com dedicação e foco em resolução criativa de problemas por **Lucas Da Silva Paz**.

[![GitHub Badge](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/lucas)