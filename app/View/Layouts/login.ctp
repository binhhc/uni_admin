<!doctype html>
<html lang="en">

    <head>
        <?php echo $this->Html->charset(); ?>
        <title>Login - Uni Admin</title>


        <?php
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('layout');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap.min');
        ?>

    </head>
    <body>

        <?php echo $this->fetch('content'); ?>

    </body>

</html>