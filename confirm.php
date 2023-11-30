<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>好きなもの紹介_お問い合わせ確認</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        table ,th, td{
            margin:10px;
            border:1px solid #000;
        }
        th,td{
            width:200px;
            padding:10px;
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


        <main>
            <h2>送信内容確認</h2>
            <form action="complete.php" method="POST">
                <div name="content">
                    <table>
                        <tr>
                            <th>名前</th>
                            <td><?php echo $_POST["name"] ?></td>
                            <input type="hidden" name="name" value="<?php echo $_POST["name"] ?>" required>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td><?php echo $_POST["address"] ?></td>
                            <input type="hidden" name="address" value="<?php echo $_POST["address"] ?>" required>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td><?php echo $_POST["tel"] ?></td>
                            <input type="hidden" name="tel" value="<?php echo $_POST["tel"] ?>" required>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><?php echo $_POST["email"] ?></td>
                            <input type="hidden" name="email" value="<?php echo $_POST["email"] ?>" required>
                        </tr>
                        <tr>
                            <th>コメント</th>
                            <td><?php echo $_POST["comment"] ?></td>
                            <input type="hidden" name="comment" value="<?php echo $_POST["comment"] ?>" required>
                        </tr>
                    </table>
                </div>
                <div>
                    <button type="button" onclick="history.back(-1)">戻る</button>
                    <button type="submit">送信</button>
                </div>
            </form>
        </main>

        <footer class="footer">
            <div class="footer_copy">© 2023 Created by nakano</div>
        </footer>
    </div>


<script src="js/validation.js"></script>
</body>
</html>