<?php
Class Usuario
{

    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try
        {
        $pdo = new PDO("mysql:dbname=".$nome. ";host=".$host, $usuario, $senha);
        } catch (PDOException $e)
        {
            $msgErro = $e->getMessage();

        }
    }
    public function cadastrar($nome, $telefone, $email,$senha)
    {
        global $pdo;
        //verifica o email se ta cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; // ja esta cadastrada
        } else
        {
            $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;

        // se nao cadastra normal
        

        }


    }

    public function cadastrarclientes($nome, $cpf, $estado,$telefone, $endereco)
    {
        global $pdo;
        //verifica o email se ta cadastrado
        $sql = $pdo->prepare("SELECT id_cadastro FROM cadastro WHERE cadastro = :w");
        $sql->bindValue(":w", $cpf);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; // ja esta cadastrada
        } else
        {

            $sql = $pdo->prepare("INSERT INTO cadastro(nome, cpf, estado, telefone, endereco) VALUES (:n, :c, :e, :t,:d)");
            $sql->bindValue(":n", "$nome");
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":e", $estado);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":d", $endereco);
            $sql->execute();
            return true;

 

        
            // se nao cadastra normal
        

        }


    }


    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se ja esta cadastrado, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; // conseguiu logar
                        // area privada
        }else
        {
            return false; // nao foi logado

        }

    }
    
}



?>