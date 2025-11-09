<?php
  session_start(); 
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
        header("Location: paginas/login/login.html"); 
        exit(); 
    } 

?>
<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="/salao_de_beleza/css/custom.css" rel="stylesheet">
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'pt-br'
        });
        calendar.render();
      });
    </script>
  </head>
  <body>
    <div id='calendar'></div>
    
  <div class="modal fade" id="visualizarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="visualizarModalLabel">Visualizar detalhes do agendamento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <dl class="row">
          <dt class="col-sm-3">Serviço</dt>
          <dd class="col-sm-9" id="visualizar_servico"></dd>
          <dt class="col-sm-3">Data de inicio</dt>
          <dd class="col-sm-9" id="visualizar_inicio"></dd>
          <dt class="col-sm-3">Data de término</dt>
          <dd class="col-sm-9" id="visualizar_fim"></dd>
          <dt class="col-sm-3">Cliente</dt>
          <dd class="col-sm-9" id="visualizar_cliente"></dd>
          <dt class="col-sm-3">Descrição</dt>
          <dd class="col-sm-9" id="visualizar_descricao"></dd>
          <dt class="col-sm-3">Telefone</dt>
          <dd class="col-sm-9" id="visualizar_telefone"></dd>
          <dt class="col-sm-3">Valor</dt>
          <dd class="col-sm-9" id="visualizar_valor"></dd>
          <dt class="col-sm-3">Status</dt>
          <dd class="col-sm-9" id="visualizar_status"></dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Excluir</button>
        <button type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='/salao_de_beleza/js/index.global.min.js'></script>
    <script src='/salao_de_beleza/js/bootstrap5/index.global.min.js'></script>
    <script src='/salao_de_beleza/js/core/locales-all.global.min.js'></script>
    <script src='/salao_de_beleza/js/custom.js'></script>
  </body>
</html>
