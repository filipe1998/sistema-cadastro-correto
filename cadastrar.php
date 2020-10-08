<?php
 require_once 'CLASSES/usuarios.php';
 $u = new Usuario;

?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastrar Clientes</title>
    <link rel="stylesheet"  href="CSS/estilos.css">
</head>
<body>
    <div id="corpo-form-Cad">
   <h1>Cadastrar</h1>
   <form method="POST">
       <input type ="text" name= "nome" placeholder="Nome" maxlength="30">
       <input type ="text" name= "telefone" placeholder="Telefone" maxlength="30">
       <input type ="text" name= "email" placeholder="Usuário"maxlength="50">
       <input type ="password" name= "senha"placeholder="Senha"maxlength="15">
       <input type ="password" name= "confSenha"placeholder="Confirmar Senha">
       <input type ="submit" value="Cadastrar">
       <a href="login.php"><strong><p>Clique para retornar...<p></strong>
       
   </form>
</div>
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
    $nome = addslashes ($_POST['nome']);
    $telefone = addslashes ($_POST['telefone']);
    $email = addslashes ($_POST['email']);
    $senha = addslashes ($_POST['senha']);
    $confirmarSenha = addslashes ($_POST['confSenha']);
    // verificar se nao esta vazio
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("login","localhost", "root", "");
        if($u->msgErro == "")
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$telefone,$email,$senha)){
                    echo"Cadastrado com sucesso!";

                } else
                {
                    echo"Email já cadastrado!";
                }

            } else
            {
                echo"As senhas nnão conferem!";
            }
            

        } else 
        {
            echo"Erro".$u->msgErro;

        }

    } else
    {
        echo"Preencha todos os campos!";
    }

}

?>

</body>
</html>