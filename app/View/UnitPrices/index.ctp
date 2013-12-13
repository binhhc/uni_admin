<div class="pull-right"  style="margin-bottom:5px;">
    <?php echo $this->Html->link('Add', array('controller' => 'UnitPrices', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>

<table class="responsive table table-bordered" cellpadding=5>
    <thead>
        <tr class="nowrap">
            <th>Employee ID</th>
            <th>Revise date</th>
            <th>Salary type code</th>
            <th>Salary type</th>   
            <th>Bonus</th>
            <th>Ajdust salary</th>
            <th>Support allowance</th>
            <th>Leader allowance</th>
            <th>Meal allowance</th>
            <th>Address allowance</th>
            <th>Absent salary cut</th>
            <th>Late salary cut</th>
            <th>Overtime normal</th>
            <th>Overtime night</th>
            <th>Overtime holiday</th>
            <th>Overtime 1</th>
            <th>Overtime 2</th>
            <th>Overtime 3</th>
            <th>Overtime 4</th>
            <th>Overtime 5</th>
            <th>Basic bonus</th>            
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