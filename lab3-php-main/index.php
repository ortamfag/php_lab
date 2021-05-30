<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Жидов А. В. Группа 201-322. Лабораторная работа №3</title>
</head>

<body>
<header class="header">
		<img class="header__logo-img" src="images/logo.png" alt="Mospolytech">
		<a href="/" class="header__logo">№6 | Жидов Артем Валерьевич | 201-322</a>
	</header>

    <main>
        <div class="calculator">
            <?php
            if (!(isset($STORE))) {
                $STORE = '';
                $presses = 0;
            }

            if (isset($_GET['num'])) {
                $presses = $_GET['presses'] + 1;
                $STORE = $_GET['store'] . $_GET['num'];
            }

            if (isset($_GET['reset'])) {
                $presses = $_GET['presses'] + 1;
                $STORE = '';
            }
            echo '<div class="result">' . $STORE . '</div>';
            ?>

            <div class="keyboard">
                <a href='/?presses=<?php echo $presses ?>&num=1&store=<?php echo $STORE; ?>'>1</a>
                <a href='/?presses=<?php echo $presses ?>&num=2&store=<?php echo $STORE; ?>'>2</a>
                <a href='/?presses=<?php echo $presses ?>&num=3&store=<?php echo $STORE; ?>'>3</a>
                <a href='/?presses=<?php echo $presses ?>&num=4&store=<?php echo $STORE; ?>'>4</a>
                <a href='/?presses=<?php echo $presses ?>&num=5&store=<?php echo $STORE; ?>'>5</a>
                <a href='/?presses=<?php echo $presses ?>&num=6&store=<?php echo $STORE; ?>'>6</a>
                <a href='/?presses=<?php echo $presses ?>&num=7&store=<?php echo $STORE; ?>'>7</a>
                <a href='/?presses=<?php echo $presses ?>&num=8&store=<?php echo $STORE; ?>'>8</a>
                <a href='/?presses=<?php echo $presses ?>&num=9&store=<?php echo $STORE; ?>'>9</a>
                <a href='/?presses=<?php echo $presses ?>&num=0&store=<?php echo $STORE; ?>'>0</a>
                <a class="reset" href='/?presses=<?php echo $presses ?>&reset=Y'>СБРОС</a>
            </div>
        </div>

    </main>
    <footer>
        <p><?php echo $presses ?></p>
    </footer>
</body>

</html>