<?php echo $this->Form->create('UserInfo', array()) ?>
<fieldset>
    <table class="table table-hover">
        <caption>User information</caption>
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
            <td>Employee name</td>
            <td>
                <?php echo $this->Form->input('employee_name', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Name furigana</td>
            <td>
                <?php echo $this->Form->input('employee_name_furigana', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>           
        <tr>
            <td>Name alphabet</td>
            <td>
                <?php echo $this->Form->input('employee_name_alphabet', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Office email</td>
            <td>
                <?php echo $this->Form->input('office_email', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
            </div>
        <tr>
            <td>Company Join date</td>
            <td>
                <?php echo $this->Form->input('company_join_date', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Gender code</td>
            <td>
                <?php echo $this->Form->input('gender_code', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Sex</td>
            <td>
                <?php echo $this->Form->input('sex', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Birthday</td>
            <td>
                <?php echo $this->Form->input('birthday', array('class' => 'datepicker span4', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Work year</td>
            <td>
                <?php echo $this->Form->input('work_year', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Age</td>
            <td>
                <?php echo $this->Form->input('age', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Employment type code</td>
            <td>
                <?php echo $this->Form->input('employment_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Employment type</td>
            <td>
                <?php echo $this->Form->input('employment_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Zip code</td>
            <td>
                <?php echo $this->Form->input('zip_code', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Adjust salary</td>
            <td>
                <?php echo $this->Form->input('adjust_salary', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Prefecture</td>
            <td>
                <?php echo $this->Form->input('prefecture', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Ward</td>
            <td>
                <?php echo $this->Form->input('ward', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <?php echo $this->Form->input('address', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Building</td>
            <td>
                <?php echo $this->Form->input('building', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Job code</td>
            <td>
                <?php echo $this->Form->input('job_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Job name</td>
            <td>
                <?php echo $this->Form->input('job', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Position code</td>
            <td>
                <?php echo $this->Form->input('position_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Position name</td>
            <td>
                <?php echo $this->Form->input('position', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Work location code</td>
            <td>
                <?php echo $this->Form->input('work_location_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Work location</td>
            <td>
                <?php echo $this->Form->input('work_location', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr> 
        <tr>
            <td>Department code</td>
            <td>
                <?php echo $this->Form->input('department_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Department name</td>
            <td>
                <?php echo $this->Form->input('department', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Problem type code</td>
            <td>
                <?php echo $this->Form->input('problem_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Problem type</td>
            <td>
                <?php echo $this->Form->input('problem_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Problem grade</td>
            <td>
                <?php echo $this->Form->input('problem_grade', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Problem content</td>
            <td>
                <?php echo $this->Form->input('problem_content', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Recruit type code</td>
            <td>
                <?php echo $this->Form->input('recruit_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Recruit type</td>
            <td>
                <?php echo $this->Form->input('recruit_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Recruit place code</td>
            <td>
                <?php echo $this->Form->input('recruit_place_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Recruit place</td>
            <td>
                <?php echo $this->Form->input('recruit_place', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Introduction type code</td>
            <td>
                <?php echo $this->Form->input('introduction_type_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Introduction type</td>
            <td>
                <?php echo $this->Form->input('introduction_type', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Introduction person</td>
            <td>
                <?php echo $this->Form->input('introduction_person', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Introduction related code</td>
            <td>
                <?php echo $this->Form->input('introduction_related_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td></td>
            <td>
                <?php echo $this->Form->input('', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Introduction related</td>
            <td>
                <?php echo $this->Form->input('introduction_related', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Face auth code</td>
            <td>
                <?php echo $this->Form->input('face_auth_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Face auth</td>
            <td>
                <?php echo $this->Form->input('face_auth', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Rating job code</td>
            <td>
                <?php echo $this->Form->input('rating_job_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
         <tr>
            <td>Rating job</td>
            <td>
                <?php echo $this->Form->input('rating_job', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Rating grade code</td>
            <td>
                <?php echo $this->Form->input('rating_grade_cd', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        <tr>
            <td>Rating grade</td>
            <td>
                <?php echo $this->Form->input('rating_grade', array('class' => 'span6', 'label' => false, 'type' => 'text')); ?>
            </td>
        </tr>
        
        <tr class="form-actions"> 
            <td colspan="2">
                <button class="btn btn-primary" type="submit">登録</button>
                <a class = 'btn margin-left13' href="<?php echo $this->Session->read('save_latest_link_info') ?>" >キャンセル</a>
            </td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
