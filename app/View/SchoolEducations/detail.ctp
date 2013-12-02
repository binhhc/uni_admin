<div class="row-fluid sortable">
    <div class="box span12">
        <div data-original-title="" class="box-header">
            <h4>SchoolEducations</h4>
        </div>
        <div class="box-content" >
        <?php echo $this->Form->create('SchoolEducation', array('class'=>'form-horizontal')) ?>
            <fieldset>
            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                
            <div class="control-group">
                <label for="typeahead" class="control-label">Employee id</label>
                <div class="controls">
                    <?php echo $this->Form->input('employee_id', array('class'=>'span6','label' => false, 'type' => 'text', @$readonly)); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Graduate year</label>
                <div class="controls">
                    <?php echo $this->Form->input('graduate_year', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Graduate type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('graduate_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Graduate type</label>
                <div class="controls">
                    <?php echo $this->Form->input('graduate_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Education type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('edu_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Education type</label>
                <div class="controls">
                    <?php echo $this->Form->input('edu_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Newest Education code</label>
                <div class="controls">
                    <?php echo $this->Form->input('newest_edu_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Newest Education</label>
                <div class="controls">
                    <?php echo $this->Form->input('newest_edu', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">School type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('school_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">School type</label>
                <div class="controls">
                    <?php echo $this->Form->input('school_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Diploma type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('diploma_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Diploma type</label>
                <div class="controls">
                    <?php echo $this->Form->input('diploma_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">School</label>
                <div class="controls">
                    <?php echo $this->Form->input('school', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Faculty</label>
                <div class="controls">
                    <?php echo $this->Form->input('faculty', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Subject</label>
                <div class="controls">
                    <?php echo $this->Form->input('subject', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Major</label>
                <div class="controls">
                    <?php echo $this->Form->input('major', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>            

            <div class="form-actions">
                <?php 
                    echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false)); 
                    echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_school'), array('class'=>'btn margin-left13') );
                ?>       
            </div>         
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>  