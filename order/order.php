<?php
session_start();
require_once('../condb.php');

if(!isset($_SESSION["intLine"]))  
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["p_id"];   
	 $_SESSION["strQty"][0] = 1;                
	 header("location:cart.php");
}
else
{
	
	$key = ($_GET["p_id"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["p_id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	 header("location:cart.php");
}
?>