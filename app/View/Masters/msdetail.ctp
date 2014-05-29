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
                            <tr class="nowrap widget-head"><td colspan="10"><?php echo $title_for_layout."マスター";?></td></tr>
                            <tr class="nowrap widget-head">
                                <?php
                                if (!empty($msDetail)) {
                                    echo '<th style="width:5px;"><input type = "checkbox" id="cb_all"/></th>';
                                } ?>
                                <th>コード</th>
                                <th><?php echo $title_for_layout."名"?></th>
                                <?php if ($form_model == 'MsDepartment'): ?>
                                    <th>Parent Department</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Email</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($msDetail)) {
                            foreach ($msDetail as $ms): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $ms[$form_model]['id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($ms[$form_model][$fields_name . '_cd']), array('action' => 'edit'), array('escape' => false, 'data' => array('fields_name' => $fields_name,'master_model' => h($form_model), 'id' => h($ms[$form_model]['id'])))); ?> </td>
                                <td><?php echo h($ms[$form_model][$fields_name . '_name']); ?></td>
                                <?php if ($form_model == 'MsDepartment'): ?>
                                    <td><?php echo h($ms[$form_model]['parent_department_id']); ?></td>
                                    <td><?php echo $ms[$form_model]['start_date']; ?></td>
                                    <td><?php echo $ms[$form_model]['end_date']; ?></td>
                                    <td><?php echo h($ms[$form_model]['email']); ?></td>
                                <?php endif ?>
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