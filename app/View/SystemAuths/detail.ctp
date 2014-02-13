<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('SystemAuth', array('class'=>'form-horizontal')) ?>
                    <h3>System Authencation</h3>
                    <hr style="margin-top:0"/>
                    <div class="row-fluid">
                        <fieldset class="span6">
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>                            
                            <div class="control-group">
                                <label class="control-label">System name</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('system_name', array('class'=>'input-block-level','label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Access type</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('access_type', array('class'=>'checkbox','label' => false, 'multiple' => 'checkbox')); ?>
                                </div>
                            </div>                            
                        </fieldset>
                    </div>

                    <div class="text-center form-actions">
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_systemAuth'), array('class'=>'btn margin-left13') );
                        ?>       
                    </div>          
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>