<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Анализ robots.txt</title>
	<link rel="stylesheet"  href="../css/style.css">
</head>
<body>
    <div class="conteiner">
        <h2>Анализ файла robots.txt</h2>
        <form action="handler.php" method="post" name="robots">
            <label class="input-label" for="url_site">Проверяемый сайт</label>
            <br>
            <input type="text" name="url" id="url_site">
            <br><br>
            <input type="submit" value="Проверить">
        </form>
    </div>       
</body>
</html>