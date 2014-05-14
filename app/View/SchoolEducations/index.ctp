<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'SchoolEducations', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo '<a class="btn btn-danger" onclick=deleteAll("SchoolEducations")>削除</a>';
            ?>
            <div class="widget">
                <div class="widget-content">
                    <table id = "table-left" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($schoolEdu)) { ?>
                                <th><input type='checkbox' id="cb_all"/></th>
                                <?php } ?>
                                <th>社員番号</th>
                                <th>職場</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($schoolEdu)) {
                            foreach ($schoolEdu as $school): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $school['SchoolEducation']['id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($school['SchoolEducation']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($school['SchoolEducation']['id'])))); ?> </td>
                                <td><?php echo h($school['UserInfo']['employee_name']); ?></td>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "0" class="data-empty data-empty-scroll-table">学歴情報のデーターがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>
                    <div id="wrap">
                        <table id="data" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <th>入卒年月</th>
                                    <th>入卒区分コード</th>
                                    <th>入卒区分</th>
                                    <th>学歴区分コード</th>
                                    <th>学歴区分</th>
                                    <th>最終学歴コード</th>
                                    <th>最終学歴</th>
                                    <th>公私区分コード</th>
                                    <th>公私区分</th>
                                    <th>文理区分コード</th>
                                    <th>文理区分</th>
                                    <th>学校名</th>
                                    <th>学部名</th>
                                    <th>学科名</th>
                                    <th>専攻名</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($schoolEdu)) {
                                    foreach ($schoolEdu as $school): ?>
                                        <tr class="nowrap">
                                            <td><?php echo h($school['SchoolEducation']['graduate_year']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['graduate_type_cd']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['graduate_type']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['edu_type_cd']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['edu_type']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['newest_edu_cd']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['newest_edu']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['school_type_cd']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['school_type']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['diploma_type_cd']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['diploma_type']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['school']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['faculty']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['subject']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['major']); ?></td>
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