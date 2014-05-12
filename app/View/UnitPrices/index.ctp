<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'UnitPrices', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo $this->Html->link('削除', '', array('class'=>'btn btn-danger', 'onclick'=>'deleteAll("UnitPrices")'));
            ?>
            <div class="widget">
                <div class="widget-content">
                    <table id = "table-left" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($unitPrice)) { ?>
                                <th><input type='checkbox' id="cb_all"/></th>
                                <?php } ?>
                                <th>社員番号</th>
                                <th>職場</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($unitPrice)) {
                            foreach ($unitPrice as $price): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $price['UnitPrice']['id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($price['UnitPrice']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($price['UnitPrice']['id'])))); ?> </td>
                                <td><?php echo h($price['UserInfo']['employee_name']); ?></td>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "0" class="data-empty data-empty-scroll-table">給与情報のデーターがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>
                    <div id="wrap">
                        <table id="data" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <th>改定年月日</th>
                                    <th>給与区分コード</th>
                                    <th>給与区分</th>
                                    <th>報酬額</th>
                                    <th>調整給</th>
                                    <th>扶養手当</th>
                                    <th>リーダー手当て</th>
                                    <th>食事手当て</th>
                                    <th>ご近所手当</th>
                                    <th>欠勤控除減額</th>
                                    <th>遅早控除減額</th>
                                    <th>普通残業</th>
                                    <th>深夜残業</th>
                                    <th>休出残業</th>
                                    <th>残業予備１</th>
                                    <th>残業予備２</th>
                                    <th>残業予備３</th>
                                    <th>残業予備４</th>
                                    <th>残業予備５</th>
                                    <th>基本賞与</th>
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($unitPrice)) {
                                    foreach ($unitPrice as $price): ?>
                                        <tr class="nowrap">
                                            <td><?php echo h($price['UnitPrice']['revise_date']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['salary_type_cd']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['salary_type']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['bonus']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['adjust_salary']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['support_allowance']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['leader_allowance']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['meal_allowance']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['address_allowance']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['absent_salary_cut']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['late_salary_cut']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_normal']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_night']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_holiday']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_1']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_2']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_3']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_4']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['overtime_5']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['basic_bonus']); ?></td>
                                            <td><?php echo h($price['UnitPrice']['note']); ?></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                } else {echo '<tr><td colspan="0"></td></tr>';} ?>
                            </tbody>
                        </table>
                    </div>
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

<script type="text/javascript">
    $( window ).on('resize', function() {
        var rows = document.getElementById('data').getElementsByTagName('tr')
        var rowsHeight=[];
        var rowsleft = document.getElementById('table-left').getElementsByTagName('tr')
        var rowsHeightLeft=[];
        var heightResult = [];
        for(var i=0;i<rows.length;i++){
            rowsHeight[i]=rows[i].offsetHeight;
        }
        for(var j=0;j<rowsleft.length;j++){
            rowsHeightLeft[j]=rowsleft[j].offsetHeight;
        }
        for(var x=0;x<rowsHeight.length;x++){
            heightResult[x] = Math.max(rowsHeight[x], rowsHeightLeft[x]);
            jQuery("#table-left tr:eq("+ x +")").css('height', heightResult[x]);
            jQuery("#data tr:eq("+ x +")").css('height', heightResult[x]);
        }
    }).trigger('resize');
</script>