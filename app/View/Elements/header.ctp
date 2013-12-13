<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <i class="brand fa fa-th fa-"> 一元管理</i>
        <ul class="pull-right">
            <li class="dropdown">
                <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-gears"></i>
                    <span class="identity"></span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">                           
                    <li>
                        <?php echo $this->Html->link('Run Batch', array('controller' => 'Users', 'action' => 'runbatch')); ?>
                    </li>
                    <hr>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'logout'), true); ?>">
                                            <i class="icon-off"></i>
                                            ログアウト</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav">
            <li class="<?php if(strpos($this->request->url, 'UserInfos') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('社員情報', array('controller' => 'UserInfos', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'Quanlifications') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('免許資格', array('controller' => 'Quanlifications', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'UnitPrices') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('給与精算', array('controller' => 'UnitPrices', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'AnnualIncomes') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('年収精算', array('controller' => 'AnnualIncomes', 'action' => 'index')); ?>
            </li>                
            <li class="<?php if(strpos($this->request->url, 'SchoolEducations') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('教育履歴', array('controller' => 'SchoolEducations', 'action' => 'index')); ?>
            </li>                
            <li class="<?php if(strpos($this->request->url, 'WorkExperiences') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('職種履歴', array('controller' => 'WorkExperiences', 'action' => 'index')); ?>
            </li>           
        </ul>
    </div>
</div>
<div style="padding-bottom: 50px;">

</div>