<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('UnitPrice', array('class'=>'form-horizontal')) ?>
                    <h3>給与精算</h3>
                    <hr style="margin-top:0"/>
                    <div class="row-fluid">
                        <fieldset class="span6">
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                                    
                            <div class="control-group">
                                <label class="control-label">社員番号</label>
                                <div class="controls">
                                    <?php
                                        if(empty($readonly)){
                                           echo $this->Form->input('employee_id', array('class'=>'input-block-level','label' => false, 'type' => 'select', 'options' => $user_info,'required'=>false));  
                                        }else{
                                           echo $this->Form->input('employee_id', array('class'=>'input-block-level','label' => false, 'type' => 'text', 'required'=>false, $readonly));
                                        }
                                        
                                    ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">改定年月日</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('revise_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">給与区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('salary_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">給与区分</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('salary_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">報酬額</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('bonus', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">調整給</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('adjust_salary', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">扶養手当</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('support_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">リーダー手当て</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('leader_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">食事手当て</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('meal_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">ご近所手当</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('address_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">欠勤控除減額</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('absent_salary_cut', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">遅早控除減額</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('late_salary_cut', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>                            
                        </fieldset>
                        
                        <fieldset class="span6">
                            <div class="control-group">
                                <label class="control-label">普通残業</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_normal', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>                            

                            <div class="control-group">
                                <label class="control-label">深夜残業</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_night', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">休出残業</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_holiday', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">残業予備1</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_1', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">残業予備2</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_2', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">残業予備3</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_3', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">残業予備4</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_4', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">残業予備5</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_5', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">基本賞与</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('basic_bonus', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">備考</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('note', array('class' => 'input-block-level', 'label' => false, 'type' => 'area', 'rows'=> 5, 'cols'=>30)); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center form-actions">
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_price'), array('class'=>'btn margin-left13') );
                        ?>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>