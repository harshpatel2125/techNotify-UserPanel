<?php
	session_start();
	session_destroy();
	echo '<script>javascript:history.back()</script>';
?>