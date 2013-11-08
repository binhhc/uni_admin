<?php echo $this->Html->link('Add', array('controller' => 'WorkExperiences', 'action' => 'add')) ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="nowrap center" width="8%">Employee ID</th>
            <th>Work year</th>
            <th>Company</th>
            <th>Business type</th>
            <th>Position</th>
            <th>Retire reason</th>
            <th class="nowrap center" width="12%">Action</th>
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
                <tr>                             
                    <td class="text-center"><?php echo $work['WorkExperience']['employee_id']; ?></td>
                    <td class=""><?php echo h($work['WorkExperience']['work_year']); ?></td>
                    <td class=""><?php echo h($work['WorkExperience']['company']); ?></td>
                    <td class=""><?php echo h($work['WorkExperience']['bussiness_type']); ?></td>
                    <td class=""><?php echo h($work['WorkExperience']['position']); ?></td> 
                    <td class=""><?php echo h($work['WorkExperience']['retire_reason']); ?></td>
                    <td class="text-center">
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
