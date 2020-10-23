<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">

    <?php if (isset($success)) { ?>
      <div class="alert alert-success">
        <?php echo $success; ?>
      </div>
    <?php } ?>

    <?php if (isset($errors)) { ?>
      <?php foreach ($errors as $key => $value) { ?>
        <div class="alert alert-danger">
          <?php echo $value; ?>
        </div>
      <?php } ?>
    <?php } ?>


    <h2>NEW Views Yeni Kullanıcı</h2>
    <form action="http://localhost/ci4/admin/users/yenikullaniciekle2" method="POST">
      <div class="form-group">
        <label>Adı Soyadı:</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label>Eposta Adresi:</label>
        <input type="text" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label>Kullanıcı Adı:</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label>Telefon Numarası:</label>
        <input type="text" class="form-control" name="phone">
      </div>
      <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
  </div>

</body>
</html>
