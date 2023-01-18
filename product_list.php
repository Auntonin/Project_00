<?php
include_once './config.php';
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
header('Content-Type: application/json; charset=utf-8');
//print_r($_POST);
if(isset($_REQUEST['cate']) && $_REQUEST['cate'] != '')
{
    $cate_id = trim($_REQUEST['cate']);

    $query = "SELECT  * FROM products WHERE cate_id=$cate_id";
    $result = $conn->query($query);
    if ($result) 
    {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $data[] = $row;
        }     
    }
    $datax = array('data' => $data);
    echo json_encode($datax, JSON_UNESCAPED_UNICODE);

} else {
    echo "can't query";
    //print $query;
}

