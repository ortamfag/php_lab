<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="style.css">
</head>
<body>

	<header class="header">
		<img class="header__logo-img" src="images/logo.png" alt="Mospolytech">
		<a href="/" class="header__logo">№6 | Жидов Артем Валерьевич | 201-322</a>
	</header>

	<main>
		<form name="Test" method="POST" class="main-form" action="sort.php" target="_blank">   
			<div>
				<h3>Таблица элементов</h3> 
				<table id="elements" class="table">
					<tr>
						<td>№1</td>
						<td class="element-row">
							<input type="text" name="element0">
						</td>
					</tr>
				</table>

				<input type="hidden" name="arrLength" id="arrLength" class="arrLength" value="1">
			</div>
			<div style="text-align: right;">
				<button type="button" name="add" class="form-btn addElement">Добавить еще один элемент</button>
			</div>
			
			<div>
				<h3>Cпособ сортировки</h3>
				<select name="opt">
					<option>Сортировка выбором</option>
					<option>Пузырьковый алгоритм</option>
					<option>Алгоритм Шелла</option>
					<option>Алгоритм садового гнома</option>
					<option>Быстрая сортировка</option>
					<option>Встроенная функция PHP для сортировки списков по значению</option>
				</select>
			</div>
			<div class="btn-sort">
				<button type="submit" name="sort" id="idsort" class="form-btn">Сортировать массив</button>
			</div>
		</form>
	</main>

	<footer><?php echo "<p> &nbsp; Сформировано:" . date("d.m.Y в H-i.s") . "</p>"; ?></footer>

	<script>
		const addElementBtn = document.querySelector('.addElement');
		const arrLengthEl = document.querySelector('.arrLength');
		const table = document.querySelector('.table');

		addElementBtn.addEventListener('click', () => {
			const el = document.createElement('tr');

			const countEl = table.querySelectorAll('tr').length + 1;

			el.innerHTML = `<tr>
					<td>№${ countEl }</td>
						<td class="element-row">
							<input type="text" name="element${ countEl - 1}">
						</td>
					</tr>
			`;

			arrLengthEl.setAttribute('value', countEl);

			table.append(el);
		})
	</script>
</body>
</html>
