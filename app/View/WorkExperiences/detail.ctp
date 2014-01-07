<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('WorkExperience', array('class'=>'form-horizontal')) ?>
                    <h3>職種履歴</h3>
                    <hr style="margin-top:0"/>
                    <div class="row-fluid">
                        <fieldset class="span6">                            
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">社員番号</label>
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
                                <label for="typeahead" class="control-label">入社年月日</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('join_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">退社年月日</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('leave_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">勤続年数</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('work_year', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">会社名</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('company', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">業種</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('bussiness_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">郵便番号</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('company_zip_code', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">会社住所</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('company_address', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">国内外区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('abroad_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="span6">
                            <div class="control-group">
                                <label for="typeahead" class="control-label">国内外区分</label>
                                <div class="controls">
                                        <?php echo $this->Form->input('abroad_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">役職</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('position', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">退職の事由コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('retire_reason_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">退職の事由</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('retire_reason', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">退職理由</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('retire_content', array('class' => 'input-block-level', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">備考</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('note', array('class' => 'input-block-level', 'label' => false, 'type' => 'area', 'cols' => 20, 'rows' => 5)); ?>
                                </div>
                            </div>                        
                        </fieldset>
                    </div>
                    <div class="text-center form-actions">
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false)); 
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_work'), array('class'=>'btn margin-left13') );
                        ?>       
                    </div>        
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
      