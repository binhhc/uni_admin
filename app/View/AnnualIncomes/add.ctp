<?php echo $this->Form->create('AnnualIncome', array()) ?>
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
            <td>Yearly amount</td>
            <td>
                <?php echo $this->Form->input('yearly_amount', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </td>
        </tr>
        <tr>
            <td>Income gross</td>
            <td>
                <?php echo $this->Form->input('income_gross', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </td>
        </tr>           
        <tr>
            <td>Income net</td>
            <td>
                <?php echo $this->Form->input('income_net', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </td>
        </tr>
        <tr>
            <td>Total cut</td>
            <td>
                <?php echo $this->Form->input('total_cut', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </td>
            </div>
        <tr>
            <td>Total tax</td>
            <td>
                <?php echo $this->Form->input('total_tax', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </td>
        </tr>
        <tr>
            <td>Note</td>
            <td>
                <?php echo $this->Form->input('note', array('class' => 'span6', 'label' => false, 'type' => 'area', 'cols'=>30, 'rows'=>5)); ?>
            </td>
        </tr>
        
        <tr class="form-actions"> 
            <td colspan="2">
                <button class="btn btn-primary" type="submit">登録</button>
                <a class = 'btn margin-left13' href="<?php echo $this->Session->read('save_latest_link_annual') ?>" >キャンセル</a>
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
 