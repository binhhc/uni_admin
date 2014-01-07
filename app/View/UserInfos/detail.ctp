<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('UserInfo', array('class'=>'form-horizontal')) ?>
                <h3>社員情報</h3>
                <hr style="margin-top:0"/>
                <div class="row-fluid">
                    <fieldset class = "span6">
                        <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                        <div class="control-group">
                            <label class="control-label">社員番号</label>
                            <div class="controls">
                                <?php echo $this->Form->input('employee_id', array('required' => false, 'class'=>'input-block-level','label' => false, 'type' => 'text', @$readonly)); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">氏名</label>
                            <div class="controls">
                                <?php echo $this->Form->input('employee_name', array('required' => false, 'class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">氏名（フリガナ）</label>
                            <div class="controls">
                                <?php echo $this->Form->input('employee_name_furigana', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">氏名（漢字）</label>
                            <div class="controls">
                                <?php echo $this->Form->input('employee_name_alphabet', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">社用e-Mail</label>
                            <div class="controls">
                                <?php echo $this->Form->input('office_email', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">入社年月日</label>
                            <div class="controls">
                                <?php echo $this->Form->input('company_join_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">性別コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('gender_code', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>
                        <?php 
                            $arr_sex = array('男性' => ' 男性', '女性' => ' 女性');
                        ?>
                        <div class="control-group">
                            <label class="control-label">性別</label>
                            <div class="controls">
                                <?php echo $this->Form->radio('sex', $arr_sex, array('legend' => false, 'class' => 'input-block-level', 'style' => 'margin-left:10px','label' => false, 'value' => '男性'))?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">生年月日</label>
                            <div class="controls">
                                <?php echo $this->Form->input('birthday', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">勤続年数</label>
                            <div class="controls">
                                <?php echo $this->Form->input('work_year', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">年齢</label>
                            <div class="controls">
                                <?php echo $this->Form->input('age', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">雇用区分コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('employment_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">雇用区分</label>
                            <div class="controls">
                                <?php echo $this->Form->input('employment_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">郵便番号</label>
                            <div class="controls">
                                <?php echo $this->Form->input('zip_code', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>                       

                        <div class="control-group">
                            <label class="control-label">都道府県</label>
                            <div class="controls">
                                <?php echo $this->Form->input('prefecture', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">市区町村</label>
                            <div class="controls">
                                <?php echo $this->Form->input('ward', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">番地</label>
                            <div class="controls">
                                <?php echo $this->Form->input('address', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">マンション／ビル等</label>
                            <div class="controls">
                                <?php echo $this->Form->input('building', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">職種コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('job_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">職種</label>
                            <div class="controls">
                                <?php echo $this->Form->input('job', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">役職コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('position_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">役職</label>
                            <div class="controls">
                                <?php echo $this->Form->input('position', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        </fieldset>
                        <fieldset class = "span6">
                        
                        <div class="control-group">
                            <label class="control-label">勤務地コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('work_location_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">勤務地</label>
                            <div class="controls">
                                <?php echo $this->Form->input('work_location', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">所属コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('department_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">所属</label>
                            <div class="controls">
                                <?php echo $this->Form->input('department', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">障害手帳区分コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('problem_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">障害手帳区分</label>
                            <div class="controls">
                                <?php echo $this->Form->input('problem_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">障害等級</label>
                            <div class="controls">
                                <?php echo $this->Form->input('problem_grade', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">障害内容</label>
                            <div class="controls">
                                <?php echo $this->Form->input('problem_content', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">採用区分コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('recruit_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">採用区分</label>
                            <div class="controls">
                                <?php echo $this->Form->input('recruit_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">採用地コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('recruit_place_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">採用地</label>
                            <div class="controls">
                                <?php echo $this->Form->input('recruit_place', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">紹介区分コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('introduction_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">紹介区分</label>
                            <div class="controls">
                                <?php echo $this->Form->input('introduction_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">紹介者</label>
                            <div class="controls">
                                <?php echo $this->Form->input('introduction_person', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">紹介者関係コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('introduction_related_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">紹介者関係</label>
                            <div class="controls">
                                <?php echo $this->Form->input('introduction_related', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">顔ナビ権限コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('face_auth_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">顔ナビ権限</label>
                            <div class="controls">
                                <?php echo $this->Form->input('face_auth', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">評価職種コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('rating_job_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">評価職種</label>
                            <div class="controls">
                                <?php echo $this->Form->input('rating_job', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">評価等級コード</label>
                            <div class="controls">
                                <?php echo $this->Form->input('rating_grade_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">評価等級</label>
                            <div class="controls">
                                <?php echo $this->Form->input('rating_grade', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>      
                    </fieldset>
                </div>                        

                <div class="text-center form-actions">
                    <?php 
                        echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                        echo ' '; 
                        echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_info'), array('class'=>'btn margin-left13') );
                        ?>       
                </div>   
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>