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
                                <label class="control-label">Employee id</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('employee_id', array('class'=>'input-block-level','label' => false, 'options' => $user_info,'type' => 'select', @$readonly)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Revise date</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('revise_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Salary type code</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('salary_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Salary type</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('salary_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Bonus</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('bonus', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Adjust salary</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('adjust_salary', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Support allowance</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('support_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Leader allowance</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('leader_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Adjust salary</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('adjust_salary', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Meal allowance</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('meal_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Address allowance</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('address_allowance', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Absent salary cut</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('absent_salary_cut', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Late salary cut</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('late_salary_cut', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Adjust salary</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('adjust_salary', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="span6">
                            <div class="control-group">
                                <label class="control-label">Overtime normal</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_normal', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Adjust salary</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('adjust_salary', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime night</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_night', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime holiday</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_holiday', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime 1</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_1', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime 2</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_2', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime 3</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_3', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime 4</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_4', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Overtime 5</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('overtime_5', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Basic bonus</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('basic_bonus', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Note</label>
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