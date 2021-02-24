<!Doctype Html>
<html>
<head>
    <title><?php $title ?></title>
    <link href="<?php echo PATH ?>/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PATH ?>/public/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php require 'Menu.php' ?>

<div class="">
    <?php require $template; ?>
</div>

<?php require 'footer.php' ?>

<script src="<?php echo PATH ?>/public/assets/js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo PATH ?>/public/assets/js/bootstrap.min.js"></script>
<script>
    /*x = $('.footer').height()+20; // +20 espaço entre container e footer
    y = $(window).height();
    console.log(x);
    console.log(y);
    if (x+80<=y){ // 100 is the height of your footer
        $('.footer').css('top', y-100+'px');// again 100 is the height of your footer
        $('.footer').css('display', 'block');
    }else{
        $('.footer').css('top', x+'px');
        $('.footer').css('display', 'block');
    }*/

</script>
</body>
</html>