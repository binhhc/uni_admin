<?php echo $this->Form->create('AnnualIncome', array('class'=>'form-horizontal')) ?>            
    <fieldset>
        <legend>Annual Incomes</legend>   
        <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                
        <div class="control-group">
            <label for="typeahead" class="control-label">Employee id</label>
            <div class="controls">               
                <?php echo $this->Form->input('employee_id', array('class'=>'span4' , 'label' => false, 'type' => 'select',  'options' => $user_info,@$readonly)); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="typeahead" class="control-label">Yearly amount</label>
            <div class="controls">               
                <?php echo $this->Form->input('yearly_amount', array('class' => 'span4', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </div>
        </div>

        <div class="control-group">
            <label for="typeahead" class="control-label">Income gross</label>
            <div class="controls">               
                <?php echo $this->Form->input('income_gross', array('class' => 'span4', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </div>
        </div>

        <div class="control-group">
            <label for="typeahead" class="control-label">Income net</label>
            <div class="controls">               
                <?php echo $this->Form->input('income_net', array('class' => 'span4', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
        </div>

        <div class="control-group">
            <label for="typeahead" class="control-label">Total cut</label>
            <div class="controls">               
                <?php echo $this->Form->input('total_cut', array('class' => 'span4', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
        </div>

        <div class="control-group">
            <label for="typeahead" class="control-label">Total tax</label>
            <div class="controls">               
                <?php echo $this->Form->input('total_tax', array('class' => 'span4', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
            </div>
        </div>

        <div class="control-group">
            <label for="typeahead" class="control-label">Note</label>
            <div class="controls">               
                         <?php echo $this->Form->input('note', array('class' => 'span4', 'label' => false, 'type' => 'area', 'cols'=>30, 'rows'=>5)); ?>
            </div>
        </div>
                   
        <div class="form-actions">  
            <?php 
                echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                echo ' '; 
                echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_annual'), array('class'=>'btn margin-left13') );
            ?>     
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>