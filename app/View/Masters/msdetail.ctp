<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller' => 'Masters', 'action'=>'add', $form_model), array('class'=>'btn btn-primary'));
                echo ' ';
                echo '<a class="btn btn-danger" onclick=deleteAll(".","' . $form_model . '")>削除</a>';
            ?>
            <div class="widget">
                <div class="widget-content">
                    <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head"><td colspan="3"><?php echo $title_for_layout;?></td></tr>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($msDetail)) {
                                echo '<th style="width:5px;"><input type = "checkbox" id="cb_all"/></th>';
                                }
                                echo ($form_model == 'MsDepartment')?'<th>所属コード':'';?>
                                <th>氏名</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($msDetail)) {
                            foreach ($msDetail as $ms): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $ms[$form_model]['id']; ?>' ></td>
                                <?php if ($form_model == 'MsDepartment'): ?>
                                <td><?php echo $this->Form->postLink(h($ms[$form_model][$fields_name . '_cd']), array('action' => 'edit'), array('escape' => false, 'data' => array('fields_name' => $fields_name,'master_model' => h($form_model), 'id' => h($ms[$form_model]['id'])))); ?> </td>
                                <td><?php echo h($ms[$form_model][$fields_name . '_name']); ?></td>
                                <?php else: ?>
                                <td><?php echo $this->Form->postLink(h($ms[$form_model][$fields_name . '_name']), array('action' => 'edit'), array('escape' => false, 'data' => array('fields_name' => $fields_name,'master_model' => h($form_model), 'id' => h($ms[$form_model]['id'])))); ?> </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "0" class="data-empty data-empty-scroll-table">データがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>

                    <div class="widget-foot"><center>
                    <?php echo $this->Html->link('戻る', array('controller' => 'Masters', 'action' => 'index'), array('class'=>'btn btn-default') ); ?>
                        </center>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>