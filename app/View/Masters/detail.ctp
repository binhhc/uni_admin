<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">
                        <div class="widget-head">
                            <div class="pull-left"><h3><b><?php echo $title_for_layout;?></b></h3></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <?php echo $this->Form->create($form_model, array('class'=>'form-horizontal')) ?>
                            <div class="padd">
                                <fieldset>
                                    <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                                    <?php if ($form_model == 'MsDepartment'): ?>
                                        <div class="form-group">
                                            <label class="col-lg-6 control-label">所属コード</label>
                                            <div class="col-lg-6">
                                            <?php echo $this->Form->input($fields_name . '_cd', array('class'=>'form-control','label' => false, 'type' => 'text', 'required'=>false));?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">氏名</label>
                                        <div class="col-lg-6">
                                        <?php echo $this->Form->input($fields_name . '_name', array('class'=>'form-control', 'label' => false, 'type' => 'text', 'required'=>false));?>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <?php
                                        echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                                        echo ' ';
                                        echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_master'), array('class'=>'btn btn-default') );
                                    ?>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>