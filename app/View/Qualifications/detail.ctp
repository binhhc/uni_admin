<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('Qualification', array('class'=>'form-horizontal')) ?>
                    <h3>免許資格</h3>
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
                                <label class="control-label">免許資格区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('license_type_cd', array('class'=>'input-block-level','label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">免許資格区分</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('license_type', array('class'=>'input-block-level','label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">発行団体</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('issuing_organization', array('class'=>'input-block-level','label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">資格名称</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('license_name', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">取得年月日</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('acquire_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="span6">
                            <div class="control-group">
                                <label class="control-label">更新年月日</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('update_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">有効期限</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('expire_date', array('class' => 'datepicker input-block-level', 'label' => false, 'type' => 'text', 'readonly' => true)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">認定番号</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('certification_number', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">資格添付ファイル</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('attachment', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">備考</label>
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
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_quanlity'), array('class'=>'btn margin-left13') );
                        ?>       
                    </div>          
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>