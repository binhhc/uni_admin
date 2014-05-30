<div class="mainbar">
     <div class="matter">
        <div class="container">
            <div class="widget">
                <div class="widget-content">
                    <table class="responsive table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
                        <thead>
                            <tr class="nowrap widget-head">
                                <th>マスター管理</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('部門管理', array( 'action' => 'msDepartment'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('雇用区分管理', array('action' => 'msEmploymentType'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('職種管理', array('action' => 'msJob'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('役職管理', array('action' => 'msPosition'), array('escape' => false)); ?>
                                </td>
                            </tr>
                            <tr class="nowrap">
                                <td><?php echo $this->Html->link('勤務地管理', array('action' => 'msWorkLocation'), array('escape' => false)); ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>