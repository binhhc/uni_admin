<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'AnnualIncomes', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo '<a class="btn btn-danger" onclick=deleteAll("AnnualIncomes")>削除</a>';
            ?>
            <div class="widget">
                <div class="widget-content">
                    <table id = "table-left" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($annualIncome)) { ?>
                                <th><input type='checkbox' id="cb_all"/></th>
                                <?php } ?>
                                <th>社員番号</th>
                                <th>氏名</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($annualIncome)) {
                            foreach ($annualIncome as $annual): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $annual['AnnualIncome']['id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($annual['AnnualIncome']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($annual['AnnualIncome']['id'])))); ?> </td>
                                <td class="nowrap"><?php echo h($annual['UserInfo']['employee_name']); ?></td>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "0" class="data-empty data-empty-scroll-table">年収情報のデーターがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>
                    <div id="wrap">
                        <table id="data" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <th>年分</th>
                                    <th>支払金額</th>
                                    <th>給与所得控除後</th>
                                    <th>所得控除合計額</th>
                                    <th>源泉徴収税額</th>
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($annualIncome)) {
                                    foreach ($annualIncome as $annual): ?>
                                        <tr>
                                            <td><?php echo h($annual['AnnualIncome']['yearly_amount']); ?></td>
                                            <td><?php echo h($annual['AnnualIncome']['income_gross']); ?></td>
                                            <td><?php echo h($annual['AnnualIncome']['income_net']); ?></td>
                                            <td><?php echo h($annual['AnnualIncome']['total_cut']); ?></td>
                                            <td><?php echo h($annual['AnnualIncome']['total_tax']); ?></td>
                                            <td><?php echo h($annual['AnnualIncome']['note']); ?></td>
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