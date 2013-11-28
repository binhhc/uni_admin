<?php echo $this->Form->create('Quanlification', array()) ?>
<fieldset>
    <table>
        <tr >
            <td style="width: 15%"></td>
            <td style='width: 40%'>                
                <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
            </td>
        </tr>
        <tr >
            <td style="width: 15%">Employee id</td>
            <td style='width: 40%'>                
                <?php echo $this->Form->input('employee_id', array('label' => false, 'type' => 'text', @$readonly)); ?>
            </td>
        </tr>
        <tr>
            <td>License type code</td>
            <td>
                <?php echo $this->Form->input('license_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>License type</td>
            <td>
                <?php echo $this->Form->input('license_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>           
        <tr>
            <td>Issuing organization</td>
            <td>
                <?php echo $this->Form->input('issuing_organization', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>License name</td>
            <td>
                <?php echo $this->Form->input('license_name', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
            </div>
        <tr>
            <td>Education type</td>
            <td>
                <?php echo $this->Form->input('edu_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Acquire date</td>
            <td>
                <?php echo $this->Form->input('acquire_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Update date</td>
            <td>
                <?php echo $this->Form->input('update_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Expire date</td>
            <td>
                <?php echo $this->Form->input('expire_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Certification number</td>
            <td>
                <?php echo $this->Form->input('certification_number', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Attachment</td>
            <td>
                <?php echo $this->Form->input('attachment', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Note</td>
            <td>
                <?php echo $this->Form->input('note', array('class' => 'span6', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
            </td>
        </tr>

        <tr class="form-actions"> 
            <td colspan="2">
                <button class="btn btn-primary" type="submit">登録</button>
                <a class = 'btn margin-left13' href="<?php echo $this->Session->read('save_latest_link_quanlity'); ?>" >キャンセル</a>
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
