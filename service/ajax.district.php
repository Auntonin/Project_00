<?php
include_once ('../condb.php');
$sql = "SELECT
t1.`code`,
t1.name_th
FROM
district AS t1
WHERE SUBSTR(t1.`code`,1,2) = '".substr($_POST['id'],0,2)."'
ORDER BY t1.name_th ASC";
$result = $conn->query($sql);
?>
<?php
$cnt = 0;
foreach ($result as $index => $value) :
    $arr[$cnt]['code'] = $value['code'];
    $arr[$cnt]['name'] = $value['name_th'];
    $cnt++;
endforeach;
echo json_encode($arr);
?>