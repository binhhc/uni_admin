<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">                
                    <div class="widget-head">
                      <div class="pull-left">年収精算</div>                  
                      <div class="clearfix"></div>
                    </div>

                <div class="widget-content">
                    <div class="padd">
                <?php echo $this->Form->create('AnnualIncome', array('class'=>'form-horizontal')) ?>                    
                        <fieldset class="col-md-6">
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hide')); ?>
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">社員番号</label>
                                <div class="col-lg-6">
                                    <?php
                                        if(empty($readonly)){
                                            echo $this->Form->input('employee_id', array('class'=>'form-control','label' => false, 'type' => 'select', 'options' => $user_info,'required'=>false));  
                                        }else{
                                            echo $this->Form->input('employee_id', array('class'=>'form-control','label' => false, 'type' => 'text', 'required'=>false, $readonly));
                                        }
                                            
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">年分</label>
                                <div class="col-lg-6">               
                                    <?php echo $this->Form->input('yearly_amount', array('class' => 'form-control', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">支払金額</label>
                                <div class="col-lg-6">               
                                    <?php echo $this->Form->input('income_gross', array('class' => 'form-control', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">給与所得控除後</label>
                                <div class="col-lg-6">               
                                    <?php echo $this->Form->input('income_net', array('class' => 'form-control', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                        </div>
                            </div>
                        </fieldset>
                        <fieldset class="span6">
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">所得控除合計額</label>
                                <div class="col-lg-6">               
                                    <?php echo $this->Form->input('total_cut', array('class' => 'form-control', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                        </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">源泉徴収税額</label>
                                <div class="col-lg-6">               
                                    <?php echo $this->Form->input('total_tax', array('class' => 'form-control', 'label' => false, 'type' => 'text', 'required'=>false)); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">備考</label>
                                <div class="col-lg-6">               
                                             <?php echo $this->Form->input('note', array('class' => 'form-control', 'label' => false, 'type' => 'area', 'cols'=>30, 'rows'=>5)); ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center form-actions">  
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' '; 
                            echo $this->Html->link('キャンセル', @$this->Session->read('save_latest_link_annual'), array('class'=>'btn btn-default') );
                        ?>     
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>