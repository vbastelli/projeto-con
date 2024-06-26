document.getElementById('formulario-contato').addEventListener('submit', function(event) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);
    var mensagemSucesso = document.getElementById('mensagem-sucesso');
    var botaoEnviar = document.getElementById('botao-enviar');

    fetch('enviar_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        mensagemSucesso.textContent = data;
        mensagemSucesso.style.display = 'block';

        form.reset();
        botaoEnviar.textContent = 'Enviar novamente';
    })
    .catch(error => {
        mensagemSucesso.textContent = 'Ocorreu um erro ao enviar o email.';
        mensagemSucesso.style.display = 'block';
    });
});