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
                                    <th class="nowrap center" width="8%">社員番号</th>
                                    <th>免許資格区分コード</th>
                                    <th>免許資格区分</th>
                                    <th>発行団体</th>
                                    <th>資格名称</th>
                                    <th>取得年月日</th>
                                    <th>更新年月日</th>
                                    <th>有効期限</th>
                                    <th>認定番号</th>
                                    <th>資格添付ファイル</th>       
                                    <th>備考</th>
                                    <th width="14%">Action</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?php if (empty($quanlity)) { ?>
                                    <tr class="nowrap">
                                        <td colspan="7"><?php echo __("Empty data!"); ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($quanlity as $quanlitify):
                                        ?>
                                        <tr class="nowrap">                             
                                            <td class="text-center"><?php echo $quanlitify['Quanlification']['employee_id']; ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['license_type_cd']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['license_type']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['issuing_organization']); ?></td>
                                            <td class="nowrap"><?php echo h($quanlitify['Quanlification']['license_name']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['acquire_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['update_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['expire_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['certification_number']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Quanlification']['attachment']); ?></td>                   
                                            <td class=""><?php echo h($quanlitify['Quanlification']['allowance']); ?></td>             
                                            <td class="center nowrap">
                                                <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $quanlitify['Quanlification']['id']))); ?>
                                                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $quanlitify['Quanlification']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($quanlitify['Quanlification']['employee_id']))); ?>
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