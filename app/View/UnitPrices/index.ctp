<div class="pull-right"  style="margin-bottom:5px;">
    <?php echo $this->Html->link('Add', array('controller' => 'UnitPrices', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="nowrap center" width="8%">Employee ID</th>
            <th>Revise date</th>
            <th>Salary type</th>
            <th>Support allowance</th>
            <th>Adjust salary</th>
            <th>Address allowance</th>
            <th class="nowrap center" width="14%">Action</th>
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
                    <td class=""><?php echo h($price['UnitPrice']['salary_type']); ?></td>
                    <td class=""><?php echo h($price['UnitPrice']['support_allowance']); ?></td>
                    <td class=""><?php echo h($price['UnitPrice']['adjust_salary']); ?></td> 
                    <td class=""><?php echo h($price['UnitPrice']['address_allowance']); ?></td>
                    <td class="text-center">
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
