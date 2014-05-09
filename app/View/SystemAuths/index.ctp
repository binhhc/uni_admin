<div class="mainbar">
     <div class="matter">
        <div class="container">
            <div class="widget">
                <div class="widget-content">
                        <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
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
                                        <td><?php echo h($system['SystemAuth']['employee_id']); ?> </td>
                                        <td><?php echo h($system['UserInfo']['employee_name']); ?></td>
                                        <td>
                                            <?php
                                            if (($system['SystemAuth']['access_type'])==SYSTEM_AUTH_ACTIVE) {
                                                echo $this->Form->postLink('Active', array('action'=>'updateAccess'), array('escape' => false, 'data' => array('id' => h($system['SystemAuth']['id'])), 'class'=>'btn btn-success'));
                                            } else {
                                                echo $this->Form->postLink('Banned', array('action'=>'updateAccess'), array('escape' => false, 'data' => array('id' => h($system['SystemAuth']['id'])), 'class'=>'btn btn-danger'));
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