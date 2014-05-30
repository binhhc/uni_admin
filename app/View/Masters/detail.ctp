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
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">コード</label>
                                        <div class="col-lg-6">
                                        <?php echo $this->Form->input($fields_name . '_cd', array('class'=>'form-control','label' => false, 'type' => 'text', 'required'=>false));?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">氏名</label>
                                        <div class="col-lg-6">
                                        <?php echo $this->Form->input($fields_name . '_name', array('class'=>'form-control', 'label' => false, 'type' => 'text', 'required'=>false));?>
                                        </div>
                                    </div>
                                    <?php if ($form_model == 'MsDepartment'): ?>
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">親部門</label>
                                        <div class="col-lg-6">
                                        <?php echo $this->Form->input('parent_department_id', array('class'=>'form-control', 'label' => false, 'type' => 'text', 'required'=>false));?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">開始日</label>
                                        <div class="col-lg-2">
                                            <?php echo $this->Form->input('start_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">終了日</label>
                                        <div class="col-lg-2">
                                            <?php echo $this->Form->input('end_date', array('class' => 'datepicker form-control', 'label' => false, 'type' => 'text')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">メール</label>
                                        <div class="col-lg-6">
                                        <?php echo $this->Form->input('email', array('class'=>'form-control', 'label' => false, 'type' => 'text', 'required'=>false));?>
                                        </div>
                                    </div>
                                    <?php endif ?>
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