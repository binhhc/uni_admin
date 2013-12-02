<div class="row-fluid sortable">
    <div class="box span12">
        <div data-original-title="" class="box-header">
            <h4>Quanlifications</h4>
        </div>
        <div class="box-content" >
        <?php echo $this->Form->create('Quanlification', array('class'=>'form-horizontal')) ?>
            <fieldset>
            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                
            <div class="control-group">
                <label for="typeahead" class="control-label">Employee id</label>
                <div class="controls">
                    <?php echo $this->Form->input('employee_id', array('class'=>'span6','label' => false, 'type' => 'text', @$readonly)); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">License type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('license_type_cd', array('class'=>'span6','label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">License type</label>
                <div class="controls">
                    <?php echo $this->Form->input('license_type', array('class'=>'span6','label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Issuing organization</label>
                <div class="controls">
                    <?php echo $this->Form->input('issuing_organization', array('class'=>'span6','label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">License name</label>
                <div class="controls">
                    <?php echo $this->Form->input('license_name', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Education type</label>
                <div class="controls">
                    <?php echo $this->Form->input('edu_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Acquire date</label>
                <div class="controls">
                    <?php echo $this->Form->input('acquire_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Update date</label>
                <div class="controls">
                   <?php echo $this->Form->input('update_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Expire date</label>
                <div class="controls">
                   <?php echo $this->Form->input('expire_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Certification number</label>
                <div class="controls">
                   <?php echo $this->Form->input('certification_number', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Attachment</label>
                <div class="controls">
                   <?php echo $this->Form->input('attachment', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Note</label>
                <div class="controls">
                   <?php echo $this->Form->input('note', array('class' => 'span6', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
                </div>
            </div>

            <div class="form-actions">
                <?php 
                    echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false)); 
                    echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_quanlity'), array('class'=>'btn margin-left13') );
                ?>       
            </div>          
            
         
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>             