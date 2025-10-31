<?php
// Inicia a sessão para armazenar os dados do usuário
session_start();

//Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salva o nome e a cor escolhida nas variáveis de sessão
    $_SESSION [ 'nome'] = $_POST ['nome'];
    $_SESSION ['cor_fundo'] = $_POST['cor'];

    //Redireciona o usuário para a página de perfil
    header('Location: 15d_perfil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Desafio 3 - Login</title>
</head>
<body>
    <h2> Crie seu Perfil Temporário</h2>
    <form method="post">
        <label>Seu Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label> Escolha sua Cor de fundo Preferida:</label><br>
        <select name="cor" required>
            <option value="#e0f7fa"> Azul Claro</option>
            <option value="#b7f5e4ff"> Verde Claro</option>
            <option value="#ffd4f3ff"> Rosa Claro</option>
            <option value="#f9b9ffff"> Roxo Claro</option>
        </select><br><br>

        <button type="submit">Entrar</buttom>
    </form>
</body>
</html>
