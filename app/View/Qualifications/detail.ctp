<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">
                    <div class="widget-head">
                      <div class="pull-left">免許資格</div>
                      <div class="clearfix"></div>
                    </div>

                <div class="widget-content">
                    <div class="padd">
                <?php echo $this->Form->create('Qualification', array('class'=>'form-horizontal')) ?>

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
                                <label class="col-lg-6 col-lg-6 control-label">免許資格区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('license_type_cd', array('class'=>'form-control','label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">免許資格区分</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('license_type', array('class'=>'form-control','label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">発行団体</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('issuing_organization', array('class'=>'form-control','label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">資格名称</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('license_name', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">取得年月日</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('acquire_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">更新年月日</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('update_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">有効期限</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('expire_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">認定番号</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('certification_number', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">資格添付ファイル</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('attachment', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">資格手当</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('allowance', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">備考</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="text-center form-actions">
                        <?php
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_quanlity'), array('class'=>'btn btn-default') );
                        ?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>