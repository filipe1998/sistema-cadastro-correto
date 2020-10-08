<?php
 require_once 'CLASSES/usuarios.php';
 require('conexao.inc.php');

 $u = new Usuario;


if(!empty(isset($_GET['id'])))
{
   $id_recebido = $_GET['id'];
   //echo "id_recebido: " . $id_recebido . "<br>";      
} else {
   echo "id não informado" . "<br>";
   exit();
}

if(!empty(isset($_GET['status'])))
{
  $status_recebido =  $_GET['status'];

  if ($status_recebido == "sucesso") {
    echo "<center>Cadastro atualizado com sucesso</center>";
  }  elseif  ($status_recebido == "erro") {
    echo "<center>Erro ao atualizar no BD</center>";


  }
    
  
}

 $consulta = "SELECT * FROM cadastro WHERE id_cadastro = '$id_recebido'"; 
 $resultado = mysqli_query($conexao, $consulta);
 $cadastro = mysqli_fetch_array($resultado);

if ($resultado) {

    $nome = $cadastro['nome'];
    $cpf = $cadastro['cpf'];
    $estado = $cadastro['estado'];
    $telefone = $cadastro['telefone'];
    $endereco = $cadastro['endereco'];

} 
?>



<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Atualizar</title>
    <link rel="stylesheet"  href="CSS/estilos.css">
</head>
<body>
    <div id="corpo-form-Cad">
   <h1>Atualizar Cadastro</h1>
   <form method="POST">
       <input type ="text" name= "nome" placeholder="Nome" value="<?php echo $nome; ?>" maxlength="30">
       <input type ="text" name= "cpf" placeholder="CPF" value="<?php echo $cpf; ?>" maxlength="30">
       <input type ="text" name= "estado" placeholder="Estado" value="<?php echo $estado; ?>" maxlength="50">
       <input type ="text" name= "telefone" placeholder="Telefone" value="<?php echo $telefone; ?>" maxlength="15">
       <input type ="text" name= "endereco" placeholder="Endereço" value="<?php echo $endereco; ?>" maxlength="15">
       
       <input type ="submit" value="Atualizar Cadastro">
       
       
   </form>
</div>

<?php
require('conexao.inc.php');

//verificar se clicou no botao
if(isset($_POST['endereco']))
{

    $nome = addslashes ($_POST['nome']);
    $cpf = addslashes ($_POST['cpf']);
    $estado = addslashes ($_POST['estado']);
    $telefone = addslashes ($_POST['telefone']);
    $endereco = addslashes ($_POST['endereco']);

    // verificar se nao esta vazio
    if(!empty($nome) && !empty($cpf) && !empty($estado) && !empty($telefone) && !empty($endereco))
    {

        $update_cadastro = "
         UPDATE `login`.`cadastro` SET
         `nome`='$nome',
         `cpf`='$cpf',
         `estado`='$estado',
         `telefone`='$telefone',
         `endereco`='$endereco'
          WHERE  `id_cadastro`=$id_recebido;
         ";

        $resultado = mysqli_query($conexao, $update_cadastro);

        if ($resultado) {

          
           // header('Location: update2.php?id=' . $id_recebido . '&status=sucesso');
           header('Location: listagem.php');

        } else { 

        

            header('Location: update2.php?id=' . $id_recebido . '&status=erro');
        }
    } else { 
        echo "Todos os campos de preenchimento obrigátorio";
    }

}

?>

</body>
</html>