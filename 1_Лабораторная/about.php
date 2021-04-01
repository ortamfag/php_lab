<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    <?php echo "<title>".$name='About'."</title>" ?>
</head>
<body>
    <header>
        <nav>
          <a href="<?php
          $text='Home';
          $ref='index.php';
          $current_page=false;
          echo $ref;
          ?>" class="menu_item <?php
          if ($current_page)
            echo ' active';
          ?>">
          <?php
          echo $text;
          ?> </a>
          <a href="<?php
          $text='About';
          $ref='about.php';
          $current_page=true;
          echo $ref;
          ?>" class="menu_item <?php
          if ($current_page)
            echo ' active';
          ?>">
          <?php
          echo $text;
          ?> "</a>
          <a href="<?php
          $text='Contact';
          $ref='contact.php';
          $current_page=false;
          echo $ref;
          ?>" class="menu_item <?php
          if ($current_page)
            echo ' active';
          ?>">
          <?php
          echo $text;
          ?> </a>
        </nav>
    </header>
    <section class="about">
        <div class="image_wrapper">
            <img class="porter" src="people.jpg" alt="">
        </div>
        <div class="text_wrapper">
            <h1 class="title">About our company</h1>
            <p class="text">Eco Movers was founded with the goal of reducing wasteful practices that plague the moving industry. The Eco-Box, our reusable moving containers, is one of many ways for you to get involved in that effort. We’ve saved more than 45,000 cardboard boxes since 2015 thanks to our incredible customers! The Eco-Box is a waste-free alternative to cardboard boxes, as well as being safer for your items and easier to pack and move. We deliver to your door and pick up when you’ve finished unpacking — the easiest way to find packing materials.</p>
        </div>
    </section>
    <footer>
<?php echo "<p> &nbsp; Сформировано:".date("d.m.Y в H-i.s")."</p>"; ?>    </footer>
</body>
</html>
