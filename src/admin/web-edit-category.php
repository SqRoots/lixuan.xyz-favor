<?php
header('Content-type: text/plain;charset=UTF-8');   //返回JSON数据格式
header('Access-Control-Allow-Origin:*');           //允许所有来源访问
header('Access-Control-Allow-Method:POST,GET');    //允许访问的方式

require_once '/www/wwwroot/lixuan.xyz/blog/wp-load.php';

if ( is_user_logged_in() ) {
  // wp_get_current_user();

  $db = new SQLite3('collection.sqlite3');
  $stmt = $db->prepare('
    update web
    set
    category=:new_category,
    visible=:visible
    where category=:old_category
  ');

  $visible = $_POST['visible']? 1:0;
  $stmt->bindValue(':old_category',      $_POST['old_category'],     SQLITE3_TEXT);
  $stmt->bindValue(':new_category',      $_POST['new_category'],     SQLITE3_TEXT);
  $stmt->bindValue(':visible',           $visible,                   SQLITE3_INTEGER);
  $result = $stmt->execute();
  if(!$result){
    echo '修改失败！\n';
    echo $db->lastErrorMsg();
   } else {
     echo '已修改 '.$db->changes().' 记录！';
   }
  $db->close();
} else {
  echo '【未登录】<br>';
  echo '仅管理员和作者有此权限！';
}