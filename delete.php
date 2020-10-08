<?php
 require_once 'CLASSES/usuarios.php';
 $u = new Usuario;

if(!empty(isset($_GET['id'])))
{
    $id_recebido = $_GET['id'];
    //echo "id_recebido: " . $id_recebido . "<br>";      
} else {
    echo "id não informado" . "<br>";
    exit();
}

?>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Delete</title>
    <link rel="stylesheet"  href="CSS/estilos.css">
    <a href = "listagem.php"><strong>Clique para retornar...<strong>
</head>

<body>
<?php
    require('conexao.inc.php');
    $del = "DELETE FROM cadastro WHERE id_cadastro = '$id_recebido'"; 
    $resultado = mysqli_query($conexao, $del);

    if ($resultado) {
        //echo "Cadastro excluido com sucesso";
        header('Location: listagem.php');

    } else
    {
        echo "Erro ao exluir cadastro";
    }


    mysqli_close($conexao);


   

?>




</html>
</body>
