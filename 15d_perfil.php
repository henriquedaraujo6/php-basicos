<?php

// Inicia a sessão para acessar os dados salvos
session_start();

// Verifica se a sessão 'nome' NÃO existe. Se não existir, o usuário não está logado.
if (!isset($_SESSION['nome'])) {
    // Redireciona de volta para a página de login
    header('Location: 15d_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Seu Perfil</title>
</head>
<body style="background-color: <?php echo $_SESSION['cor_fundo']; ?>; font-family: sans-serif;">
    
    <h2>Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
    <p>Esta é sua página de perfil com sua cor preferida de fundo.</p>
    <p><a href="15d_logout.php">Sair e limpar perfil</a></p>

</body>
</html>

