<?php echo $this->Form->create('WorkExperience', array()) ?>
<fieldset>
    <table>
        <tr >
            <td style="width: 10%"></td>
            <td style='width: 30%'>                
                <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
            </td>
        </tr>
        <tr >
            <td style="width: 10%">Employee id</td>
            <td style='width: 30%'>                
                <?php echo $this->Form->input('employee_id', array('label' => false, 'type' => 'text', @$readonly)); ?>
            </td>
        </tr>
        <tr>
            <td>Join date</td>
            <td>
                <?php echo $this->Form->input('join_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Leave date</td>
            <td>
                <?php echo $this->Form->input('leave_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>           
        <tr>
            <td>Work year</td>
            <td>
                <?php echo $this->Form->input('work_year', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Company</td>
            <td>
                <?php echo $this->Form->input('company', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
            </div>
        <tr>
            <td>Business type</td>
            <td>
                <?php echo $this->Form->input('bussiness_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Company zip code</td>
            <td>
                <?php echo $this->Form->input('company_zip_code', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Company address</td>
            <td>
                <?php echo $this->Form->input('company_address', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Abroad type code</td>
            <td>
                <?php echo $this->Form->input('abroad_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Abroad type</td>
            <td>
                <?php echo $this->Form->input('abroad_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Position</td>
            <td>
                <?php echo $this->Form->input('position', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Employment type code</td>
            <td>
                <?php echo $this->Form->input('employment_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Retire reason code</td>
            <td>
                <?php echo $this->Form->input('retire_reason_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Retire reason</td>
            <td>
                <?php echo $this->Form->input('retire_reason', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Retire content</td>
            <td>
                <?php echo $this->Form->input('retire_content', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
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
                <a class = 'btn margin-left13' href="<?php echo $this->Session->read('save_latest_link_work') ?>" >キャンセル</a>
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
