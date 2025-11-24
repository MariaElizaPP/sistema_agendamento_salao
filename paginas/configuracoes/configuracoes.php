<?php
  session_start(); 
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
        header("Location: /paginas/login/login.php"); 
        exit(); 
    } 

?>

<link rel="stylesheet" href="css/configuracoes.css">

<div class="main-content">
  <header>
    <div class="titulos">
      <h3>Configurações</h3>
      <h4>Clique abaixo para sair da sua conta</h4>
    </div>
  </header>
  <section class="config-card">

    <a class="logout-link" href="#" id="btn-logout">
      <img src="/sistema_agendamento/icone_imagens/Logout/Logout.svg" alt="">
      Sair da conta
    </a>

  </section>

  <!-- Modal -->
  <div id="logout-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <img src="/sistema_agendamento/icone_imagens/atencao.svg" alt="Atenção">
        <h2>Atenção</h2>
      </div>

      <p class="modal-text">Tem certeza de que deseja sair?</p>

      <div class="modal-buttons">
        <button id="cancel-btn">Cancelar</button>
        <form action="paginas/logout/logout.php" method="post">
          <button type="submit" id="confirm-btn">Sair</button>
        </form>
      </div>
    </div>
  </div>


  </div>



<!-- JS -->
<script src="/sistema_agendamento/js/configuracoes.js"></script>





