<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">                
                    <div class="widget-head">
                      <div class="pull-left">System Authencation</div>                  
                      <div class="clearfix"></div>
                    </div>

                <div class="widget-content">
                    <div class="padd">
                <?php echo $this->Form->create('SystemAuth', array('class'=>'form-horizontal')) ?>
                    <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>  
                    <div>  
                        <fieldset class="col-md-6">                                                   
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">System name</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('system_name', array('class'=>'form-control','label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">Access type</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('access_type', array('class'=>'checkbox','label' => false, 'multiple' => 'checkbox', 'div'=>false)); ?>
                                </div>
                            </div>                            
                        </fieldset>                    
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-actions">
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', @$this->Session->read('save_latest_link_systemAuth'), array('class'=>'btn btn-default') );
                        ?>       
                    </div>          
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>