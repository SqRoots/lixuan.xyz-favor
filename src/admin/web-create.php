<?php
header('Content-type: text/plain;charset=UTF-8');   //返回JSON数据格式
header('Access-Control-Allow-Origin:*');           //允许所有来源访问
header('Access-Control-Allow-Method:POST,GET');    //允许访问的方式

require_once '/www/wwwroot/lixuan.xyz/blog/wp-load.php';

if ( is_user_logged_in() ) {
  wp_get_current_user();
  switch ($_POST['catalog']) {
      case 'Web':
          $table = 'web';
          break;
      case 'Data':
          $table = 'data';
          break;
      case 'Software':
          $table = 'software';
          break;
      case 'Motto':
          $table = 'motto';
          break;
  }

  $db = new SQLite3('collection.sqlite3');
  $stmt = $db->prepare("
    insert into {$table}
    (user_id,name,name_cn,url,slogan,establisher,category,type,\"order\",visible,description_html)
    values
    (:user_id,:name,:name_cn,:url,:slogan,:establisher,:category,:type,:order,:visible,:description_html)
  ");

  $visible = $_POST["visible"]? 1:0;

  $stmt->bindValue(':user_id',           $user_ID,                   SQLITE3_INTEGER);
  $stmt->bindValue(':name',              $_POST["name"],             SQLITE3_TEXT);
  $stmt->bindValue(':name_cn',           $_POST["name_cn"],          SQLITE3_TEXT);
  $stmt->bindValue(':url',               $_POST["url"],              SQLITE3_TEXT);
  $stmt->bindValue(':slogan',            $_POST["slogan"],           SQLITE3_TEXT);
  $stmt->bindValue(':establisher',       $_POST["establisher"],      SQLITE3_TEXT);
  $stmt->bindValue(':category',          $_POST["category"],         SQLITE3_TEXT);
  $stmt->bindValue(':type',              $_POST["type"],             SQLITE3_TEXT);
  $stmt->bindValue(':order',             intval($_POST["order"]),    SQLITE3_INTEGER);
  $stmt->bindValue(':visible',           $visible,                   SQLITE3_INTEGER);
  $stmt->bindValue(':description_html',  $_POST["description_html"], SQLITE3_TEXT);
  $result = $stmt->execute();
  $db->close();
  echo '已添加';
} else {
  echo '【未登录】<br>';
  echo '仅管理员和作者有此权限！';
}
