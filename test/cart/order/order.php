<?php
session_start();
require_once('../../../condb.php');

 print_r($_POST);
function updateQuantity($productID, $newQuantity) {
    $key = array_search($productID, $_SESSION["strProductID"]);
    if ((string)$key !== "") {
        $_SESSION["strQty"][$key] = $newQuantity;
    }
}
if(!isset($_SESSION["intLine"]))  
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["p_id"];   
	 $_SESSION["strQty"][0] = 1;                
	 header("location:../cart.php");
}
else
{
	$key = array_search($_GET["p_id"],$_SESSION["strProductID"]); 
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		updateQuantity($_GET["p_id"], $_POST["quantity"]);
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["p_id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
		 
	}
	 header("location:../cart.php");
}


?>