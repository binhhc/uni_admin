<?php echo $this->Form->create('SchoolEducation', array()) ?>
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
            <td>Graduate year</td>
            <td>
                <?php echo $this->Form->input('graduate_year', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Graduate type code</td>
            <td>
                <?php echo $this->Form->input('graduate_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>           
        <tr>
            <td>Graduate type</td>
            <td>
                <?php echo $this->Form->input('graduate_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Education type code</td>
            <td>
                <?php echo $this->Form->input('edu_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
            </div>
        <tr>
            <td>Education type</td>
            <td>
                <?php echo $this->Form->input('edu_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Newest Education code</td>
            <td>
                <?php echo $this->Form->input('newest_edu_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Newest Education</td>
            <td>
                <?php echo $this->Form->input('newest_edu', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>School type code</td>
            <td>
                <?php echo $this->Form->input('school_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>School type</td>
            <td>
                <?php echo $this->Form->input('school_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Diploma type code</td>
            <td>
                <?php echo $this->Form->input('diploma_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Diploma type</td>
            <td>
                <?php echo $this->Form->input('diploma_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>School</td>
            <td>
                <?php echo $this->Form->input('school', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Faculty</td>
            <td>
                <?php echo $this->Form->input('faculty', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Subject</td>
            <td>
                <?php echo $this->Form->input('subject', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Major</td>
            <td>
                <?php echo $this->Form->input('major', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr class="form-actions"> 
            <td colspan="2">
                <button class="btn btn-primary" type="submit">登録</button>
                <a class = 'btn margin-left13' href="<?php echo $this->Session->read('save_latest_link_school'); ?>" >キャンセル</a>
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
