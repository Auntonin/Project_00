<?php
include_once '../condb.php';
// header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
// header('Content-Type: application/json; charset=utf-8');
    // print_r($_GET['id']);
//  echo $_POST['cate'] ;
if(isset($_POST['id']) && $_POST['id'] != '')
{
    $shop_id = trim($_POST['id']);
    $query = "SELECT  * FROM products WHERE id_shop= $shop_id";
    $result = $conn->query($query);
    if ($result) 
    {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $data[] = $row;
        }     
    }
    $i =0;
    foreach($data as $key){
        $data[$i]['images'] = "<img width='120' height='110' src='../img/product/" . $data[$i]['images'] . "'>";
        $data[$i]['product_name'] = "<p style='width: 300px;'>" . $data[$i]['product_name'] . " </p>";
        $i++;
    }
    $datax = array('data' => $data);
    echo json_encode($datax,JSON_UNESCAPED_UNICODE);

} else {
    echo "can't query";
    // print $query;
}

