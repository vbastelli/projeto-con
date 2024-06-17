<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Configuração básica para enviar email
    $destinatario = "contato@connessione.com.br"; // Substitua pelo seu endereço de email
    $assunto = "Nova mensagem de contato de $nome";
    $corpo_email = "Nome: $nome\n";
    $corpo_email .= "Email: $email\n";
    $corpo_email .= "Mensagem:\n$mensagem";

    // Cabeçalhos adicionais
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o email
    if (mail($destinatario, $assunto, $corpo_email, $headers)) {
        echo "<p>Email enviado com sucesso!</p>";
    } else {
        echo "<p>Ocorreu um erro ao enviar o email.</p>";
    }
}
?>
