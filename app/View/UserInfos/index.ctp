<div class="mainbar">
     <div class="matter">
        <div class="container">
            <table style="width:100%;">
                <tr>
                    <td><?php
                    echo $this->Html->link('追加', array('controller'=>'UserInfos', 'action'=>'add'), array('class'=>'btn btn-primary'));
                    echo ' ';
                    echo '<a class="btn btn-danger" onclick=deleteAll("UserInfos")>削除</a>';
                    ?>
                    </td>
                    <td class="td-search-form-table">
                    <?php echo $this->Form->create('UserInfo', array('controller'=>'UserInfos', 'action'=>'index', 'type' => 'get', 'class'=>'form-inline search-form'));?>
                        <table class="nowrap search-form-table">
                            <tr>
                                <td>雇用区分</td>
                                <td>
                                    <?php
                                    echo $this->Form->input('employment_type_cd', array('class'=>'input-block-level', 'label' => false, 'type' => 'select', 'options' => $employment_types, 'required'=>false, 'empty' => true, 'selected' => isset($filter['UserInfo.employment_type_cd'])?$filter['UserInfo.employment_type_cd']:''));
                                    ?>
                                </td>

                                <td>勤務地</td>
                                <td>
                                    <?php
                                    echo $this->Form->input('work_location_cd', array('class'=>'input-block-level', 'label' => false, 'type' => 'select', 'options' => $work_locations, 'required' => false, 'empty' => true, 'selected' => isset($filter['UserInfo.work_location_cd'])?$filter['UserInfo.work_location_cd']:''));?>
                                </td>

                                <td>所属</td>
                                <td>
                                    <?php
                                    echo $this->Form->input('department_cd', array('class'=>'input-block-level', 'label' => false, 'type' => 'select', 'options' => $departments, 'required' => false, 'empty' => true, 'selected' => isset($filter['UserInfo.department_cd'])?$filter['UserInfo.department_cd']:'')); ?>
                                </td>
                                <td>
                                    <?php
                                    echo $this->Form->button('絞り込み検索', array('type' => 'submit', 'class'=>'btn btn-xs btn-default', 'div'=>false));
                                    echo $this->Form->button('クリア', array('type' => 'button', 'class' => 'btn btn-xs btn-default', 'onclick' => "window.location.href = '" . Router::url(array('controller' => 'UserInfos', 'action' => 'index'), true) . "';"));
                                    ?>
                                </td>
                            </tr>
                        </table>
                    <?php echo $this->Form->end(); ?>
                    </td>
                </tr>
            </table>

            <div class="widget">
                <div class="widget-content">
                    <table id = "table-left" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <?php if (!empty($userInfo)) { ?>
                                <th><input type='checkbox' id="cb_all"/></th>
                                <?php } ?>
                                <th>社員番号</th>
                                <th>氏名</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($userInfo)) {
                            foreach ($userInfo as $info): ?>
                            <tr class="nowrap">
                                <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $info['UserInfo']['employee_id']; ?>' ></td>
                                <td><?php echo $this->Form->postLink(h($info['UserInfo']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($info['UserInfo']['id'])))); ?> </td>
                                <td><?php echo h($info['UserInfo']['employee_name']); ?></td>
                            </tr>
                        <?php endforeach;
                            } else {
                                echo '<tr>
                                        <td colspan = "2" class="data-empty data-empty-scroll-table">社員情報のデータがありません。</td>
                                    </tr>';
                            }?>
                        </tbody>
                    </table>
                    <div id="wrap">
                        <table id="data" class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap widget-head">
                                    <th>氏名（フリガナ）</th>
                                    <th>氏名（英字）</th>
                                    <th>職場氏名</th>
                                    <th>職場氏名(フリガナ)</th>
                                    <th>社用e-Mail</th>
                                    <th>入社年月日</th>
                                    <th>性別</th>
                                    <th>生年月日</th>
                                    <th>勤続年数</th>
                                    <th>年齢</th>
                                    <th>雇用区分</th>
                                    <th>郵便番号</th>
                                    <th>都道府県</th>
                                    <th>市区町村</th>
                                    <th>番地</th>
                                    <th>マンション／ビル等</th>
                                    <th>職種</th>
                                    <th>役職</th>
                                    <th>勤務地</th>
                                    <th>所属</th>
                                    <th>障害手帳区分コード</th>
                                    <th>障害手帳区分</th>
                                    <th>障害等級</th>
                                    <th>障害内容</th>
                                    <th>採用区分コード</th>
                                    <th>採用区分</th>
                                    <th>採用地コード</th>
                                    <th>採用地</th>
                                    <th>紹介区分コード</th>
                                    <th>紹介区分</th>
                                    <th>紹介者</th>
                                    <th>紹介者関係コード</th>
                                    <th>紹介者関係</th>
                                    <th>顔ナビ権限コード</th>
                                    <th>顔ナビ権限</th>
                                    <th>評価職種コード</th>
                                    <th>評価職種</th>
                                    <th>評価等級コード</th>
                                    <th>評価等級</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($userInfo)) {
                                    foreach ($userInfo as $info): ?>
                                    <tr class="nowrap">
                                        <td><?php echo h($info['UserInfo']['employee_name_furigana']); ?></td>
                                        <td><?php echo h($info['UserInfo']['employee_name_alphabet']); ?></td>
                                        <td><?php echo h($info['UserInfo']['work_place_name']); ?></td>
                                        <td><?php echo h($info['UserInfo']['work_place_name_furigana']); ?></td>
                                        <td><?php echo h($info['UserInfo']['office_email']); ?></td>
                                        <td><?php echo h($info['UserInfo']['company_join_date']); ?></td>
                                        <td><?php
                                        $gender = unserialize(GENDER_CODE);
                                        if (array_key_exists($info['UserInfo']['gender_code'], $gender)) {
                                            echo h($gender[$info['UserInfo']['gender_code']]);
                                        }?></td>
                                        <td><?php echo h($info['UserInfo']['birthday']); ?></td>
                                        <td><?php
                                            echo date_diff(date_create($info['UserInfo']['company_join_date']), date_create('today'))->y . '年 ' . date_diff(date_create($info['UserInfo']['company_join_date']), date_create('today'))->m . 'ヵ月';?></td>
                                        <td><?php
                                            echo date_diff(date_create($info['UserInfo']['birthday']), date_create('today'))->y . '歳 ' . date_diff(date_create($info['UserInfo']['birthday']), date_create('today'))->m . 'ヵ月';?></td>
                                        <td><?php echo h($info['MsEmploymentType']['employment_name']); ?></td>
                                        <td><?php echo h($info['UserInfo']['zip_code']); ?></td>
                                        <td><?php echo h($info['UserInfo']['prefecture']); ?></td>
                                        <td><?php echo h($info['UserInfo']['ward']); ?></td>
                                        <td><?php echo h($info['UserInfo']['address']); ?></td>
                                        <td><?php echo h($info['UserInfo']['building']); ?></td>
                                        <td><?php echo h($info['MsJob']['job_name']);?></td>
                                        <td><?php echo h($info['MsPosition']['position_name']);?></td>
                                        <td><?php echo h($info['MsWorkLocation']['work_location_name']);?></td>
                                        <td><?php echo h($info['MsDepartment']['department_name']); ?></td>
                                        <td><?php echo h($info['UserInfo']['problem_type_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['problem_type']); ?></td>
                                        <td><?php echo h($info['UserInfo']['problem_grade']); ?></td>
                                        <td><?php echo h($info['UserInfo']['problem_content']); ?></td>
                                        <td><?php echo h($info['UserInfo']['recruit_type_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['recruit_type']); ?></td>
                                        <td><?php echo h($info['UserInfo']['recruit_place_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['recruit_place']); ?></td>
                                        <td><?php echo h($info['UserInfo']['introduction_type_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['introduction_type']); ?></td>
                                        <td><?php echo h($info['UserInfo']['introduction_person']); ?></td>
                                        <td><?php echo h($info['UserInfo']['introduction_related_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['introduction_related']); ?></td>
                                        <td><?php echo h($info['UserInfo']['face_auth_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['face_auth']); ?></td>
                                        <td><?php echo h($info['UserInfo']['rating_job_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['rating_job']); ?></td>
                                        <td><?php echo h($info['UserInfo']['rating_grade_cd']); ?></td>
                                        <td><?php echo h($info['UserInfo']['rating_grade']); ?></td>
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
        jQuery(".td-search-form-table").css('width', jQuery(".search-form-table").width());
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