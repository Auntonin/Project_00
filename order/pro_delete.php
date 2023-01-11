<?php

	session_start();

if (isset($_GET["Line"])) {
	$Line = $_GET["Line"];
	// echo $Line;
	$_SESSION["strProductID"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";

	// echo $_SESSION["strProductID"][$Line] = "";
	// echo $_SESSION["strQty"][$Line] = "";
}
	header("location:cart.php");

?>