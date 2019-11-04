<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<title>Ошибка</title>
	<style type="text/css">
		body {
			height: 100vh;
			display: flex;
		}
		.errorMessage {
			background: orangered;
			max-width: 400px;
			margin: auto;
			text-align: center;
			padding: 5px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="errorMessage">
		<?=$error?> 
	</div>
</body>
</html>