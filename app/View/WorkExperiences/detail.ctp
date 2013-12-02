<div class="row-fluid sortable">
    <div class="box span12">
        <div data-original-title="" class="box-header">
            <h4>WorkExperience</h4>
        </div>
        <div class="box-content" >
            <?php echo $this->Form->create('WorkExperience', array('class'=>'form-horizontal')) ?>
            <fieldset>
                <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Employee id</label>
                    <div class="controls">
                        <?php echo $this->Form->input('employee_id', array('class'=>'span6','label' => false, 'type' => 'text', @$readonly)); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Join date</label>
                    <div class="controls">
                        <?php echo $this->Form->input('join_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Leave date</label>
                    <div class="controls">
                        <?php echo $this->Form->input('leave_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Work year</label>
                    <div class="controls">
                        <?php echo $this->Form->input('work_year', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Company</label>
                    <div class="controls">
                        <?php echo $this->Form->input('company', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Business type</label>
                    <div class="controls">
                        <?php echo $this->Form->input('bussiness_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Company zip code</label>
                    <div class="controls">
                        <?php echo $this->Form->input('company_zip_code', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Company address</label>
                    <div class="controls">
                        <?php echo $this->Form->input('company_address', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Abroad type code</label>
                    <div class="controls">
                        <?php echo $this->Form->input('abroad_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Abroad type</label>
                    <div class="controls">
                        <?php echo $this->Form->input('abroad_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Position</label>
                    <div class="controls">
                        <?php echo $this->Form->input('position', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Employment type code</label>
                    <div class="controls">
                        <?php echo $this->Form->input('employment_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Retire reason code</label>
                    <div class="controls">
                        <?php echo $this->Form->input('retire_reason_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Retire reason</label>
                    <div class="controls">
                        <?php echo $this->Form->input('retire_reason', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="typeahead" class="control-label">Retire content</label>
                    <div class="controls">
                        <?php echo $this->Form->input('retire_content', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
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
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_work'), array('class'=>'btn margin-left13') );
                        ?>       
                </div>         
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>       
