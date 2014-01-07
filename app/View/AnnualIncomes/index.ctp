<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu", array('controller' => $this->name)); ?>
                    </div>
                    <div class="span10">
                        <table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap center">
                                    <?php if (!empty($annualIncome)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th>社員番号</th>
                                    <th>氏名</th>
                                    <th>年分</th>
                                    <th>支払金額</th>
                                    <th>給与所得控除後</th>
                                    <th>所得控除合計額</th>
                                    <th >源泉徴収税額</th>                                    
                                </tr>
                            </thead>      
                            <tbody>
                                <?php if (empty($annualIncome)) { ?>
                                    <tr>
                                        <td colspan="7" class="data-empty">年収精算のデーターがありません。</td>
                                    </tr>
                                <?php
                                } else {
                                    foreach ($annualIncome as $annual):
                                        ?>
                                        <tr>
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $annual['AnnualIncome']['id']; ?>' ></td>
                                            <td><?php echo $this->Form->postLink(h($annual['AnnualIncome']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($annual['AnnualIncome']['id'])))); ?> </td>                        
                                            <td class=""><?php echo h($annual['UserInfo']['employee_name']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['yearly_amount']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['income_gross']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['income_net']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['total_cut']); ?></td> 
                                            <td class=""><?php echo h($annual['AnnualIncome']['total_tax']); ?></td>
                                        </tr>

                                        <?php
                                    endforeach;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if ($this->Paginator->numbers()): ?>
                            <div class="pagination">
                                <ul>
                                    <?php echo '<li>' . $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled')) . '</li>'; ?>
                                    <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
                                    <?php echo '<li>' . $this->Paginator->next('>>', array(), null, array('class' => 'next disabled')) . '</li>'; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var pinned_columns = 3;
		<?php if (empty($annualIncome)) echo "pinned_columns = -1;";?>
        var updateTables = function() {
            var tables = $("table.responsive");
            splitTable(tables, pinned_columns);
        };

        function splitTable(original, pinned_columns) {
            if (!pinned_columns) pinned_columns = 1;

            original.css('width', original.width());
            original.wrap("<div class='table-wrapper' />");

            var copy = original.clone().appendTo(original.closest(".table-wrapper"));
            copy.removeClass("responsive");

            copy.wrap("<div class='scrollable' />");
            original.wrap("<div class='pinned' />");

            original.find('form').each(function(i,e){
                var form = $(e);
                form.data('id', form.attr('name'));
                form.removeAttr('name');
            })

            var wrapper = original.closest('.table-wrapper'),
                scrollable = wrapper.find('.scrollable'),
                pinned = wrapper.find('.pinned'),
                pinned_width = 0;

            copy.find('th:visible:lt(' + pinned_columns + ')').each(function(i, e) {
                pinned_width += $(e).outerWidth();
            });

            wrapper.css({
                'position': 'relative',
                'display': 'block',
                'clear': 'both',
                'overflow': 'hidden'
            });

            scrollable.css({
                'overflow': 'auto'
            });

            pinned.css({
                'position': 'absolute',
                'display': 'block',
                'top': 0,
                'width': pinned_width,
                'overflow': 'hidden',
                'background': '#fff'
            });
        }

        function unsplitTable(original) {
            original.closest(".table-wrapper").find(".scrollable").remove();
            original.unwrap();
            original.unwrap();
            original.css('width', null);

            original.find('form').each(function(i,e){
                var form = $(e);
                form.attr('name', form.data('id'));
            })
        }

        $(window).load(updateTables);
        $(window).bind('resize', function() {
            var tables = $("table.responsive");
            unsplitTable(tables);
            splitTable(tables, pinned_columns);
        });        
    });
</script>