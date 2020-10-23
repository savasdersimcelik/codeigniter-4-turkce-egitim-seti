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
		<div class="jumbotron">
			<h1>Honeypot Kullanımı</h1>      
		</div>
		<form action="http://localhost/ci4/tr/honeypot" method="POST">
			<div class="form-group">
				<label>Eposta Adresiniz:</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Yorumunuz:</label>
				<textarea class="form-control" rows="5" name="comment"></textarea>
			</div>
			<button type="submit" class="btn btn-default">Gönder</button>
		</form>    
	</div>

</body>
</html>

<script type="text/javascript">
	var request = $.ajax({
		url: "http://localhost/ci4/api/v1/order/istekturu",
		type: "GET"
	});

	request.done(function(msg) {
		alert(msg);
	});

	request.fail(function(jqXHR, textStatus) {
		alert(textStatus);
	});
</script>

