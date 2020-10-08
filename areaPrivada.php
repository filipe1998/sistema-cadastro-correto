
<?php
   session_start();
   if(!isset($_SESSION['id_usuario']))
   {
       header("location: link.php");
       exit;
   }
?>  

<?php
 require_once 'CLASSES/usuarios.php';
 $u = new Usuario;

?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet"  href="CSS/estilos.css">
</head>
<body>
<div id="corpo-form-Cad">
   <h1>Cadastro de Clientes 1.0</h1>
   <form method="POST">
       <input type ="text" name= "nome" placeholder="Nome" maxlength="30">
       <input type ="text" name= "cpf" placeholder="CPF" maxlength="30">
       <input type ="text" name= "estado" placeholder="Estado"maxlength="50">
       <input type ="text" name= "telefone"placeholder="Telefone"maxlength="15">
       <input type ="text" name= "endereco"placeholder="Endereço" maxlength ="25">
       <input type ="submit" value="Salvar">
       <a href="listagem.php"><strong><p>Listagem de Cadastros<p></strong>
       
       
    </form>
    
</div>
<?php

//verificar se clicou no botao
if(isset($_POST['cpf']))
{
    $nome = addslashes ($_POST['nome']);
    $cpf = addslashes ($_POST['cpf']);
    $estado = addslashes ($_POST['estado']);
    $telefone = addslashes ($_POST['telefone']);
    $endereco = addslashes ($_POST['endereco']);
    // verificar se nao esta vazio
    if(!empty($nome) && !empty($cpf) && !empty($estado) && !empty($telefone) && !empty($endereco))
    {
        $u->conectar("login","localhost", "root", "");
        if($u->msgErro == "")
        {
                if($u->cadastrarclientes($nome,$cpf,$estado,$telefone,$endereco))
                {
                
                    echo"<p>Cadastrado com sucesso!<p>";

                } else
                {
                    echo" já cadastrado!";
                }

            
        }
        
    
    

    } else
    {
        echo"Preencha todos os campos!";
 } 
}


?>

</body>
</html>