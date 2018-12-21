<?php
header('Content-type: text/json;charset=UTF-8');   //返回JSON数据格式
header('Access-Control-Allow-Origin:*');           //允许所有来源访问
header('Access-Control-Allow-Method:POST,GET');    //允许访问的方式

require_once '/www/wwwroot/lixuan.xyz/blog/wp-load.php';
$login = false;
if (is_user_logged_in()) {
  $login = true;
}

$db = new SQLite3('collection.sqlite3');
$statement = $db->prepare('select * from website');
$result = $statement->execute();

$data = array();
while ($row = $result->fetchArray()) {
    array_push($data,$row);
}
echo json_encode(array('login'=>$login,'data'=>$data), JSON_UNESCAPED_UNICODE);
