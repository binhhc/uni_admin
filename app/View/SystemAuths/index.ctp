<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php 
                echo $this->Html->link('追加', array('controller'=>'SystemAuths', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo $this->Html->link('削除', '', array('class'=>'btn btn-danger', 'onclick'=>'deleteAll("SystemAuths")')); 
            ?>
            <div class="widget">
                <div class="widget-content">
                        <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <?php if (!empty($systemAuth)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th width="85%">System name</th>
                                    <th>Access type</th>
                                </tr>
                            </thead>      
                            <tbody>
                                <?php if (empty($systemAuth)) { ?>
                                    <tr>
                                        <td colspan="2" class="data-empty">教育履歴のデーターがありません。</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($systemAuth as $system):
                                ?>
                                    <tr>
                                        <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $system['SystemAuth']['id']; ?>' ></td>                    
                                        <td><?php echo $this->Form->postLink(h($system['SystemAuth']['system_name']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($system['SystemAuth']['id'])))); ?> </td>
                                        <td class="center-table">
                                            <?php 
                                                if(!empty($system['SystemAuth']['access_type'])){
                                                    echo '<span class="label label-success">Active</span>';
                                                    //echo $this->Form->input('', array('type'=>'checkbox', 'checked'=>true, 'onclick'=>'return false;')); 
                                                }else{                                           
                                                    echo '<span class="label label-danger">Banned</span>';  
                                                    //echo $this->Form->input('', array('type'=>'checkbox', 'onclick'=>'return false;'));                                                
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                    endforeach;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if ($this->Paginator->numbers()): ?>
                        <div class="widget-foot">
                            <ul class="pagination">
                                <?php
                                if(empty($this->Paginator->options['url']['page']) or $this->Paginator->options['url']['page']<=1){
                                    echo '<li><span class="prev disabled">&lt;&lt;</span></li>';
                                }                               
                                echo '<li>' . $this->Paginator->first('<<', array(), null, array('class' => 'prev disabled')) . '</li>'; 
                                echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); 
                                echo '<li>' . $this->Paginator->last('>>', array(), null, array('class' => 'next disabled')) . '</li>'; 
                                
                                if(!empty($this->Paginator->options['url']['page']) and ($this->Paginator->options['url']['page']>=$this->Paginator->counter(array('format' => '%pages%')))){
                                    echo '<li><span class="next disabled">&gt;&gt;</span></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <?php endif; ?>  
                </div>
            </div>
        </div>
    </div>
</div>