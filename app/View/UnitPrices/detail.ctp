<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">
                    <div class="widget-head">
                      <div class="pull-left">給与情報</div>
                      <div class="clearfix"></div>
                    </div>

                <div class="widget-content">
                    <div class="padd">
                <?php echo $this->Form->create('UnitPrice', array('class'=>'form-horizontal')) ?>
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
                                <label class="col-lg-6 col-lg-6 control-label">改定年月日</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('revise_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">給与区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('salary_type_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">給与区分</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('salary_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">報酬額</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('bonus', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">調整給</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('adjust_salary', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">扶養手当</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('support_allowance', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">リーダー手当て</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('leader_allowance', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">食事手当て</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('meal_allowance', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">ご近所手当</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('address_allowance', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">欠勤控除減額</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('absent_salary_cut', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="col-md-6">
                             <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">遅早控除減額</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('late_salary_cut', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">普通残業</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_normal', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">深夜残業</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_night', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">休出残業</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_holiday', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">残業予備1</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_1', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">残業予備2</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_2', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">残業予備3</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_3', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">残業予備4</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_4', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">残業予備5</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('overtime_5', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">基本賞与</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('basic_bonus', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">備考</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false, 'type' => 'area', 'rows'=> 5, 'cols'=>30)); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center form-actions">
                        <?php
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_price'), array('class'=>'btn btn-default') );
                        ?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>