<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'WorkExperiences', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo $this->Html->link('削除', '', array('class'=>'btn btn-danger', 'onclick'=>'deleteAll("WorkExperiences")'));
            ?>
            <div class="widget">
                <div class="widget-content">
                        <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <?php if (!empty($workExp)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th>社員番号</th>
                                    <th>職場</th>
                                    <th>入社年月日</th>
                                    <th>退社年月日</th>
                                    <th>勤続年数</th>
                                    <th>会社名</th>
                                    <th>業種</th>
                                    <th>郵便番号</th>
                                    <th>会社住所</th>
                                    <th>国内外区分コード</th>
                                    <th>国内外区分</th>
                                    <th>役職</th>
                                    <th>退職の事由コード</th>
                                    <th>退職の事由</th>
                                    <th>退職理由</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($workExp)) { ?>
                                    <tr>
                                        <td colspan="15" class="data-empty">職歴情報のデーターがありません。</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($workExp as $work):
                                        ?>
                                        <tr class="nowrap">
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $work['WorkExperience']['id']; ?>' ></td>
                                            <td><?php echo $this->Form->postLink(h($work['WorkExperience']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($work['WorkExperience']['id'])))); ?> </td>
                                            <td><?php echo h($work['UserInfo']['employee_name']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['join_date']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['leave_date']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['work_year']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['company']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['bussiness_type']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['company_zip_code']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['company_address']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['abroad_type_cd']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['abroad_type']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['position']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['retire_reason_cd']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['retire_reason']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['retire_content']); ?></td>
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
		<?php if (empty($workExp)) echo "pinned_columns = -1;";?>
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