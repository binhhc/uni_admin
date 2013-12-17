<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu");?>
                    </div>
                    <div class="span10">
                        <table class="responsive table table-bordered" cellpadding=5>
                            <thead>
                                <tr class="nowrap">
                                    <th>社員番号</th>
                                    <th>改定年月日</th>
                                    <th>給与区分コード</th>
                                    <th>給与区分</th>   
                                    <th>報酬額</th>
                                    <th>調整給</th>
                                    <th>扶養手当</th>
                                    <th>リーダー手当て</th>
                                    <th>食事手当て</th>
                                    <th>ご近所手当</th>
                                    <th>欠勤控除減額</th>
                                    <th>遅早控除減額</th>
                                    <th>普通残業</th>
                                    <th>深夜残業</th>
                                    <th>休出残業</th>
                                    <th>残業予備１</th>
                                    <th>残業予備２</th>
                                    <th>残業予備３</th>
                                    <th>残業予備４</th>
                                    <th>残業予備５</th>
                                    <th>基本賞与</th>
                                    <th>Action</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?php if (empty($unitPrice)) { ?>
                                    <tr>
                                        <td colspan="7"><?php echo __("Empty data!"); ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($unitPrice as $price):
                                        ?>
                                        <tr>                             
                                            <td class="text-center"><?php echo $price['UnitPrice']['employee_id']; ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['revise_date']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['salary_type_cd']); ?></td>                    
                                            <td class="nowrap"><?php echo h($price['UnitPrice']['salary_type']); ?></td>
                                            <td class="nowrap"><?php echo h($price['UnitPrice']['bonus']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['adjust_salary']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['support_allowance']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['leader_allowance']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['meal_allowance']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['address_allowance']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['absent_salary_cut']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['late_salary_cut']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_normal']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_night']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_holiday']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_1']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_2']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_3']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_4']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['overtime_5']); ?></td>
                                            <td class=""><?php echo h($price['UnitPrice']['basic_bonus']); ?></td>                
                                            <td class="center nowrap">
                                                <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $price['UnitPrice']['id']))); ?>
                                                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $price['UnitPrice']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($price['UnitPrice']['employee_id']))); ?>
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