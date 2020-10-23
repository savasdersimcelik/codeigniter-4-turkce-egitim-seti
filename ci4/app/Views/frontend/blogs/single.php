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
    article { display: block; text-align: left; width: 650px; margin: 0 auto; }
    a { color: #dc8100; text-decoration: none; }
    a:hover { color: #333; text-decoration: none; }
  </style>

  <article>
    <h1><?php echo lang('Home.post.title'); ?>: <?php echo $baslik; ?></h1>
    <div>
      <p><?php echo $icerik; ?></p>
      <p>&mdash; <?php echo $yazar; ?></p>
    </div>
  </article>
</body>
</html>