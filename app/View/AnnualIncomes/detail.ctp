<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('AnnualIncome', array('class'=>'form-horizontal')) ?>
                    <h3>年収精算</h3>
                    <hr style="margin-top:0"/>
                    <div class="row-fluid">
                        <fieldset class="span6">
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">社員番号</label>
                                <div class="controls">
                                    <?php
                                        if(empty($readonly)){
                                            echo $this->Form->input('employee_id', array('class'=>'input-block-level input-block-level','label' => false, 'type' => 'select', 'options' => $user_info,'required'=>false));  
                                        }else{
                                            echo $this->Form->input('employee_id', array('class'=>'input-block-level input-block-level','label' => false, 'type' => 'text', 'required'=>false, $readonly));
                                        }
                                            
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">年分</label>
                                <div class="controls">               
                                    <?php echo $this->Form->input('yearly_amount', array('class' => 'input-block-level', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">支払金額</label>
                                <div class="controls">               
                                    <?php echo $this->Form->input('income_gross', array('class' => 'input-block-level', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">給与所得控除後</label>
                                <div class="controls">               
                                    <?php echo $this->Form->input('income_net', array('class' => 'input-block-level', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                        </div>
                            </div>
                        </fieldset>
                        <fieldset class="span6">
                            <div class="control-group">
                                <label for="typeahead" class="control-label">所得控除合計額</label>
                                <div class="controls">               
                                    <?php echo $this->Form->input('total_cut', array('class' => 'input-block-level', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                        </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">源泉徴収税額</label>
                                <div class="controls">               
                                    <?php echo $this->Form->input('total_tax', array('class' => 'input-block-level', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">備考</label>
                                <div class="controls">               
                                             <?php echo $this->Form->input('note', array('class' => 'input-block-level', 'label' => false, 'type' => 'area', 'cols'=>30, 'rows'=>5)); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center form-actions">  
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' '; 
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_annual'), array('class'=>'btn margin-left13') );
                        ?>     
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>