<div class="mainbar">
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget wgreen">                
                    <div class="widget-head">
                      <div class="pull-left"><h3><b>教育経歴</b></h3></div>                  
                      <div class="clearfix"></div>
                    </div>

                <div class="widget-content">
                    <div class="padd">
                <?php echo $this->Form->create('SchoolEducation', array('class'=>'form-horizontal')) ?>
                    <div align="center">                  
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
                                <label class="col-lg-6 col-lg-6 control-label">入卒年月</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('graduate_year', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">入卒区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('graduate_type_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">入卒区分</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('graduate_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">学歴区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('edu_type_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">学歴区分</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('edu_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">最終学歴コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('newest_edu_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">最終学歴</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('newest_edu', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">公私区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('school_type_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">公私区分</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('school_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">文理区分コード</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('diploma_type_cd', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">文理区分</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('diploma_type', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">学校名</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('school', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">学部名</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('faculty', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">学科名</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('subject', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-6 col-lg-6 control-label">専攻名</label>
                                <div class="col-lg-6">
                                    <?php echo $this->Form->input('major', array('class' => 'form-control', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>                          
                    </div>
                    <div class="form-actions">
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_school'), array('class'=>'btn btn-default') );
                        ?>       
                    </div>   
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>