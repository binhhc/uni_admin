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
                                    <fieldset class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-lg-1">職場</label>
                                            <div class="col-lg-5">
                                                <?php echo h($this->data['UserInfo']['employee_name']); ?>
                                            </div>
                                            <label class="col-lg-2">Access type</label>
                                            <div class="col-lg-4">
                                                <?php echo $this->Form->input('access_type', array('class'=>'checkbox','label' => false, 'multiple' => 'checkbox', 'div'=>false)); ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text-center form-actions">
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
            </div>
        </div>
    </div>
</div>