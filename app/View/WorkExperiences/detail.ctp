<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">
                    <div class="widget-head">
                      <div class="pull-left"><h3><b>職歴情報</b></h3></div>
                      <div class="clearfix"></div>
                    </div>
                <div class="widget-content">
                    <div class="padd">
                <?php echo $this->Form->create('WorkExperience', array('class'=>'form-horizontal')) ?>
                        <fieldset class="col-md-6">
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">社員番号</label>
                                <div class="col-lg-6">
                                    <?php
                                        if(empty($readonly)){
                                            echo $this->Form->input('employee_id', array('class'=>'form-control','label' => false, 'type' => 'select', 'options' => $user_info,'required'=>false));
                                        }else{
                                            echo $this->Form->input('employee_id', array('class'=>'form-control','label' => false, 'type' => 'text', 'required'=>false, $readonly));
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">入社年月日</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('join_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">退社年月日</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('leave_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">勤続年数</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('work_year', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">会社名</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('company', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">業種</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('bussiness_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">郵便番号</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('company_zip_code', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">会社住所</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('company_address', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">国内外区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('abroad_type_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">国内外区分</label>
                                <div class="col-lg-6">
                                        <?php echo $this->Form->input('abroad_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">役職</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('position', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">退職の事由コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('retire_reason_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">退職の事由</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('retire_reason', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">退職理由</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('retire_content', array('class' => 'form-control', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">備考</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
                                </div>
                            </div>
                        </fieldset>
                    <div class="form-actions">
                        <?php
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_work'), array('class'=>'btn btn-default') );
                        ?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
