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
        echo $this->Html->css(array('layout', 'jquery-ui', 'font-awesome', 'common'));
       
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('bootstrap.min');        
        echo $this->Html->script('deleteItemt');
        
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script>
            $(document).ready(function() {
                $('#cb_all').click(function() {
                    if (this.checked == true)
                        $('.cb_item').attr('checked', 'checked');
                    else if (this.checked == false)
                        $('.cb_item').removeAttr('checked');
                });
                $('.cb_item').each(function() {
                    $(this).click(function() {
                        var thischk = this.checked;
                        var cb_all = $('#cb_all');
                        if (thischk) {
                            var flag = true;
                            $('.cb_item').each(function() {
                                if (this.checked == false) {
                                    flag = false;
                                }
                            });
                            if (flag) {
                                cb_all.attr('checked', 'checked');
                            } else {
                                cb_all.removeAttr('checked');
                            }
                        } else {
                            cb_all.removeAttr('checked');
                        }
                    });
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
        
       
            <div class="container">
                <?php echo $this->Session->flash(); ?>                
                <?php echo $this->fetch('content'); ?>
            </div>
        
            <div class="clear"></div>
            <div class="footer">
                <div>&nbsp;</div>
            </div>
       
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
