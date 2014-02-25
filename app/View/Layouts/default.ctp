<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>            
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('jquery-ui','bootstrap', 'font-awesome', 'font-awesome.min', 'style', 'widgets'));
        echo $this->Html->script(array('jquery', 'bootstrap',  'jquery-ui', 'deleteItemt'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script>
            $(document).ready(function() {
                $('#cb_all').click(function() {
                    $('.cb_item').prop('checked', this.checked);
                });
                $('.cb_item').click(function(){
                    $('#cb_all').prop('checked', !$('.cb_item:not(:checked)').length);
                });       
            });

            $(function() {
                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
    </head>
    <body>
        <?php echo $this->element('header'); ?>
        <div class="clearfix"></div>
        <div class="content">
            <?php 
                echo $this->Session->flash(); 
                echo $this->element('sidebar');
                echo $this->fetch('content');
            ?>
        </div>
        <div class="clearfix"></div>
        <?php echo $this->element('footer'); ?>
       
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
