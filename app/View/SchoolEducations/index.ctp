<div class="row-fluid">
    <div class="span2">
        <?php echo $this->Element("sidemenu");?>
    </div>
    <div class="span10">
        <table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
            <thead>
                <tr class="nowrap">
                    <th>Employee ID</th>
                    <th>Graduate year</th>            
                    <th>Graduate type code</th>
                    <th>Graduate type</th>
                    <th>Education type code</th>
                    <th>Education type</th>
                    <th>Newest education code</th>
                    <th>Newest education</th>
                    <th>School type code</th>
                    <th>School type</th>
                    <th>Diploma type code</th>
                    <th>Diploma type</th>
                    <th>School</th>
                    <th>Faculty</th>
                    <th>Subject</th>
                    <th> Major</th>            
                    <th width="14%">Action</th>
                </tr>
            </thead>      
            <tbody>
                <?php if (empty($schoolEdu)) { ?>
                    <tr>
                        <td colspan="7"><?php echo __("Empty data!"); ?></td>
                    </tr>
                    <?php
                } else {
                    foreach ($schoolEdu as $school):
                        ?>
                        <tr>
                            <td><?php echo h($school['SchoolEducation']['employee_id']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['graduate_year']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['graduate_type_cd']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['graduate_type']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['edu_type_cd']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['edu_type']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['newest_edu_cd']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['newest_edu']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['school_type_cd']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['school_type']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['diploma_type_cd']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['diploma_type']); ?></td>
                            <td class="nowrap"><?php echo h($school['SchoolEducation']['school']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['faculty']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['subject']); ?></td>
                            <td><?php echo h($school['SchoolEducation']['major']); ?></td> 
                            <td class="nowrap">
                                <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $school['SchoolEducation']['id']))); ?>
                                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $school['SchoolEducation']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($school['SchoolEducation']['employee_id']))); ?>
                            </td>
                        </tr>

                        <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
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