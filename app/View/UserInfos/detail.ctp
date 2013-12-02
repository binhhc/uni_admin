<div class="row-fluid sortable">
    <div class="box span12">
        <div data-original-title="" class="box-header">
            <h4>UserInfos</h4>
        </div>
        <div class="box-content" >
        <?php echo $this->Form->create('UserInfo', array('class'=>'form-horizontal')) ?>
            <fieldset>
            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                
            <div class="control-group">
                <label for="typeahead" class="control-label">Employee id</label>
                <div class="controls">
                    <?php echo $this->Form->input('employee_id', array('class'=>'span6','label' => false, 'type' => 'text', @$readonly)); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Employee name</label>
                <div class="controls">
                    <?php echo $this->Form->input('employee_name', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Name furigana</label>
                <div class="controls">
                    <?php echo $this->Form->input('employee_name_furigana', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Name alphabet</label>
                <div class="controls">
                    <?php echo $this->Form->input('employee_name_alphabet', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Office email</label>
                <div class="controls">
                    <?php echo $this->Form->input('office_email', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Company Join date</label>
                <div class="controls">
                    <?php echo $this->Form->input('company_join_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Gender code</label>
                <div class="controls">
                    <?php echo $this->Form->input('gender_code', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Sex</label>
                <div class="controls">
                    <?php echo $this->Form->input('sex', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Birthday</label>
                <div class="controls">
                    <?php echo $this->Form->input('birthday', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Work year</label>
                <div class="controls">
                    <?php echo $this->Form->input('work_year', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Age</label>
                <div class="controls">
                    <?php echo $this->Form->input('age', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Employment type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('employment_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Employment type</label>
                <div class="controls">
                    <?php echo $this->Form->input('employment_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Zip code</label>
                <div class="controls">
                    <?php echo $this->Form->input('zip_code', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Adjust salary</label>
                <div class="controls">
                    <?php echo $this->Form->input('adjust_salary', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Prefecture</label>
                <div class="controls">
                    <?php echo $this->Form->input('prefecture', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Ward</label>
                <div class="controls">
                    <?php echo $this->Form->input('ward', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Address</label>
                <div class="controls">
                    <?php echo $this->Form->input('address', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Building</label>
                <div class="controls">
                    <?php echo $this->Form->input('building', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Job code</label>
                <div class="controls">
                    <?php echo $this->Form->input('job_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Job name</label>
                <div class="controls">
                    <?php echo $this->Form->input('job', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Position code</label>
                <div class="controls">
                    <?php echo $this->Form->input('position_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Position name</label>
                <div class="controls">
                    <?php echo $this->Form->input('position', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Work location code</label>
                <div class="controls">
                    <?php echo $this->Form->input('work_location_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Work location</label>
                <div class="controls">
                    <?php echo $this->Form->input('work_location', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Department code</label>
                <div class="controls">
                    <?php echo $this->Form->input('department_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Department name</label>
                <div class="controls">
                    <?php echo $this->Form->input('department', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Problem type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('problem_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Problem type</label>
                <div class="controls">
                    <?php echo $this->Form->input('problem_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Problem grade</label>
                <div class="controls">
                    <?php echo $this->Form->input('problem_grade', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Problem content</label>
                <div class="controls">
                    <?php echo $this->Form->input('problem_content', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Recruit type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('recruit_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Recruit type</label>
                <div class="controls">
                    <?php echo $this->Form->input('recruit_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Recruit place code</label>
                <div class="controls">
                    <?php echo $this->Form->input('recruit_place_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Recruit place</label>
                <div class="controls">
                    <?php echo $this->Form->input('recruit_place', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Introduction type code</label>
                <div class="controls">
                    <?php echo $this->Form->input('introduction_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Introduction type</label>
                <div class="controls">
                    <?php echo $this->Form->input('introduction_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Introduction person</label>
                <div class="controls">
                    <?php echo $this->Form->input('introduction_person', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Introduction related code</label>
                <div class="controls">
                    <?php echo $this->Form->input('introduction_related_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Introduction related</label>
                <div class="controls">
                    <?php echo $this->Form->input('introduction_related', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Face auth code</label>
                <div class="controls">
                    <?php echo $this->Form->input('face_auth_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Face auth</label>
                <div class="controls">
                    <?php echo $this->Form->input('face_auth', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Rating job code</label>
                <div class="controls">
                    <?php echo $this->Form->input('rating_job_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Rating job</label>
                <div class="controls">
                    <?php echo $this->Form->input('rating_job', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Rating grade code</label>
                <div class="controls">
                    <?php echo $this->Form->input('rating_grade_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>

            <div class="control-group">
                <label for="typeahead" class="control-label">Rating grade</label>
                <div class="controls">
                    <?php echo $this->Form->input('rating_grade', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
                </div>
            </div>                        

            <div class="form-actions">
                <?php 
                    echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false)); 
                    echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_info'), array('class'=>'btn margin-left13') );
                ?>       
            </div>         
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>       