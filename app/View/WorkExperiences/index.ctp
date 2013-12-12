<div class="pull-right"  style="margin-bottom:5px;">
    <?php echo $this->Html->link('Add', array('controller' => 'WorkExperiences', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>

<table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
    <thead>
        <tr class="nowrap center">
            <th>Employee ID</th>
            <th>Join date</th>
            <th>Leave date</th>
            <th>Work year</th>
            <th>Company</th>
            <th>Bussiness type</th>
            <th>Company zip code</th>
            <th>Company address</th>
            <th>Abroad type code</th>
            <th>Abroad type</th>
            <th>Position</th>
            <th>Retire reason code</th>
            <th>Retire reason</th>
            <th>Retire content</th>
            <th class="nowrap center" width="14%">Action</th>
        </tr>
    </thead>      
    <tbody>
        <?php if (empty($workExp)) { ?>
            <tr>
                <td colspan="7"><?php echo __("Empty data!"); ?></td>
            </tr>
            <?php
        } else {
            foreach ($workExp as $work):
                ?>
                <tr class="nowrap center">                             
                    <td class="text-center"><?php echo $work['WorkExperience']['employee_id']; ?></td>
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
                    <td class="nowrap">
                        <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $work['WorkExperience']['id']))); ?>
                        <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $work['WorkExperience']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($work['WorkExperience']['employee_id']))); ?>
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