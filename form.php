<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>好きなもの紹介</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  <!--// jQueryの読み込み--> 
</head>
<body>

<?php
try {
    $host = '127.0.0.1';
    $user = 'root';
    $pass = '';
    $db = 'mountain';

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $comment = $_POST["comment"];

        // Insert the form data into the database
        $sql = "INSERT INTO form_list (name, address, tel, email, comment) VALUES (:name, :address, :tel, :email, :comment)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ":name" => $name,
            ":address" => $address,
            ":tel" => $tel,
            ":email" => $email,
            ":comment" => $comment
        ));
    }
} catch (PDOException $e) {
    die("データベースに接続できませんでした: " . $e->getMessage());
}
?>


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


    <main>
        <h2>お問い合わせフォーム</h2>
        <form method="post" action="confirm.php" id="form">
            <p class="wrapper" data-wrapper>
                <label>
                    <span>名前（必須項目）: </span>
                    <input type="text" name="name">
                </label>
                <span class="errorMessage"></span>
            </p>
            <p class="wrapper" data-wrapper>
                <label>
                    <span>住所（必須項目）: </span>
                    <input type="text" name="address" required minlength="5" maxlength="30">
                </label>
                <span class="errorMessage"></span>
            </p>
            <p class="wrapper" data-wrapper>
                <label>
                    <span>電話番号（必須項目）: </span>
                    <input type="text" name="tel" required>
                </label>
                <span class="errorMessage"></span>
            </p>
            <p class="wrapper" data-wrapper>
                <label>
                    <span>email（必須項目）: </span>
                    <input type="email" name="email" required maxlength="30">
                </label>
                <span class="errorMessage"></span>
            </p>
            <p class="wrapper" data-wrapper>
                <label for="inquiry">お問い合わせ内容：</label></p><br>
                <textarea class="required maxlength showCount" data-maxlength="100" name="comment" id="comment" rows="5" cols="50" required></textarea>
            </p>
            <p>
                <input type="submit" value="送信">
            </p>
        </form>     
    <?php
        //empty()関数でチェック
        $name = @$_POST["name"];
        if (empty($name)) {
            echo "データが入力されていません。文字列を入力して「送信」をクリックしてください<br>
                ※0（ゼロ）は無効です";
        }else {
        echo "入力文字 ：".$name;
        }
    
    ?>
    </main>

    <footer class="footer">
        <div class="footer_copy">© 2023 Created by nakano</div>
    </footer>
</div>

<script src="js/validation.js"></script>
</body>
</html>