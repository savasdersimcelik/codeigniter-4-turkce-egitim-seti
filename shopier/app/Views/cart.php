<!DOCTYPE html>
<html>
<head>
    <title>Anasayfa | Savaş Dersim Çelik Eğitim Videoları</title>
</head>
<body>
<style>
    body { text-align: center; padding: 150px; }
    h1 { font-size: 50px; }
    body { font: 20px Helvetica, sans-serif; color: #333; }
    article { display: block; text-align: left; width: 850px; margin: 0 auto; }
    a { color: #dc8100; text-decoration: none; }
    a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>Sepetim</h1>
    <div>
        <p>Sepetteki ürünleriniz bu alanda listlenecek</p>
        <ul>
            <?php foreach ($cartList as $key => $value){ ?>
                <li><?php echo $value['name'] . ' | ' . $value['price']; ?></li>
            <?php } ?>
        </ul>
        <p><?php echo $button; ?></p>
        <p>&mdash; Savaş Dersim Çelik</p>
    </div>
</article>
</body>
</html>
