<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu", array('controller' => $this->name)); ?>
                    </div>
                    <div class="span10">
                        <table class="responsive table table-bordered" cellpadding=5>
                            <thead>
                                <tr class="nowrap">
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <th>社員番号</th>
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
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $quanlitify['Qualification']['id']; ?>' ></td>
                                            <td><?php echo $this->Form->postLink($quanlitify['Qualification']['employee_id'], array('action' => 'edit'), array('escape' => false, 'data' => array('id' => $quanlitify['Qualification']['id']))); ?> </td>
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
        var pinned_columns = 2;

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