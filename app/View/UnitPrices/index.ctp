<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'UnitPrices', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo $this->Html->link('削除', '', array('class'=>'btn btn-danger', 'onclick'=>'deleteAll("UnitPrices")'));
            ?>
            <div class="widget">
                <div class="widget-content">
                        <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <?php if (!empty($unitPrice)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th>社員番号</th>
                                    <th>氏名</th>
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
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($unitPrice)) { ?>
                                    <tr>
                                        <td colspan="23" class="data-empty">給与精算のデーターがありません。</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($unitPrice as $price):
                                        ?>
                                        <tr>
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $price['UnitPrice']['id']; ?>' ></td>
                                            <td><?php echo $this->Form->postLink(h($price['UnitPrice']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($price['UnitPrice']['id'])))); ?> </td>
                                            <td class=""><?php echo h($price['UserInfo']['employee_name']); ?></td>
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
                                            <td class=""><?php echo h($price['UnitPrice']['note']); ?></td>
                                        </tr>

                                        <?php
                                    endforeach;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if ($this->Paginator->numbers()): ?>
                        <div class="widget-foot">
                            <ul class="pagination">
                                <?php
                                if(empty($this->Paginator->options['url']['page']) or $this->Paginator->options['url']['page']<=1){
                                    echo '<li><span class="prev disabled">&lt;&lt;</span></li>';
                                }
                                echo '<li>' . $this->Paginator->first('<<', array(), null, array('class' => 'prev disabled')) . '</li>';
                                echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => ''));
                                echo '<li>' . $this->Paginator->last('>>', array(), null, array('class' => 'next disabled')) . '</li>';

                                if(!empty($this->Paginator->options['url']['page']) and ($this->Paginator->options['url']['page']>=$this->Paginator->counter(array('format' => '%pages%')))){
                                    echo '<li><span class="next disabled">&gt;&gt;</span></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var pinned_columns = 3;
		<?php if (empty($unitPrice)) echo "pinned_columns = -1;";?>
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