<?php
$username = is_logged_in();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/private.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/fonts.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/dark.css')?>">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://kit.fontawesome.com/c1c9f7571d.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="<?php echo url_for('/assets/img/favicon.png');?>" type="image/x-icon">
    <title>
        <?php 
            if($page_title){
                echo $page_title;
            }
        ?>
    </title>


</head>

<body>
    <header>
        <h1>Admin area</h1>
        <nav aria-label="header-navigation">
        <?php
        if($session->is_logged_in()){?>
        
        <a href="">Home</a>
        <a href="">Elements</a>
        <a href="">Admins</a>
        
        <?php 
        }
        ?>
        </nav>
        <a href="<?php echo url_for('/admin/login.php'); ?>">
            <button>Admin</button>
        </a>
    </header>