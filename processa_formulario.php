<?php
// Script Backend para recebimento de dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(strip_tags($_POST['nome']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars(strip_tags($_POST['mensagem']));

    // Simulação de processamento bem-sucedido
    header("Location: index.php?sucesso=1#contato");
    exit;
} else {
    header("Location: index.php");
    exit;
}
