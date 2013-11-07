<?php echo $this->Html->link('Add', array('controller' => 'UserInfos', 'action' => 'add')) ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="nowrap center" width="8%">Employee ID</th>
            <th>Employee name</th>
            <th>Office email</th>
            <th>Company join date</th>
            <th>Sex</th>
            <th>Birthday</th>
            <th class="nowrap center" width="12%">Action</th>
        </tr>
    </thead>      
    <tbody>
        <?php if (empty($userInfo)) { ?>
            <tr>
                <td colspan="7"><?php echo __("Empty data!"); ?></td>
            </tr>
            <?php
        } else {
            foreach ($userInfo as $info):
                ?>
                <tr>                             
                    <td class="text-center"><?php echo $info['UserInfo']['employee_id']; ?></td>
                    <td class=""><?php echo $info['UserInfo']['employee_name']; ?></td>
                    <td class=""><?php echo $info['UserInfo']['office_email']; ?></td>
                    <td class=""><?php echo $info['UserInfo']['company_join_date']; ?></td>
                    <td class=""><?php echo $info['UserInfo']['sex']; ?></td> 
                    <td class=""><?php echo $info['UserInfo']['birthday']; ?></td>
                    <td class="text-center">
                        <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $info['UserInfo']['id']))); ?>
                        <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $info['UserInfo']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($info['UserInfo']['employee_id']))); ?>
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
