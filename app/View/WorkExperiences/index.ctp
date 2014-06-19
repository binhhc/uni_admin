<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'WorkExperiences', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo '<a class="btn btn-danger" onclick=deleteAll("WorkExperiences")>削除</a>';
            ?>
            <div class="widget">
                <div class="widget-content">
                    <table id = "table-left" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($workExp)) { ?>
                                <th><input type='checkbox' id="cb_all"/></th>
                                <?php } ?>
                                <th>社員番号</th>
                                <th>氏名</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($workExp)) {
                            foreach ($workExp as $work): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $work['WorkExperience']['id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($work['WorkExperience']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($work['WorkExperience']['id'])))); ?> </td>
                                <td><?php echo h($work['UserInfo']['employee_name']); ?></td>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "2" class="data-empty data-empty-scroll-table">職歴情報のデーターがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>

                    <div id="wrap">
                        <table id="data" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <th>入社年月日</th>
                                    <th>退社年月日</th>
                                    <th>勤続年数</th>
                                    <th>会社名</th>
                                    <th>業種</th>
                                    <th>郵便番号</th>
                                    <th>会社住所</th>
                                    <th>国内外区分コード</th>
                                    <th>国内外区分</th>
                                    <th>役職</th>
                                    <th>退職の事由コード</th>
                                    <th>退職の事由</th>
                                    <th>退職理由</th>
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($workExp)) {
                                    foreach ($workExp as $work): ?>
                                        <tr>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['join_date']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['leave_date']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['work_year']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['company']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['bussiness_type']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['company_zip_code']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['company_address']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['abroad_type_cd']); ?></td>
                                            <td class="nowrap"><?php echo h($work['WorkExperience']['abroad_type']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['position']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['retire_reason_cd']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['retire_reason']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['retire_content']); ?></td>
                                            <td><?php echo h($work['WorkExperience']['note']); ?></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                } else {echo '<tr><td class="empty-row"></td></tr>';} ?>
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
    $(".empty-row").attr("colspan", $("#data").find(".widget-head").find("th").length);
</script>