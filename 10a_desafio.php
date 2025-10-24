<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Cadastro de Produtos</h2>
    <form method="post" action="">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" id="preco" required><br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome']);
        $preco = $_POST['preco'];

        // Valida se o nome não está vazio e se o preço é um número maior que 0
        if (!empty($nome) && is_numeric($preco) && $preco > 0) {
            // Conecta ao banco de dados
            $conn = new mysqli("localhost", "root", "Senai@118", "exercicio");

            if ($conn->connect_error) {
                die("<p style='color: red;'>Falha na conexão: " . $conn->connect_error . "</p>");
            }

            // Usa prepared statement para evitar SQL Injection
            $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (?, ?)");
            $stmt->bind_param("sd", $nome, $preco);

            if ($stmt->execute()) {
                echo "<p style='color: darkgreen;'>Produto cadastrado com sucesso!</p>";
            } else {
                echo "<p style='color: red;'>Erro ao cadastrar o produto: " . $stmt->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        } else {
            // Se a validação falhar, exibe uma mensagem de erro
            echo "<p style='color: red;'>Erro: preencha todos os campos corretamente. O preço deve ser maior que zero.</p>";
        }
    }
    ?>
</body>
</html>
