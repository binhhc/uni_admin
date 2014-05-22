<div class="mainbar">
     <div class="matter">
        <div class="container">
            <div class="widget">
                <div class="widget-content">
                    <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <th>マスターテーブル</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('マスター所属', array( 'action' => 'msDepartment'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('マスター雇用区分', array('action' => 'msEmploymentType'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('マスター職種', array('action' => 'msJob'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('マスター役職', array('action' => 'msPosition'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('マスター勤務地', array('action' => 'msWorkLocation'), array('escape' => false)); ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>