
<div class="row-fluid sortable">
    <div class="box span12">
        <div data-original-title="" class="box-header">
            <h4>AnnualIncomes</h4>
        </div>
        <div class="box-content" >
            <?php echo $this->Form->create('AnnualIncome', array('class'=>'form-horizontal')) ?>            
            <fieldset>    
                <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Employee id</label>
                    <div class="controls">               
                        <?php echo $this->Form->input('employee_id', array('class'=>'span6' , 'label' => false, 'type' => 'text', @$readonly)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Yearly amount</label>
                    <div class="controls">               
                        <?php echo $this->Form->input('yearly_amount', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Income gross</label>
                    <div class="controls">               
                        <?php echo $this->Form->input('income_gross', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Income net</label>
                    <div class="controls">               
                        <?php echo $this->Form->input('income_net', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Total cut</label>
                    <div class="controls">               
                        <?php echo $this->Form->input('total_cut', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Total tax</label>
                    <div class="controls">               
                         <?php echo $this->Form->input('total_tax', array('class' => 'span6', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="typeahead" class="control-label">Note</label>
                    <div class="controls">               
                         <?php echo $this->Form->input('note', array('class' => 'span6', 'label' => false, 'type' => 'area', 'cols'=>30, 'rows'=>5)); ?>
                    </div>
                </div>
                   
                <div class="form-actions">  
                    <?php 
                        echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false)); 
                        echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_annual'), array('class'=>'btn margin-left13') );
                    ?>     
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div> 