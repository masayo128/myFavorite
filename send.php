<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>好きなもの紹介 - Send Data</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container{
            width:90%;
            margin:0 auto;
        }
        h1{
            font-size:30px;
            text-align: center;
            margin-top:30px;
            margin-bottom:20px;
        }
        .container table{
            border:1px solid black;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            margin:0 auto;
        }
        th{
            width:15%;
            border:1px solid black;
        }
        td{
            height: 50px;
            border:1px solid black;
        }
        input{
            margin:20px;
        }
        p{
            text-align:center;
        }
    </style>
</head>
<body>

<?php
try {
    // DB名、ユーザー名、パスワードを変数に格納 (the same database connection information as in your original HTML file)
    $dsn = 'mysql:dbname=mountain;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
   
    $PDO = new PDO($dsn, $user, $password); // PDOでMySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDOのエラーレポートを表示
    
    $stmt = null; // Initialize the $stmt variable
    
    // Process the data from the form and insert it into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
       
        if (isset($_POST['delete'])) {
            $idToDelete = $_POST['delete'];
            
            // Prepare the SQL query to delete the row with the specified ID
            $deleteQuery = "DELETE FROM  form_list WHERE id = :id";
            $deleteStmt = $PDO->prepare($deleteQuery);
            $deleteStmt->execute(array(':id' => $idToDelete));

        } elseif (isset($_POST['deleteAll'])) {
            // テーブルを初期化（全データを削除し、IDを1から再設定）
            $resetAutoIncrementQuery = "TRUNCATE TABLE  form_list";
            $resetAutoIncrementStmt = $PDO->prepare($resetAutoIncrementQuery);
            $resetAutoIncrementStmt->execute();

        } else {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
        }
    }

    // Fetch data from the database, including the ID
    $sql = "SELECT id, name, address, tel, email, comment FROM form_list";
    $stmt = $PDO->query($sql);

    // Display the data in an HTML table
    echo "<div class='container'>";
    
    echo "<h1>お問い合わせリスト</h1>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>名前</th>";
    echo "<th>住所</th>";
    echo "<th>電話番号</th>";
    echo "<th>メールアドレス</th>";
    echo "<th>コメント</th>"; 
    echo "<th>削除</th>"; 
    echo "</tr>";
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";       
        echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['address'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . $row['tel'] . "</td>"; 
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['comment'] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='delete' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='削除'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }   
    echo "</table>";
    
    // "全データ削除" ボタン
    echo "<form method='post'>";
    echo "<input type='hidden' name='deleteAll' value='1'>";
    echo "<input type='submit' value='全データ削除'>";
    echo "</form>";
    
    echo "</div>";


} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
    die();
}
?>
    <p>
        <input type="button" onclick="location.href='form.php'" value="お問い合わせフォームへ戻る">
    </p>
</body>
</html>
