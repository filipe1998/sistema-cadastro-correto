<?php
 require_once 'CLASSES/usuarios.php';
 $u = new Usuario;

?>

<html lang="pt-br">
<head>
<body>
    <meta charset="utf-8"/>
    <title>Listagem de Cadastros</title>
    <link rel="stylesheet"  href="CSS/estilos.css">
    <table>
         
        <tr id ="titulo">
            <th>id_cadastro</hd>
            <th>Nome</th>
            <th>CPF</th>
            <th>Estado</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
      
        <?php
        
        require('conexao.inc.php');
        $resultado = mysqli_query($conexao,"SELECT * from cadastro");

        echo "<tr>";
     
        while($linha = mysqli_fetch_assoc($resultado)){

        echo "<br><br>
        <td>{$linha['id_cadastro']}</td>
        <td>{$linha['nome']}</td>
        <td width='20%'>{$linha['cpf']}</td>
        <td>{$linha['estado']}</td>
        <td>{$linha['telefone']}</td>
        <td>{$linha['endereco']}</td>
        <td><a href='update2.php?id={$linha['id_cadastro']}'>Editar</a></td>
        <td><a href='delete.php?id={$linha['id_cadastro']}'>Deletar</a></td>
        </tr>";
        }
   
        ?>

</table>
<a id = "retorna-cadastro" href ="areaprivada.php"><strong>Clique e retorne ao cadastro de informações...</strong></a>
</head>
</body>
</html>