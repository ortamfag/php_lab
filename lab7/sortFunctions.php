<?php 

	// Сортировка выбором
	function selectSort($arr){
		$n = 0;
		global $iter;
		for($i=0; $i<count($arr)-1;$i++){
			$min=$arr[$i];
			for ($j=$i+1; $j<count($arr); $j++){
				if ($arr[$j]<$min){
					$temp=$arr[$j];
					$arr[$i] = $arr[$j];
					$arr[$j] = $min;
					$min=$temp;
				}
			}
			$n += 1;
			echo 'Итерация #' . $n . ' ';
			foreach ($arr as $item) {
				echo " " .$item;
			}  
			echo '<br>';
		}

		echo '<hr>';
		echo 'Количество итераций: ' . $n;
	}

	// Сортировка пузырьком
	function bubbleSort(array $arr) {
		$count = count($arr);
		if ($count <= 1) {
			return $arr;
		}

		$p = 1;
	
		for ($i = 0; $i < $count; $i++) {
			$p += 1;

			for ($j = $count - 1; $j > $i; $j--) {
				if ($arr[$j] < $arr[$j - 1]) {
					$tmp = $arr[$j];
					$arr[$j] = $arr[$j - 1];
					$arr[$j - 1] = $tmp;

					echo 'Итерация #' . $p . ' ';
					foreach ($arr as $item)
						echo $item . ' ';
					echo '<br>';
				}
			}
		}

		echo '<hr>';
		echo 'Количество итераций: ' . ($p - 1);
	
		return $arr;
	}

	// Сортировка Шелла
	function shellSort($a) {
		$sort_length = count($a) - 1;
		$step = ceil(($sort_length + 1)/2);
		// переделать на массив чисел!
		$countIterations=0;
		do
		{
		$i = ceil($step);
		do
		{
			$j=$i-$step;
			$c=1;
			do
			{
			if($a[$j]<=$a[$j+$step])
			{
				$c=0;
			}
			else
			{
				$tmp=$a[$j];
				$a[$j]=$a[$j+$step];
				$a[$j+$step]=$tmp;
				$countIterations+=1;
				echo '<div>Итерация #'.$countIterations;
					foreach ($a as $key => $value) {
						echo ' '.$value.' ';
					}
					echo "</div>";
			}
			$j=$j-1;
			}
			while($j>=0 && ($c==1));
			$i = $i+1;
			}
			while($i<=$sort_length);
			$step = $step/2;
		}
		while($step>0);

		echo '<hr>';
		echo 'Количество итераций '.$countIterations;
	}

	// Сортировка садового гнома
	function gnomeSort($arr)
	{
		$i=1;

		$p += 1;

		while($i < count($arr)) {
			if( !$i || $arr[$i-1]<=$arr[$i] )
				$i++;
			else {
				$temp = $arr[$i];
				$arr[$i] = $arr[$i-1];
				$arr[$i-1] = $temp;
				$i--;
			}

			echo 'Итерация #' . $p . ' ';

			foreach ($arr as $item)
				echo $item . ' ';
			echo '<br>';

			$p += 1;
		}

		echo '<hr>';
		echo 'Количество итераций: ' . ($p - 1);

		return $arr;
	} 

	// Быстрая сортировка
	function quickSort(&$arr, $low, $high) {
		Global $n;
		$i = $low;                
		$j = $high;
		$middle = $arr[ ( $low + $high ) / 2 ];  // middle — опорный элемент; в нашей реализации он находится посередине между low и high
		do {
			while($arr[$i] < $middle){
				++$i;  // ищем элементы для правой части
			}
			while($arr[$j] > $middle){
				--$j;  // ищем элементы для левой части
			}
			if($i <= $j){           
				// перебрасываем элементы
				$temp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $temp;
				// следующая итерация
				$i++; $j--;
			}
			
			$n += 1;
			echo '<br>Итерация #'.$n.' '; 
			foreach ($arr as $item) {
				echo " " .$item;
			} 
		} 
		while($i < $j);
		
		if($low < $j){
		  // рекурсивно вызываем сортировку для левой части
		quickSort($arr, $low, $j);
		} 

		if($i < $high){
		  // рекурсивно вызываем сортировку для правой части
		quickSort($arr, $i, $high);
		}
	}

	function inPhpSort($arr){
        sort($arr);
        echo '<div>Итерация #1';
        foreach ($arr as $key => $value) {
            echo ' '.$value.' ';
        }
		echo '<hr>';
        echo '</div>Количество итераций 1';
    }
?>