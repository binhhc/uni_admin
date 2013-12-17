<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu");?>
                    </div>
                    <div class="span10">
                        <table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap center">
                                    <th>社員番号</th>
                                    <th>年分</th>
                                    <th>支払金額</th>
                                    <th>給与所得控除後</th>
                                    <th>所得控除合計額</th>
                                    <th >源泉徴収税額</th>
                                    <th class="nowrap center" width="14%">Action</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?php if (empty($annualIncome)) { ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="6"><?php echo __("Empty data!"); ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($annualIncome as $annual):
                                        ?>
                                        <tr>                             
                                            <td class="text-center"><?php echo $annual['AnnualIncome']['employee_id']; ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['yearly_amount']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['income_gross']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['income_net']); ?></td>
                                            <td class=""><?php echo h($annual['AnnualIncome']['total_cut']); ?></td> 
                                            <td class=""><?php echo h($annual['AnnualIncome']['total_tax']); ?></td>
                                            <td class="center nowrap">
                                                <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $annual['AnnualIncome']['id']))); ?>
                                                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $annual['AnnualIncome']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($annual['AnnualIncome']['employee_id']))); ?>
                                            </td>
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
                                    <?php echo '<li>' . $this->Paginator->prev(__('<<'), array(), null, array('class' => 'prev disabled')) . '</li>'; ?>
                                    <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
                                    <?php echo '<li>' . $this->Paginator->next(__('>>'), array(), null, array('class' => 'next disabled')) . '</li>'; ?>
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
        var pinned_columns = 1;

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
            copy.wrap("<div class='pinned' />");

            copy.find('form').remove();

            original.wrap("<div class='scrollable' />");

            var scrollable = original.closest('.scrollable'),
                pinned = copy.closest('.pinned'),
                wrapper = original.closest('.table-wrapper'),
                pinned_width = 0;

            copy.find('th:visible:lt(' + pinned_columns + ')').each(function(i, e) {
                pinned_width += $(e).outerWidth();
            });

            wrapper.css({
                'position': 'relative',
                'display': 'block',
                'clear': 'both'
            });

            scrollable.css({
                'overflow': 'auto'
            });

            pinned.css({
                'position': 'absolute',
                'display': 'block',
                'top': 0,
                'width': pinned_width,
                'overflow': 'hidden'
            });
        }

        function unsplitTable(original) {
            original.closest(".table-wrapper").find(".pinned").remove();
            original.unwrap();
            original.unwrap();
            original.css('width', null);
        }

        $(window).load(updateTables);
        $(window).bind('resize', function() {
            var tables = $("table.responsive");
            unsplitTable(tables);
            splitTable(tables, pinned_columns);
        });
    });
</script>