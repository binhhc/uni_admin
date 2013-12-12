<div class="pull-right"  style="margin-bottom:5px; margin-right:40px">
    <?php echo $this->Html->link('Add', array('controller' => 'WorkExperiences', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>

<table class="ui-tinytable" cellpadding="5" cellspacing="5">
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
                    <td><?php echo h($work['WorkExperience']['company']); ?></td> 
                    <td><?php echo h($work['WorkExperience']['bussiness_type']); ?></td>
                    <td><?php echo h($work['WorkExperience']['company_zip_code']); ?></td>
                    <td><?php echo h($work['WorkExperience']['company_address']); ?></td>
                    <td><?php echo h($work['WorkExperience']['abroad_type_cd']); ?></td>
                    <td><?php echo h($work['WorkExperience']['abroad_type']); ?></td>
                    <td><?php echo h($work['WorkExperience']['position']); ?></td>
                    <td><?php echo h($work['WorkExperience']['retire_reason_cd']); ?></td>
                    <td><?php echo h($work['WorkExperience']['retire_reason']); ?></td>
                    <td><?php echo h($work['WorkExperience']['retire_content']); ?></td>
                    <td class="center nowrap">
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
    $(document).ready(function() {
        $('.ui-tinytable').tinytbl({
            direction: 'ltr',      // text-direction (default: 'ltr')
            thead:     true,       // fixed table thead
            //tfoot:     false,       // fixed table tfoot
            cols:      1,          // fixed number of columns
            width:     'auto',     // table width (default: 'auto')
            height:    'auto'      // table height (default: 'auto')
        });
    });          
</script>
<style type="text/css">.ui-tinytbl.ui-tinytable{clear:both;}</style>