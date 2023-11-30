<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>好きなもの紹介_送信完了</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        h2{
            margin-top:50px;
            margin-left:150px;
        }
        p{
            margin-top:30px;
            margin-left:150px;
        }
        table {
            margin-bottom:50px;
            border:1px solid #000;
        }
        th,td{
            width:200px;
            padding:10px;
            border:1px solid #000;
        }
    </style>
</head>

<body>
    <div class="footerFixed">
        <header>
            <h1 class="header_title">
                <a href="index.html">山が好き！</a>
            </h1>       
        </header>

        <nav>
            <ul>
                <li><a href="">好きな山</a></li>
                <li><a href="">高山植物</a></li>
                <li><a href="">ＭＡＰ</a></li>
                <li class="current"><a href="">お問い合わせ</a></li>
            </ul>

        </nav>

<?php
try {
    // DB名、ユーザー名、パスワードを変数に格納 (the same database connection information as in your original HTML file)
    $dsn = 'mysql:dbname=mountain;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
   
    $PDO = new PDO($dsn, $user, $password); // PDOでMySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDOのエラーレポートを表示

    //$stmt = null; // Initialize the $stmt variable

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        
        // Check if the data already exists in the database
        $checkQuery = "SELECT id FROM form_list WHERE name = :name AND address = :address and tel = :tel and email = :email and comment = :comment";
        $checkStmt = $PDO->prepare($checkQuery);
        $checkStmt->execute(array(':name' => $name, ':address' => $address,':tel' => $tel,':email' => $email,':comment' => $comment));
        
        if ($checkStmt->rowCount() === 0) {
            
            // Data doesn't exist, insert it
            $sql = "INSERT INTO form_list (name, address, tel, email, comment) VALUES (:name, :address, :tel, :email, :comment)";
            $stmt = $PDO->prepare($sql);
            $params = array(':name' => $name, ':address' => $address, ':tel' => $tel, ':email' => $email,':comment' => $comment);
        
            $stmt->execute($params);
        }
    }

    // データの挿入が成功した場合、成功メッセージを表示
    echo "<h2>送信完了</h2>";
    echo "<p>下記の内容で登録されました。</p>";
    
} catch (PDOException $e) {
    echo "エラー: " . $e->getMessage();
}
?>

        <main>
            <form action="send.php" method="POST">
                <div name="content">
                    <table>
                        <tr>
                            <th>名前</th>
                            <td><?php echo $_POST["name"] ?></td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td><?php echo $_POST["address"] ?></td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td><?php echo $_POST["tel"] ?></td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><?php echo $_POST["email"] ?></td>
                        </tr>
                        <tr>
                            <th>コメント</th>
                            <td><?php echo $_POST["comment"] ?></td>
                        </tr>
                    </table>
                </div>           
                
            </form>

            <div>
                <button type="button"><a href="form.php">お問い合わせフォームに戻る</a></button>
            </div>
            
        </main>

        <footer class="footer">
            <div class="footer_copy">© 2023 Created by nakano</div>
        </footer>
    </div>


<script src="js/validation.js"></script>
</body>
</html>