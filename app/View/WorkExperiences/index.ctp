<div class="pull-left"  style="margin-bottom:5px;">
    <?php 
        echo $this->Html->link('Add', array('controller' => 'WorkExperiences', 'action' => 'add'), array('class'=>'btn btn-primary'));
        echo ' ';
        echo $this->Html->link('Delete', '#',array('class' => 'btn btn-danger', 'onclick' => "deleteAll('WorkExperiences');"));
    ?>
</div>

<table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
    <thead>
        <tr class="nowrap center">
            <th><input type='checkbox' id="cb_all"/></th>            
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
                <tr class="nowrap">
                    <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $work['WorkExperience']['id']; ?>' ></td>                    
                    <td><?php echo $this->Form->postLink($work['WorkExperience']['employee_id'], array('action' => 'edit'), array('escape' => false, 'data' => array('id' => $work['WorkExperience']['id']))); ?> </td>
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
