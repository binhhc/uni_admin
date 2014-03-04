<!doctype html>
<html lang="en">

    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout ?></title>
        <?php
        echo $this->Html->css('font-awesome.min');
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