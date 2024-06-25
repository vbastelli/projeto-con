<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input (basic validation example)
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $mensagem = trim($_POST['mensagem']);

    if (empty($nome) || empty($email) || empty($mensagem)) {
        // Handle case where required fields are empty
        echo "Todos os campos são obrigatórios.";
        exit; // Stop further execution
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "O email inserido não é válido.";
        exit; // Stop further execution
    }

    // Sanitize input (optional but recommended)
    $nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $mensagem = filter_var($mensagem, FILTER_SANITIZE_STRING);

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
        // Exibe mensagem de sucesso
        echo "Email enviado com sucesso!";
    } else {
        // Exibe mensagem de erro
        echo "Ocorreu um erro ao enviar o email.";
    }
}
?>
