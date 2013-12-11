<div class="pull-right"  style="margin-bottom:5px;">
    <?php echo $this->Html->link('Add', array('controller' => 'Quanlifications', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>

<table class="ui-tinytable" cellpadding=5>
    <thead>
        <tr>
            <th class="nowrap center" width="8%">Employee ID</th>
            <th>License type code</th>
            <th>License type</th>
            <th>Issuing organization</th>
            <th>License name</th>
            <th>Acquire date</th>
            <th>Update date</th>
            <th>Expire date</th>
            <th>Certification number</th>
            <th>Attachment</th>
            <th>Note</th>
            <th>Allowance</th>            
            <th class="nowrap center" width="14%">Action</th>
        </tr>
    </thead>      
    <tbody>
        <?php if (empty($quanlity)) { ?>
            <tr>
                <td colspan="7"><?php echo __("Empty data!"); ?></td>
            </tr>
            <?php
        } else {
            foreach ($quanlity as $quanlitify):
                ?>
                <tr>                             
                    <td class="text-center"><?php echo $quanlitify['Quanlification']['employee_id']; ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['license_type_cd']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['license_type']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['issuing_organization']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['license_name']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['acquire_date']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['update_date']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['expire_date']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['certification_number']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['attachment']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['note']); ?></td>
                    <td class=""><?php echo h($quanlitify['Quanlification']['allowance']); ?></td>             
                    <td class="center nowrap">
                        <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $quanlitify['Quanlification']['id']))); ?>
                        <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $quanlitify['Quanlification']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($quanlitify['Quanlification']['employee_id']))); ?>
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
            cols:      0,          // fixed number of columns
            width:     'auto',     // table width (default: 'auto')
            height:    'auto'      // table height (default: 'auto')
        });
    });          
</script>
<style type="text/css">.ui-tinytbl.ui-tinytable{clear:both;}</style>