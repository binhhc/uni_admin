<?php echo $this->Form->create('UnitPrice', array()) ?>
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
            <td>Revise date</td>
            <td>
                <?php echo $this->Form->input('revise_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Salary type code</td>
            <td>
                <?php echo $this->Form->input('salary_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>           
        <tr>
            <td>Salary type</td>
            <td>
                <?php echo $this->Form->input('salary_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Note</td>
            <td>
                <?php echo $this->Form->input('note', array('class' => 'span6', 'label' => false, 'type' => 'area', 'rows'=> 5, 'cols'=>30)); ?>
            </td>
            </div>
        <tr>
            <td>Bonus</td>
            <td>
                <?php echo $this->Form->input('bonus', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Adjust salary</td>
            <td>
                <?php echo $this->Form->input('adjust_salary', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Support allowance</td>
            <td>
                <?php echo $this->Form->input('support_allowance', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Leader allowance</td>
            <td>
                <?php echo $this->Form->input('leader_allowance', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Adjust salary</td>
            <td>
                <?php echo $this->Form->input('adjust_salary', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Meal allowance</td>
            <td>
                <?php echo $this->Form->input('meal_allowance', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Address allowance</td>
            <td>
                <?php echo $this->Form->input('address_allowance', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Absent salary cut</td>
            <td>
                <?php echo $this->Form->input('absent_salary_cut', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Late salary cut</td>
            <td>
                <?php echo $this->Form->input('late_salary_cut', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Adjust salary</td>
            <td>
                <?php echo $this->Form->input('adjust_salary', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime normal</td>
            <td>
                <?php echo $this->Form->input('overtime_normal', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Adjust salary</td>
            <td>
                <?php echo $this->Form->input('adjust_salary', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime night</td>
            <td>
                <?php echo $this->Form->input('overtime_night', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime holiday</td>
            <td>
                <?php echo $this->Form->input('overtime_holiday', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime 1</td>
            <td>
                <?php echo $this->Form->input('overtime_1', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime 2</td>
            <td>
                <?php echo $this->Form->input('overtime_2', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime 3</td>
            <td>
                <?php echo $this->Form->input('overtime_3', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime 4</td>
            <td>
                <?php echo $this->Form->input('overtime_4', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Overtime 5</td>
            <td>
                <?php echo $this->Form->input('overtime_5', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Basic bonus</td>
            <td>
                <?php echo $this->Form->input('basic_bonus', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        
        <tr class="form-actions"> 
            <td colspan="2">
                <button class="btn btn-primary" type="submit">登録</button>
                <a class = 'btn margin-left13' href="<?php echo $this->Session->read('save_latest_link_price') ?>" >キャンセル</a>
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
