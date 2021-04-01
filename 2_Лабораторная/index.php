<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    <title>Lab-2</title>
</head>
<body>
    <header>
      <div class="head">
        <h1>Жидов Артем Валерьевич </h1>
        <h2>Группа 201-322 Лабораторная № 2</h2>
      </div>
      <img src="mospoly.png" alt="text">
    </header>

    <main>
      <form action="" method="post">
        <label for="type"></label>
        <input type="text" id="type" name="type" size="20">
        <button type="submit">Ввести</button>
      </form>
      <?php
      $x = 1; // начальное значение аргумента
      $y = 1;
      $average = 0;
      $encounting = 1000; // количество вычисляемых значений
      $max_value = 1000; // максимальное значение, останавливающее вычисления
      $min_value = -1000; // минимальное значение, останавливающее вычисления
      $step = 2;     // шаг изменения аргумента
      $type = $_POST['type'];
      switch ($type) {
          case 'B':
              echo '<ul>';
              break;
          case 'C':
              echo '<ol>';
              break;
          case 'D':
              echo
              '<table class="table">
                    <thead>
                      <tr>
                        <th scope="col">№</th>
                        <th scope="col">Значение x</th>
                        <th scope="col">Значение f(x)</th>
                      </tr>
                    </thead>
                    <tbody>';
              break;
          case 'E':
              echo '<div class="container">';
              break;
      }
      for ($i = 0; $i < $encounting; $i++, $x += $step)
       {
          if ($x <= 10)
          {   if ($x === 10)
                  $y = 'error';
              else
                  $y = (3/$x) + ($x/3) - 5;
          }
          else
          if ($x > 10 && $x < 20)
              $y = ($x - 7) * ($x / 8);
          else
          if ($x >= 20)
              $y = 3 * $x + 2;

          $y=round( $y,3);

          if ($y >= $max_value || $y < $min_value)
              break;
          if ($y > $max_y)
              $max_y = $y;
          if ($y < $min_y)
              $min_y = $y;
          $average += $y;


        switch ($type) {
            case 'A':
                if ($i != 0)
                    echo '<br>f(' . $x . ') = ' . $y;
                break;
            case 'B':
            case 'C':
                echo '<li>f(' . $x . ') = ' . $y . '</li>';
                break;
            case 'D':
                echo
                    '<tr>
                      <td>' . ($i + 1) . '</td>
                      <td>' . $x . '</td>
                      <td>' . $y . '</td>
                    </tr>';
                  break;
            case 'E':
                echo '<div class="type-E"> f(' . $x . ') = ' . $y . '</div>';
                break;
        }
    }
    switch ($type) {
        case 'B':
            echo '</ul>';
            break;
        case 'C':
            echo '</ol>';
            break;
        case 'D':
            echo '</tbody></table>';
            break;
        case 'E':
            echo '</div>';
            break;
    } // выводим значение функции
  ?>
    </main>
    <footer>
      <?php
      echo
          '<div class="footer">
              <p>Максимальное значение - ' . $max_y . '</p>
              <p>Минимальное значение - ' . $min_y . '</p>
              <p>Сумма элементов - ' . $average . '</p>
              <p>Среднее арифметическое - ' . round($average / ($i + 1), 2) . '</p>
          </div>'
      ?>
    </footer>
</body>
</html>
