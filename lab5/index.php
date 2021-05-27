<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php $timestamp = date("YmdHis"); ?>

    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo $timestamp;?>">
    <title>Лабораторная работа 5. Динамическое формирование контента и меню. Таблица умножения</title>
</head>
<body class="body">
    <header class="header">
		<div class="container header__inner">
			<img 
				class="header__logo"
				src="images/logo.png" 
				alt="Mospolytech"
			>

			<div class="header__info">Жидов А.В. | 201-322 | №5</div>
			
			<div>
				<?php
					echo '<a href="?html_type=Table';
					
					if (isset($_GET['content']))
						echo '&content='.$_GET['content'].'';
					
						echo '" ';
					
					if (array_key_exists('html_type', $_GET) && $_GET['html_type']=='Table')
						echo 'class="menu_active"';
					else    
						echo 'class="menu_item "';
					
					echo '>Табличная верстка</a>';
					echo '<a href="?html_type=Div';
					
					if (isset($_GET['content']))
						echo '&content='.$_GET['content'].'';
					
					echo '" ';
					
					if (array_key_exists('html_type', $_GET) && $_GET['html_type']=='Div')
						echo 'class="menu_active"';
					else 
						echo 'class="menu_item "';
					
					echo '>Блочная верстка</a>'
				?>
			</div>
		</div>
    </header>
    <main class="main">
        <div class="column">
            <?php

				if(isset($_GET['content']))
					echo '<a href="./" class="column__link">Вся таблица умножения</a>';
				else
					echo '<a href="./" class="column__link column__link--selected">Вся таблица умножения</a>';


				for( $i=2; $i<=9; $i++ )
                {
                    echo '<a href=?';
                    
					if(isset($_GET['html_type']))
						echo 'html_type=' . $_GET['html_type'] . '&content=' . $i . '';
                    else
						echo 'content=' . $i . '';
                    
                    if(isset($_GET['content']) && $_GET['content'] == $i)
                        echo ' class="column__link column__link--selected"';
					else
                        echo ' class="column__link"';
					
					echo '>Таблица умножения на ' . $i . '</a>'; 
                }
            ?>
        </div>
        <!-- основная часть страницы -->
        <div class= "div_result">
            <?php 
                function outNumAsLink($n){
                    if ($n <= 9)
                        return '<a href=?content='.$n.'>'.$n.'</a>';
                    else return $n;
                }
                if(!isset($_GET['html_type']) || $_GET['html_type']=='Table')
                    doTable();
                else
                    doDiv();
            ?>
        </div>
        
            <?php
            function outRow($num){
                for ($i=2; $i<=9; $i++){
                    echo '<tr>';
                    echo '<td>'.outNumAsLink($num).' * '.outNumAsLink($i).'</td>';
                    echo '<td>'.outNumAsLink($i*$num).'</td>';
                    echo '</tr>';
                }
            }
     //Функция для формирования таблиц 
        function doTable (){
            if (!isset($_GET['content'])){
                for ($i=2; $i<=9; $i++){
                    echo '<table>';
                    outRow($i);
                    echo '</table>'; 
                }
            }
            else{
                echo '<table>';
                outRow($_GET['content']);
                echo '</table>';
            }
        }
       //Функция для формирования блоков
        function outBlock($num){
            for ($i=2; $i<=9; $i++){
                echo '<div>'.outNumAsLink($num).' * '.outNumAsLink($i).' = '.outNumAsLink($num*$i).'</div>';
            }
        }
        function doDiv (){
            echo '<div class="wrap">';
            if (!isset($_GET['content'])){
                for ($i=2; $i<=9; $i++){
                    echo '<div class="div">';
                    outBlock($i);
                    echo '</div>';
                }
            }
            else{
                echo '<div class="div">';
                outBlock($_GET['content']);
                echo '</div>';
            }
            echo '</div>';
        }
    ?>      
    </main>
	
	<footer class="footer">
		<div class="footer__info">
			<?php
				if(!isset($_GET['html_type'])  || $_GET['html_type']=='Table')
					$footer = 'Табличная верстка. ';
				else
					$footer = 'Блочная верстка. ';
				if (!isset($_GET['content']))
					$footer.= 'Таблица умножения полностью. ';
				else
					$footer.='Таблица умножения на '.$_GET['content'].'. ';
				$footer.=date('Дата: d.m.y. Время: H:i');
				echo $footer;
            ?>
		</div>
	</footer>
</body>
</html>