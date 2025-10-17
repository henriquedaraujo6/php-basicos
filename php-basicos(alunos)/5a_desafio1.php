<?php
// Define variável para mensagens
$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $ano_nasc = intval($_POST["ano_nasc"] ?? 0);
    $ano_atual = date("Y");
    $idade = $ano_atual - $ano_nasc;

    if ($nome === "" || $ano_nasc <= 0) {
        $msg = "Por favor, preencha corretamente os campos.";
    } else {
        if ($idade >= 18) {
            $msg = "Acesso permitido, $nome!";
            // Salva no arquivo log_acessos.txt
            $linha = date("Y-m-d H:i:s") . " - $nome - $idade anos\n";
            file_put_contents("log_acessos.txt", $linha, FILE_APPEND | LOCK_EX);
        } else {
            $msg = "Acesso negado, $nome!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Verificador de Maioridade</title>
</head>
<body>
    <h1>Verificador de Maioridade</h1>

    <?php if ($msg): ?>
        <p><strong><?= htmlspecialchars($msg) ?></strong></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>
            Nome:<br />
            <input type="text" name="nome" required />
        </label>
        <br /><br />
        <label>
            Ano de Nascimento:<br />
            <input type="number" name="ano_nasc" min="1900" max="<?= date("Y") ?>" required />
        </label>
        <br /><br />
        <button type="submit">Verificar</button>
    </form>
</body>
</html>



