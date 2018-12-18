<?php
header('Content-type: text/plain;charset=UTF-8');   //返回JSON数据格式
header('Access-Control-Allow-Origin:*');           //允许所有来源访问
header('Access-Control-Allow-Method:POST,GET');    //允许访问的方式

require_once '/www/wwwroot/lixuan.xyz/blog/wp-load.php';
if (  is_user_logged_in() ) {
    $db = new SQLite3('collection.sqlite3');
        $statement = $db->prepare('delete FROM website WHERE id = :id;');
        $statement->bindValue(':id', $_GET["id"]);
        $result = $statement->execute();
        $db->close();
        echo '已删除';
} else {
        echo '未登录';
        echo $_GET['id'];
}

