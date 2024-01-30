<?php
 



class crud
{

    function cadastrar_usuario($email, $senha)
    {
        include('conexao.php');
        if(isset($_POST['acao']))
        {
          
            $email = $_POST['email'];
            $senha = $_POST['senha'];
           
            // insere usuario ao banco //
            $result = mysqli_query($conexao, "INSERT INTO usuario(email,senha) 
            VALUES ('$email','$senha')");
    
            header('Location: ../view/index.php');
        }
    


    }

    function login_usuario($email, $senha)
    {

   
        include('conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {
    
        // confirma email e senha //
        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
    
            $email = $conexao->real_escape_string($_POST['email']);
            $senha = $conexao->real_escape_string($_POST['senha']);
    
            $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
    
            $quantidade = $sql_query->num_rows;
    // inicia sessão //
            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();
    
                if(!isset($_SESSION)) {
                    session_start();
                }
    
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['email'] = $usuario['email'];
    
                header("Location: ../view/inicio.php");
    
                // usuario nao existe //
            } else {
                echo "Usuario nao Encontrado!";
            }
    
        }
    }
        }



        function cadastrar_func($nome, $telefone, $funcao, $salario)
        {
            include('conexao.php');

            if (isset($_POST["submit"])) {
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $funcao = $_POST['funcao'];
                $salario = $_POST['salario'];
             // adiciona dados //
                $sql = "INSERT INTO `crud`(`id`, `nome`, `telefone`, `funcao`, `salario`) VALUES (NULL,'$nome','$telefone','$funcao','$salario')";
             
                $result = mysqli_query($conexao, $sql);
             // confirmação //
                if ($result) {
                   header("Location: ../view/inicio.php?msg=Novo Funcionário Adicionado Com Sucesso!!");
                } else {
                   echo "Failed: " . mysqli_error($conexao);
                }
             }

            }
             function excluir_func($id)
        {
            include('conexao.php');

            if (isset($_GET["submit"])) {
            $id = $_GET["id"];
            // exclui funcionario da tabela //
            $sql = "DELETE FROM `crud` WHERE id = $id";
            $result = mysqli_query($conexao, $sql);
            // confirmação de remoção //
            if ($result) {
              header("Location: ../view/inicio.php?msg=Funcionário Removido Com Sucesso!!");
            } else {
              echo "Failed: " . mysqli_error($conexao);
            }
            

        }



        }


        function editar_func($id, $nome, $telefone, $funcao, $salario)
        {
            include('conexao.php');

           

            if( isset($_POST['submit']) && isset($_POST['id']) )  { 
                $id = $_POST["id"];
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $funcao = $_POST['funcao'];
                $salario = $_POST['salario'];
            
                // edita dados do funcionario //
              $sql = "UPDATE `crud` SET `nome`='$nome',`telefone`='$telefone',`funcao`='$funcao',`salario`='$salario' WHERE id = $id";
            
              $result = mysqli_query($conexao, $sql);
            
              // confirmação de alteração //
              if ($result) {
                header("Location: ../view/inicio.php?msg=Funcionário Atualizado Com Sucesso!!");
              } else {
                echo "Failed: " . mysqli_error($conexao);
              }
            }





        }


    }











