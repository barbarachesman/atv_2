<?php
$login = $_POST['login'];
$senha = $_POST['senha'];
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysql_query($query_select);
$array = mysql_fetch_array($select);
$logarray = $array['login'];
 
                $query = "INSERT INTO usuarios VALUES ('','','$login','$senha','')";
                $insert = mysql_query($query);
                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
                }
            }
        }
?>
