<?php
try {
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $db = 'mountain';

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
        $sql = "SELECT * FROM form_list";
        $sth = $pdo->prepare($sql);
        $sth->execute();

        $aryResult = $sth->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($aryResult);
    
} catch (PDOException $e) {
    // エラーが発生した場合はエラーメッセージを返す
    echo json_encode(['error' => 'データベースエラー: ' . $e->getMessage()]);
}
?>
