<div class="mainbar">
     <div class="matter">
        <div class="container">
            <?php
                echo $this->Html->link('追加', array('controller'=>'Qualifications', 'action'=>'add'), array('class'=>'btn btn-primary'));
                echo ' ';
                echo '<a class="btn btn-danger" onclick=deleteAll("Qualifications")>削除</a>';
            ?>
            <div class="widget">
                <div class="widget-content">
                    <table id = "table-left" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($quanlity)) { ?>
                                <th><input type='checkbox' id="cb_all"/></th>
                                <?php } ?>
                                <th>社員番号</th>
                                <th>氏名</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($quanlity)) {
                            foreach ($quanlity as $quanlitify): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $quanlitify['Qualification']['id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($quanlitify['Qualification']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($quanlitify['Qualification']['id'])))); ?> </td>
                                <td class=""><?php echo h($quanlitify['UserInfo']['employee_name']); ?></td>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "2" class="data-empty data-empty-scroll-table">免許資格のデーターがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>
                    <div id="wrap">
                        <table id="data" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <th>免許資格区分コード</th>
                                    <th>免許資格区分</th>
                                    <th>発行団体</th>
                                    <th>資格名称</th>
                                    <th>取得年月日</th>
                                    <th>更新年月日</th>
                                    <th>有効期限</th>
                                    <th>認定番号</th>
                                    <th>資格添付ファイル</th>
                                    <th>資格手当</th>
                                    <th>備考</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($quanlity)) {
                                    foreach ($quanlity as $quanlitify): ?>
                                        <tr>
                                            <td class=""><?php echo h($quanlitify['Qualification']['license_type_cd']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['license_type']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['issuing_organization']); ?></td>
                                            <td class="nowrap"><?php echo h($quanlitify['Qualification']['license_name']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['acquire_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['update_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['expire_date']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['certification_number']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['attachment']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['allowance']); ?></td>
                                            <td class=""><?php echo h($quanlitify['Qualification']['note']); ?></td>
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