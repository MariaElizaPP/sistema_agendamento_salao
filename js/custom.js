//executar quando o documento HTML for completamente carregado executa a função
document.addEventListener('DOMContentLoaded', function() {
    //receber o seletor (agendamentos.php - <div id='calendar'></div>) calendar do atributo ID
    var calendarEl = document.getElementById('calendar');

    //instanciando o FullCalendar.Calendar e atribuir a variável calendar
    //recebe todo o conteúdo a baixo
    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',
        //cria cabeçalho do calendário
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      //traduzir para o portugues
      locale: 'pt-br',

      initialDate: '2023-01-12',

      //permite clicar nos nomes dos dias da semana (em ingles a baixo)
      navLinks: true, // can click day/week names to navigate views

      //permite clicar e arrastar em vários dias
      selectable: true,

      //indica visualmente a área de seleção para confirmar
      selectMirror: true,

      //nao vou utilizar, mas tirar depois que colocar os modais do bootstrap

      /*select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },*/

      //permitir arrastar e redimensionar os eventos diretamente no calendario
      editable: true,

      //num maximo de eventos em um determinado dia, se for true o num de eventos sera limitado à altura da celula do dia
      dayMaxEvents: true, // allow "more" link when too many events

      events: '/salao_de_beleza/paginas/agendamentoCalendario/listar_agendamentos.php',

      eventClick: function (info){
        //receber seletor do modal
        const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));

        document.getElementById("visualizar_servico").innerText = info.event.title;
        document.getElementById("visualizar_inicio").innerText = info.event.start.toLocaleString();
        document.getElementById("visualizar_fim").innerText = info.event.end ? info.event.end.toLocaleString() : '';

        document.getElementById("visualizar_cliente").innerText = info.event.extendedProps.cliente;
        document.getElementById("visualizar_descricao").innerText = info.event.extendedProps.descricao;
        document.getElementById("visualizar_telefone").innerText = info.event.extendedProps.telefone;
        document.getElementById("visualizar_valor").innerText = info.event.extendedProps.valor;
        document.getElementById("visualizar_status").innerText = info.event.extendedProps.flagStatus;

        visualizarModal.show();
      }
    });

    calendar.render();
  });