<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>G2FA Doğrulama Ekranı</h2>
    <form action="<?= current_url(); ?>" method="post">
        <div class="form-group">
            <label for="email">Doğrulama Kodu:</label>
            <input type="text" class="form-control" id="code" name="code">
        </div>
        <button type="submit" class="btn btn-default">Doğrula</button>
    </form>
</div>

</body>
</html>
