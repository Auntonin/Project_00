<?php
include_once ('../condb.php');
$sql = "SELECT
t1.`code`,
t1.name_th
FROM
province AS t1
ORDER BY t1.name_th ASC";
$result = $conn->query($sql);
$cnt = 0;
foreach ($result as $index => $value) :
    $arr[$cnt]['code'] = $value['code'];
    $arr[$cnt]['name'] = $value['name_th'];
    $cnt++;
endforeach;
echo json_encode($arr);
?>