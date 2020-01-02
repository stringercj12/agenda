<?php session_start(); ?>
  <!DOCTYPE html>
  <html>
    <head>
	<title>Agenda WEB Com Materialize</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <style type="text/css">
 			
	 		body{
	 			background-color: #e0e0e0;
	 		}
 		</style>
    </head>

    <body>

  <div class="fixed-action-btn click-to-toggle toolbar" style="bottom:45px; right:24px;">
  <a class="btn-floating btn-lage red">
    <i class="lage material-icons">mode_edit</i>
  </a>
  <ul>
    <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">account_box</i> Contatos</a></li>
    <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">people</i> Usuários</a></li>
    <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">event</i> Eventos</a></li>
    <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">perm_contact_calendar</i> Calendário</a></li>
    <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">attach_file</i> Suporte</a></li>
  </ul>
</div>
    
 <!--Import jQuery before materialize.js-->
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../css/js/materialize.js"></script>
      
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      direction: 'left',
      hoverEnabled: false,
      toolbarEnabled: true
    });
  });

  // Or with jQuery

  $('.fixed-action-btn').floatingActionButton({
    toolbarEnabled: true
  });
       
  </script>
    </body>
  </html>