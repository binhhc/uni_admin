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

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css(array('layout', 'jquery-ui', 'jquery.ui.tinytbl'));
       
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('jquery.ui.tinytbl');
        echo $this->Html->script('jquery.ui.tinytbl.src');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script>$(function() {
                $(".datepicker").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true
                });
            });</script>
    </head>
    <body>
        <?php echo $this->element('header'); ?>
        
        <div id="main" class="column">
            <div id="content">
                <?php echo $this->Session->flash(); ?>                
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
           
            <div class="clear"></div>
            <div class="footer">
                <div>&nbsp;</div>
            </div>
       
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
