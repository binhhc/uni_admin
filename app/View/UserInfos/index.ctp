<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu", array('controller' => $this->name)); ?>
                    </div>
                    <div class="span10">
                        <table class="table table-bordered responsive" cellpadding="5" cellspacing="5">        
                            <thead>
                                <tr class="nowrap">
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <th >社員番号</th>
                                    <th>氏名</th>              
                                    <th>氏名（フリガナ）</th>
                                    <th>氏名（漢字）</th>
                                    <th>社用e-Mail</th>
                                    <th>入社年月日</th>
                                    <th>性別コード</th>
                                    <th>性別</th>
                                    <th>生年月日</th>
                                    <th>勤続年数</th>
                                    <th>年齢</th>
                                    <th>雇用区分コード</th>
                                    <th>雇用区分</th>
                                    <th>郵便番号</th>
                                    <th>都道府県</th>
                                    <th>市区町村</th>
                                    <th>番地</th>
                                    <th>マンション／ビル等</th>
                                    <th>職種コード</th>
                                    <th>職種</th>
                                    <th>役職コード</th>
                                    <th>役職</th>
                                    <th>勤務地コード</th>
                                    <th>勤務地</th>
                                    <th>所属コード</th>
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
                                <?php if (empty($userInfo)) { ?>
                                    <tr>
                                        <td colspan="46"><?php echo __("Empty data!"); ?></td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($userInfo as $info):
                                        ?>
                                        <tr class="nowrap">
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $info['UserInfo']['employee_id']; ?>' ></td>                    
                                            <td><?php echo $this->Form->postLink(h($info['UserInfo']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($info['UserInfo']['id'])))); ?> </td>
                                            <td class=""><?php echo h($info['UserInfo']['employee_name']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['employee_name_furigana']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['employee_name_alphabet']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['office_email']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['company_join_date']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['gender_code']); ?></td>
                                            <td class="nowrap"><?php echo h($info['UserInfo']['sex']); ?></td>
                                            <td class="nowrap"><?php echo h($info['UserInfo']['birthday']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['work_year']); ?></td>
                                            <td class="nowrap"><?php echo h($info['UserInfo']['age']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['employment_type_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['employment_type']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['zip_code']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['prefecture']); ?></td>
                                            <td class="nowrap"><?php echo h($info['UserInfo']['ward']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['address']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['building']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['job_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['job']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['position_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['position']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['work_location_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['work_location']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['department_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['department']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['problem_type_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['problem_type']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['problem_grade']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['problem_content']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['recruit_type_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['recruit_type']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['recruit_place_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['recruit_place']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['introduction_type_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['introduction_type']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['introduction_person']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['introduction_related_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['introduction_related']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['face_auth_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['face_auth']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['rating_job_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['rating_job']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['rating_grade_cd']); ?></td>
                                            <td class=""><?php echo h($info['UserInfo']['rating_grade']); ?></td>                       
                                        </tr>

                                        <?php
                                    endforeach;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php if ($this->Paginator->numbers()): ?>
                            <div class="pagination">
                                <ul>
                                    <?php echo '<li>' . $this->Paginator->prev(__('<<'), array(), null, array('class' => 'prev disabled')) . '</li>'; ?>
                                    <?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
                                    <?php echo '<li>' . $this->Paginator->next(__('>>'), array(), null, array('class' => 'next disabled')) . '</li>'; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var pinned_columns = 3;
		<?php if (empty($userInfo)) echo "pinned_columns = -1;";?>
        var updateTables = function() {
            var tables = $("table.responsive");
            splitTable(tables, pinned_columns);
        };

        function splitTable(original, pinned_columns) {
            if (!pinned_columns) pinned_columns = 1;

            original.css('width', original.width());
            original.wrap("<div class='table-wrapper' />");

            var copy = original.clone().appendTo(original.closest(".table-wrapper"));
            copy.removeClass("responsive");

            copy.wrap("<div class='scrollable' />");
            original.wrap("<div class='pinned' />");

            original.find('form').each(function(i,e){
                var form = $(e);
                form.data('id', form.attr('name'));
                form.removeAttr('name');
            })

            var wrapper = original.closest('.table-wrapper'),
                scrollable = wrapper.find('.scrollable'),
                pinned = wrapper.find('.pinned'),
                pinned_width = 0;

            copy.find('th:visible:lt(' + pinned_columns + ')').each(function(i, e) {
                pinned_width += $(e).outerWidth();
            });

            wrapper.css({
                'position': 'relative',
                'display': 'block',
                'clear': 'both',
                'overflow': 'hidden'
            });

            scrollable.css({
                'overflow': 'auto'
            });

            pinned.css({
                'position': 'absolute',
                'display': 'block',
                'top': 0,
                'width': pinned_width,
                'overflow': 'hidden',
                'background': '#fff'
            });
        }

        function unsplitTable(original) {
            original.closest(".table-wrapper").find(".scrollable").remove();
            original.unwrap();
            original.unwrap();
            original.css('width', null);

            original.find('form').each(function(i,e){
                var form = $(e);
                form.attr('name', form.data('id'));
            })
        }

        $(window).load(updateTables);
        $(window).bind('resize', function() {
            var tables = $("table.responsive");
            unsplitTable(tables);
            splitTable(tables, pinned_columns);
        });        
    });
</script>