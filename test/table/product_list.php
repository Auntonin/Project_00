<?php
include_once '../../condb.php';
// header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
// header('Content-Type: application/json; charset=utf-8');
    print_r($_POST);
//  echo $_POST['cate'] ;
if(isset($_POST['5']) && $_POST['5'] != '')
{
    $cate_id = trim($_REQUEST['5']);
    // if($cate_id == "all"){
    //     $query = "SELECT p.*,c.cate_name
    //     FROM products p INNER JOIN category c 
    //     ON p.cate_id = c.cate_id 
    //     ORDER BY product_name";

    // }
    // else{
    //     $query = "SELECT p.*,c.cate_name
    //     FROM products p INNER JOIN category c 
    //     ON p.cate_id = c.cate_id 
    //     WHERE p.cate_id='$cate_id'
    //     ORDER BY product_name";
    // }
    $query = "SELECT  * FROM products WHERE cate_id= $cate_id";
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
    echo json_encode($datax,JSON_UNESCAPED_UNICODE);

} else {
    echo "can't query";
    // print $query;
}

