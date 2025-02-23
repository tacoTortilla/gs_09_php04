<?php

function connect_to_db()
{
    $dbn='mysql:dbname=gs_08_php03;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
      return new PDO($dbn, $user, $pwd);
        } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
        }
}

//ログインチェックとセッションID更新関数
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] !== session_id()) {
    header('Location:login.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}

//アドミン権限チェック
function check_is_admin()
{
  if (!isset($_SESSION["is_admin"]) ||$_SESSION["is_admin"] !== 1) {
    header('Location:login.php');
    exit();
  } 
}



