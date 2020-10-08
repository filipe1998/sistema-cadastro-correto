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
    <div id="corpo-form">
    <img class ="imglogin" src ="IMAGENS/login.png";    
    <h1><p>Login</p></h1>
   <form method="POST" >
       <input type ="email" placeholder="Usuário" name="email">
       <input type ="password" placeholder="Senha" name="senha">
       <input type ="submit" value="Acessar">
       <a href="cadastrar.php">Primeira vez aqui?<strong>Cadastre-se!</strong>
   </form>
</div> 
<?php
if(isset($_POST['email']))
{
    $email = addslashes ($_POST['email']);
    $senha = addslashes ($_POST['senha']);
    // verificar se nao esta vazio
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("login", "localhost", "root", "");
        if($u->msgErro == "")
        {

            if($u->logar($email, $senha))
            {
                header("location: link.php");
            }else
            {
                echo "Email/ou senha incorretos!";
            }

        } else 
        {
        echo "ERRO: ".$u->msgErro;
        }
        
    }else
    {
        echo"Preencha todos os campos!";

    }

}


?>
</body>
</html>