<?php
require_once('../condb.php');
$sql = "SELECT
*
FROM
category AS c1
ORDER BY c1.cate_name ASC";
$result = $conn->query($sql);
$cnt = 0;
foreach ($result as $index => $value) :
    $arr[$cnt]['id'] = $value['cate_id'];
    $arr[$cnt]['name'] = $value['cate_name'];
    $cnt++;
endforeach;
echo json_encode($arr);
?>