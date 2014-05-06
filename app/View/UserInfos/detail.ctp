<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">
                    <div class="widget-head">
                      <div class="pull-left">社員情報</div>
                      <div class="clearfix"></div>
                    </div>

                <div class="widget-content">
                    <div class="padd">

                <?php echo $this->Form->create('UserInfo', array('class'=>'form-horizontal'));?>

                    <fieldset class = "col-md-6">
                        <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                        <div class="form-group">
                            <label class="col-lg-6 col-lg-6 control-label">社員番号</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('employee_id', array('required' => false, 'class'=>'form-control','label' => false, 'type' => 'text', @$readonly)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">氏名</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('employee_name', array('required' => false, 'class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">氏名（フリガナ）</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('employee_name_furigana', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">氏名（英字）</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('employee_name_alphabet', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">社用e-Mail</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('office_email', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">入社年月日</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('company_join_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">性別</label>
                            <div class="radio col-lg-6">
                                <?php
                                $gender = unserialize(GENDER_CODE);
                                echo $this->Form->radio('gender_code', $gender, array('legend' => false,)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">生年月日</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('birthday', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">雇用区分</label>
                            <div class="col-lg-6">
                                <?php
                                $employment = unserialize(EMPLOYMENT_TYPE);
                                echo $this->Form->input('employment_type_cd', array('class'=>'form-control', 'label' => false, 'type' => 'select', 'options' => $employment, 'required'=>false));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">郵便番号</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('zip_code', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">都道府県</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('prefecture', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">市区町村</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('ward', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">番地</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('address', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">マンション／ビル等</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('building', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">職種</label>
                            <div class="col-lg-6">
                                <?php
                                $job = unserialize(JOB_CD);
                                echo $this->Form->input('job_cd', array('class'=>'form-control', 'label' => false, 'type' => 'select', 'options' => $job, 'required' => false)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">役職</label>
                            <div class="col-lg-6">
                                <?php
                                $position = unserialize(POSITION);
                                echo $this->Form->input('position_cd', array('class'=>'form-control', 'label' => false, 'type' => 'select', 'options' => $position, 'required' => false)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">勤務地</label>
                            <div class="col-lg-6">
                                <?php
                                $work_location = unserialize(WORK_LOCATION);
                                echo $this->Form->input('work_location_cd', array('class'=>'form-control', 'label' => false, 'type' => 'select', 'options' => $work_location, 'required' => false)); ?>
                            </div>
                        </div>

                        </fieldset>

                        <fieldset class="col-md-6">

                        <div class="form-group">
                            <label class="col-lg-6 control-label">所属コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('department_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">所属</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('department', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">障害手帳区分コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('problem_type_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">障害手帳区分</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('problem_type', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">障害等級</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('problem_grade', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">障害内容</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('problem_content', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">採用区分コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('recruit_type_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">採用区分</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('recruit_type', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">採用地コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('recruit_place_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">採用地</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('recruit_place', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">紹介区分コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('introduction_type_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">紹介区分</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('introduction_type', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">紹介者</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('introduction_person', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">紹介者関係コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('introduction_related_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">紹介者関係</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('introduction_related', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">顔ナビ権限コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('face_auth_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">顔ナビ権限</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('face_auth', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">評価職種コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('rating_job_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">評価職種</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('rating_job', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">評価等級コード</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('rating_grade_cd', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6 control-label">評価等級</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('rating_grade', array('class'=>'form-control', 'label' => false, 'type' => 'text')); ?>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="text-center form-actions">
                    <?php
                        echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                        echo ' ';
                        echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_info'), array('class'=>'btn btn-default') );
                        ?>
                </div>
                <?php echo $this->Form->end(); ?>
                </div>
                </div>
                    <div class="widget-foot">
                        <!-- Footer goes here -->
                    </div>
              </div>

            </div>

            </div>
        </div>
    </div>
</div>


