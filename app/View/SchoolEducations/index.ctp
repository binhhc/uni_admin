<div class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="widget stacked">
                <div class="widget-content">
                    <div class="span2">
                        <?php echo $this->Element("sidemenu", array('controller' => $this->name)); ?>
                    </div>
                    <div class="span10">
                        <table class="responsive table table-bordered" cellpadding="5" cellspacing="5">
                            <thead>
                                <tr class="nowrap">
                                    <?php if (!empty($schoolEdu)) { ?>
                                    <th><input type='checkbox' id="cb_all"/></th>
                                    <?php } ?>
                                    <th>社員番号</th>
                                    <th>氏名</th>
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
                                <?php if (empty($schoolEdu)) { ?>
                                    <tr>
                                        <td colspan="17" class="data-empty">教育履歴のデーターがありません。</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($schoolEdu as $school):
                                        ?>
                                        <tr>
                                            <td><input name="cbID" class="cb_item" type='checkbox' value='<?php echo $school['SchoolEducation']['id']; ?>' ></td>                    
                                            <td><?php echo $this->Form->postLink(h($school['SchoolEducation']['employee_id']), array('action' => 'edit'), array('escape' => false, 'data' => array('id' => h($school['SchoolEducation']['id'])))); ?> </td>
                                            <td><?php echo h($school['UserInfo']['employee_name']); ?></td>
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
                                            <td class="nowrap"><?php echo h($school['SchoolEducation']['school']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['faculty']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['subject']); ?></td>
                                            <td><?php echo h($school['SchoolEducation']['major']); ?></td>                             
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
</div>

<script type="text/javascript">
    $(function() {
        var pinned_columns = 3;
		<?php if (empty($schoolEdu)) echo "pinned_columns = -1;";?>
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