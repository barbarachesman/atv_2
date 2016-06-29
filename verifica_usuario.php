<?php
if(!isset($_SESSION))	session_start();
include('inc/config.php');

        include "inc/config.php";

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $qry = "SELECT * FROM usuarios WHERE login='".$login."' AND senha='".$senha."'";
        $qrx = "SELECT * FROM clientes WHERE login='".$login."' AND senha='".$senha."'";

        $sql =  mysql_query($qry) or print_r(mysql_error());
        $sqx =  mysql_query($qrx) or print_r(mysql_error());
        $login_check = mysql_num_rows($sql);
        $login_check1 = mysql_num_rows($sqx);
        if(!isset($_SESSION))	session_start();

        if ($login_check > 0){
          $row = mysql_fetch_array($sql);

            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['tipo'] = $row['tipo'];

          header("Location: index.php");
        }
         if ($login_check1 > 0){
          $row = mysql_fetch_array($sqx);

            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['tipo'] = $row['tipo'];

          header("Location: index.php");
        }else{

          echo "Você não pode logar-se! Este usuário e/ou senha não são válidos!<br />
          Por favor tente novamente!<br />";

          include "formulario_login.html";

        }
        ?>
