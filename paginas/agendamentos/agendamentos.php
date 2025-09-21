<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <script src='/salao_de_beleza/js/index.global.min.js'></script>
    <script src='/salao_de_beleza/js/core/locales-all.global.min.js'></script>
    <script src='/salao_de_beleza/js/custom.js'></script>
  </body>
</html>
