<div class="pull-right"  style="margin-bottom:5px;">
    <?php echo $this->Html->link('Add', array('controller' => 'UserInfos', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>
<div style="clear:both;"></div>
    <table class="table table-bordered responsive" cellpadding="5" cellspacing="5">        
        <thead>
            <tr class="nowrap">
                <th >Employee ID</th>
                <th>Employee name</th>              
                <th>Name Furigana</th>
                <th>Name Alphabet</th>
                <th>Office email</th>
                <th>Company join date</th>
                <th>Gender code</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Work year</th>
                <th>Age</th>
                <th>Employment type code</th>
                <th>Employment type</th>
                <th>Zip code</th>
                <th>Prefecture</th>
                <th>Ward</th>
                <th>Address</th>
                <th>Building</th>
                <th>Job code</th>
                <th>Job</th>
                <th>Position code</th>
                <th>Position</th>
                <th>Work location code</th>
                <th>Work location</th>
                <th>Department code</th>
                <th>Department</th>
                <th>Problem type code</th>
                <th>Problem type</th>
                <th>Problem grade</th>
                <th>Problem content</th>
                <th>Recruit type code</th>
                <th>Recruit type</th>
                <th>Recruit place code</th>
                <th>Recruit place</th>
                <th>Introduction type code</th>
                <th>Introduction type</th>
                <th>Introduction person</th>
                <th>Introduction related code</th>
                <th>Introduction related</th>
                <th>Face auth code</th>
                <th>Face auth</th>
                <th>Rating job code</th>
                <th>Rating job</th>
                <th>Rating grade code</th>
                <th>Rating grade</th>                    
                <th>Action</th>
            </tr>
        </thead>      
        <tbody>
            <?php if (empty($userInfo)) { ?>
                <tr>
                    <th colspan="7"><?php echo __("Empty data!"); ?></th>
                </tr>
                <?php
            } else {
                foreach ($userInfo as $info):
                    ?>
                    <tr class="nowrap">
                        <td class="text-center"><?php echo $info['UserInfo']['employee_id']; ?></td>
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
                        <td class="center nowrap">
                            <?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $info['UserInfo']['id']))); ?>
                            <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $info['UserInfo']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($info['UserInfo']['employee_id']))); ?>
                        </td>
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

<script type="text/javascript">
    $(function() {
        var pinned_columns = 1;

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
            copy.wrap("<div class='pinned' />");

            copy.find('form').remove();

            original.wrap("<div class='scrollable' />");

            var scrollable = original.closest('.scrollable'),
                pinned = copy.closest('.pinned'),
                wrapper = original.closest('.table-wrapper'),
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
            original.closest(".table-wrapper").find(".pinned").remove();
            original.unwrap();
            original.unwrap();
            original.css('width', null);
        }

        $(window).load(updateTables);
        $(window).bind('resize', function() {
            var tables = $("table.responsive");
            unsplitTable(tables);
            splitTable(tables, pinned_columns);
        });
    });
</script>