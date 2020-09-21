<!DOCTYPE html>
<html>
<head>
	<style>
		#uyeler {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#uyeler td, #uyeler th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#uyeler tr:nth-child(even){background-color: #f2f2f2;}

		#uyeler tr:hover {background-color: #ddd;}

		#uyeler th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>

	<table id="uyeler">
		<tr>
			<th>Adı Soyadı</th>
			<th>Meslek</th>
			<th>Yaş</th>
		</tr>

		<?php echo view_cell('App\Libraries\ViewComponents::getUserView', ['type' => $type]); ?>

	</table>

</body>
</html>
