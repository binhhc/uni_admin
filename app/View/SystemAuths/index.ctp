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
                                    <th class="check_box_all"><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th>社員番号</th>
                                    <th>職場</th>
                                    <th>Access type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($systemAuth)) { ?>
                                    <tr>
                                        <td colspan="4" class="data-empty">SystemAuthのデーターがありません。</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($systemAuth as $system):
                                ?>
                                    <tr>
                                        <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $system['SystemAuth']['id']; ?>' ></td>
                                        <td><?php echo $this->Form->postLink(h($system['SystemAuth']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($system['SystemAuth']['id'])))); ?> </td>
                                        <td><?php echo h($system['UserInfo']['employee_name']); ?></td>
                                        <td class="center-table">
                                            <?php
                                                echo (($system['SystemAuth']['access_type'])==SYSTEM_AUTH_ACTIVE)?'<span class="label label-success">Active</span>':'<span class="label label-danger">Banned</span>';
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