<?php
session_start();

    if (!isset($_REQUEST['logmeout'])){
      echo "Você realmente deseja sair da área restrita?<br />";
      echo "<a href=\"index.php?logmeout\">Sim</a> | ";
      echo "<a href=\"javascript:history.go(-1)\">Não</a>";
    }
    else{
      session_destroy();
      if (!session_is_registered('nome')){
        echo "<strong>Você não está mais logado em nosso site!</strong>";
        echo "<br /><br /><strong>Login:</strong><br /><br />";
        include "index.html";
    }
}
?>
