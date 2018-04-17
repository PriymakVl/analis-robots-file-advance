<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Страница ошибок</title>
	<link rel="stylesheet"  href="css/style.css">
</head>
<body>
    <div class="conteiner">
        <h2>При анализе файла произошла следующая ошибка</h2>
        <div class="eroor-message">
            <?=$error?>
        </div>
        <div class="come-back">
            <a href="/" >Провести анализ файла robots.txt</a>
        </div>
    </div>          
</body>
</html>