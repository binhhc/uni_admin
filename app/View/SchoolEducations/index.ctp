<?php echo $this->Html->link('Add', array('controller' => 'SchoolEducations', 'action' => 'add')) ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="nowrap center" width="8%">Employee ID</th>
            <th>Graduate year</th>
            <th>Education type</th>
            <th>School type</th>
            <th >Diploma type</th>
            <th >School</th>
            <th class="nowrap center" width="12%">Action</th>
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
                    <td class="text-center"><?php echo $school['SchoolEducation']['employee_id']; ?></td>
                    <td class=""><?php echo h($school['SchoolEducation']['graduate_year']); ?></td>
                    <td class=""><?php echo h($school['SchoolEducation']['edu_type']); ?></td>
                    <td class=""><?php echo h($school['SchoolEducation']['school_type']); ?></td>
                    <td class=""><?php echo h($school['SchoolEducation']['diploma_type']); ?></td> 
                    <td class=""><?php echo h($school['SchoolEducation']['school']); ?></td>
                    <td class="">
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
<?php if ($this->Paginator->numbers()): ?>
    <div class="pagination">
        <ul>
            <?php echo '<li>' . $this->Paginator->prev(__('<<'), array(), null, array('class' => 'prev disabled')) . '</li>'; ?>
            <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
            <?php echo '<li>' . $this->Paginator->next(__('>>'), array(), null, array('class' => 'next disabled')) . '</li>'; ?>
        </ul>
    </div>
<?php endif; ?>