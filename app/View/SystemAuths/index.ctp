<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu", array('controller' => $this->name)); ?>
                    </div>
                    <div class="span10">
                        <table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap">
                                    <?php if (!empty($systemAuth)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th width="85%">System name</th>
                                    <th class="center">Access type</th>
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
                                        <td>
                                            <?php 
                                                if(!empty($system['SystemAuth']['access_type']))
                                                    echo $this->Form->input('', array('type'=>'checkbox', 'checked'=>true)); 
                                                else
                                                    echo $this->Form->input('', array('type'=>'checkbox'));                                                
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
                            <div class="pagination">
                                 <ul>
									<?php
									if(empty($this->Paginator->options['url']['page']) or $this->Paginator->options['url']['page']<=1){
										echo '<li><span class="prev disabled">&lt;&lt;</span></li>';
									}
									?>
                                    <?php echo '<li>' . $this->Paginator->first('<<', array(), null, array('class' => 'prev disabled')) . '</li>'; ?>
                                    <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
                                    <?php echo '<li>' . $this->Paginator->last('>>', array(), null, array('class' => 'next disabled')) . '</li>'; ?>
									<?php
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
</div>