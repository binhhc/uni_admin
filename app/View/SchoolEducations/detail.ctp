<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <?php echo $this->Form->create('SchoolEducation', array('class'=>'form-horizontal')) ?>
                    <h3>教育経歴</h3>
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
                                <label for="typeahead" class="control-label">入卒年月</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('graduate_year', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">入卒区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('graduate_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">入卒区分</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('graduate_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">学歴区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('edu_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">学歴区分</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('edu_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">最終学歴コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('newest_edu_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">最終学歴</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('newest_edu', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="span6">
                            <div class="control-group">
                                <label for="typeahead" class="control-label">公私区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('school_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">公私区分</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('school_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">文理区分コード</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('diploma_type_cd', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">文理区分</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('diploma_type', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">学校名</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('school', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">学部名</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('faculty', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">学科名</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('subject', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">専攻名</label>
                                <div class="controls">
                                    <?php echo $this->Form->input('major', array('class' => 'input-block-level', 'label' => false, 'type' => 'text')); ?>
                                </div>
                            </div>
                        </fieldset>                          
                    </div>
                    <div class="text-center form-actions">
                        <?php 
                            echo $this->Form->submit('登録', array('class'=>'btn btn-primary', 'div'=>false));
                            echo ' ';
                            echo $this->Html->link('キャンセル', $this->Session->read('save_latest_link_school'), array('class'=>'btn margin-left13') );
                        ?>       
                    </div>   
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>