<?php
session_start();
//print_r($_SESSION); exit;
if(isset($_SESSION['id_usu'])&&$_SESSION['id_usu']!=''){?>
	<script>
		document.location.href="principal.php";
	</script>
	<?php
}
else{?>
	<script>
		document.location.href="login.php";
	</script>
	<?php
}
?>