<?php
  session_start(); 
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
        header("Location: paginas/login/login.html"); 
        exit(); 
    } 

?>
<h3>Configuração</h3>

<form action="paginas/logout/logout.php" method="post">
  <button type="submit">Sair</button>
</form>
