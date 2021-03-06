<?php require_once("cabecalho.php");
require_once("banco-produto.php"); ?>

<?php
$id = $_POST['id'];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];
// verifica se a chave esta ativa
if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}


//funcao para adicionar os produtos
if (alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
    <p class="text-success">O produto <?= $nome; ?>, <?= $preco; ?> Alterado com sucesso!</p>
    <?php
    header("Refresh: 10;url=produto-lista.php");
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O produto nao foi salvo, <?= $nome; ?> <br>Ocorreu um erro: <?= $msg ?></p>
    <?php
    header("Refresh: 10;url=produto-lista.php");
}
?>

<?php include("rodape.php"); ?>
