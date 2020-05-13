<?php session_start();

$_SESSION['login']="Walken99";
if(!isset($_SESSION['login']))
{
  header('Location: ../');
}
?>

<!-- SELECT chan.id, name, message FROM message, chan WHERE id_chan = chan.id GROUP by id_chan -->
<!DOCTYPE html><html class=''>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="../css/chat.css" rel="stylesheet">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
</head>

<body class="chat">

<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<p id="name_user"><?php echo $_SESSION['login'];?></p>
			</div>
		</div>
		<div id="channels">
		<!-- AFFICHAGE DES CANAUX DE DISCUSSION -->
      <ul id="liste_channel">	
			</ul>
    <!-- AFFICHAGE DES CANAUX DE DISCUSSION -->
		</div>
	</div>
	<div class="content">
		<div class="nom_canal">
			<p>Général</p>
		</div>
		<div class="messages">
			<ul>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Écrivez votre message..." />
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="../js/chat/chat.js"></script>
</body>
</html>