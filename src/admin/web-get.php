<?php
header('Content-type: text/json;charset=UTF-8');   //返回JSON数据格式
header('Access-Control-Allow-Origin:*');           //允许所有来源访问
header('Access-Control-Allow-Method:POST,GET');    //允许访问的方式

$db = new SQLite3('collection.sqlite3');
$statement = $db->prepare('select * from website');
$result = $statement->execute();

$data = array();
while ($row = $result->fetchArray()) {
    array_push($data,$row);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
