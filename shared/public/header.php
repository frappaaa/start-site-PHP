<?php
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/main.css')?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/fonts.css')?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/dark.css')?>">

    <link rel="shortcut icon" href="<?php echo url_for('/assets/img/favicon.png')?>" type="image/x-icon">
    <title>New Site
        <?php
            if(isset($page_title)){
                echo " - ".$page_title;
            }
        ?>
    </title>
</head>

<body>
    <header>
        <h1>New Site Title</h1>
        <nav aria-label="header-navigation">
            <p><a href="">Page 1</a></p>
            <p><a href="">Page 2</a></p>
            <p><a href="">Page 3</a></p>
        </nav>
        <a href="<?php echo url_for('/admin/login.php'); ?>">
            <button>Log In</button>
        </a>
    </header>