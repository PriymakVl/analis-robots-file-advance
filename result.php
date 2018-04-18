<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Анализ robots.txt</title>
	<link rel="stylesheet"  href="css/style.css">
</head>
<body>
    <div class="conteiner">
        <h2>Результаты анализа файла robots.txt на сайте <span><?=$url->host?></span></h2>
        <table>
            <tr>
                <th>№</th>
                <th width="290">Название проверки</th>
                <th>Статус</th>
                <th colspan="2">Текущее состояние</th>
            </tr>

            <!-- exist file -->
            <tr>
                <td rowspan="2" class="number-cell not-top-border">1</td>
                <td rowspan="2" class="check-name-cell not-top-border">Проверка наличия файла robots.txt</td>
                <td rowspan="2" class="status-cell not-top-border" style="<?=$response['exist_file']['style']?>"><?=$response['exist_file']['status']?></td>
                <td class="current-state-key-cell not-top-border">Состояние</td>
                <td class="current-state-value-cell not-top-border"><?=$response['exist_file']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['exist_file']['recommendation']?></td>
            </tr>
			
			<!-- exist host -->	
            <tr>
                <td rowspan="2" class="number-cell">2</td>
                <td rowspan="2" class="check-name-cell">Проверка указания директивы Host</td>
                <td rowspan="2" class="status-cell" style="<?=$response['exist_host']['style']?>"><?=$response['exist_host']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['exist_host']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['exist_host']['recommendation']?></td>
            </tr>
			
			<!-- count host -->
			<? if ($revision->numHost): ?>
				<tr>
					<td rowspan="2" class="number-cell">3</td>
					<td rowspan="2" class="check-name-cell">Проверка количества директив Host, прописанных в файле</td>
					<td rowspan="2" class="status-cell" style="<?=$response['count_host']['style']?>"><?=$response['count_host']['status']?></td>
					<td class="current-state-key-cell">Состояние</td>
					<td class="current-state-value-cell"><?=$response['count_host']['description']?></td>
				</tr>
				<tr>
					<td class="current-state-key-cell">Рекомендации</td>
					<td class="current-state-value-cell"><?=$response['count_host']['recommendation']?></td>
				</tr>
			<? endif; ?>
			
			<!-- exist sitemap -->
            <tr>
                <td rowspan="2" class="number-cell">4</td>
                <td rowspan="2" class="check-name-cell">Проверка указания директивы Sitemap</td>
                <td rowspan="2" class="status-cell" style="<?=$response['exist_sitemap']['style']?>"><?=$response['exist_sitemap']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['exist_sitemap']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['exist_sitemap']['recommendation']?></td>
            </tr>

            <!-- size file -->
            <tr>
                <td rowspan="2" class="number-cell">5</td>
                <td rowspan="2" class="check-name-cell">Проверка размера файла robots.txt</td>
                <td rowspan="2" class="status-cell" style="<?=$response['file_size']['style']?>"><?=$response['file_size']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['file_size']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['file_size']['recommendation']?></td>
            </tr>

            <!-- code response -->
            <tr>
                <td rowspan="2" class="number-cell">6</td>
                <td rowspan="2" class="check-name-cell">Проверка кода ответа сервера для файла robots.txt</td>
                <td rowspan="2" class="status-cell" style="<?=$response['code_response']['style']?>"><?=$response['code_response']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['code_response']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['code_response']['recommendation']?></td>
            </tr>
        </table>
        <div class="link-box">
			<ul>
				<li><a href="/" >Провести анализ файла robots.txt</a></li>
				<li><a href="handler.php?url=<?=$url->host?>">Сохранить данные в файл</a></li>
			</li>
        </div>
    </div>
</body>
</html>