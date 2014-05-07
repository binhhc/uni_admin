<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'Qualifications', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo $this->Html->link('削除', '', array('class'=>'btn btn-danger', 'onclick'=>'deleteAll("Qualifications")'));
            ?>
            <div class="widget">
                <div class="widget-content">
                        <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <?php if (!empty($quanlity)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th>社員番号</th>
                                    <th>氏名</th>
                                    <th>免許資格区分コード</th>
                                    <th>免許資格区分</th>
                                    <th>発行団体</th>
                                    <th>資格名称</th>
                                    <th>取得年月日</th>
                                    <th>更新年月日</th>
                                    <th>有効期限</th>
                                    <th>認定番号</th>
                                    <th>資格添付ファイル</th>
                                    <th>資格手当</th>
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($quanlity)) { ?>
                                    <tr class="nowrap">
                                        <td colspan="13" class ="data-empty">免許資格のデーターがありません。</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($quanlity as $quanlitify):
                                        ?>
                                        <tr class="nowrap">
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $quanlitify['Qualification']['id']; ?>' ></td>
                                            <td><?php echo $this->Form->postLink(h($quanlitify['Qualification']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($quanlitify['Qualification']['id'])))); ?> </td>
                                            <td class=""><?php echo h($quanlitify['UserInfo']['employee_name']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['license_type_cd']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['license_type']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['issuing_organization']); ?></td>
                                            <td class="nowrap"><?php echo h($quanlitify['Qualification']['license_name']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['acquire_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['update_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['expire_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['certification_number']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['attachment']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['allowance']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['note']); ?></td>
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
        <?php if (empty($quanlity)) echo "pinned_columns = -1;";?>
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