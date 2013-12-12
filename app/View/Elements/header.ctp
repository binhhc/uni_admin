<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <a class="brand" href="<?php echo Router::url('/', true); ?>">UNI ADMIN</a>
        <ul class="pull-right">
            <li class="dropdown">
                <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="icon-user icon-white"></i>
                    <span class="identity"><?php echo h($this->Access->user('last_name')) . ' ' . h($this->Access->user('first_name')); ?></span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">                           
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
                <?php echo $this->Html->link('UserInfos', array('controller' => 'UserInfos', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'Quanlifications') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('Qualifications', array('controller' => 'Quanlifications', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'UnitPrices') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('UnitPrices', array('controller' => 'UnitPrices', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'AnnualIncomes') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('AnnualIncomes', array('controller' => 'AnnualIncomes', 'action' => 'index')); ?>
            </li>                
            <li class="<?php if(strpos($this->request->url, 'SchoolEducations') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('SchoolEducations', array('controller' => 'SchoolEducations', 'action' => 'index')); ?>
            </li>                
            <li class="<?php if(strpos($this->request->url, 'WorkExperiences') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('WorkExperiences', array('controller' => 'WorkExperiences', 'action' => 'index')); ?>
            </li>
            <li class="<?php if(strpos($this->request->url, 'Users') !== false){ echo 'active';} ?>">
                <?php echo $this->Html->link('Run Batch', array('controller' => 'Users', 'action' => 'runbatch')); ?>
            </li>
            <li>
                <?php echo $this->Html->link('Logout', array('controller' => 'Users', 'action' => 'logout')); ?>
            </li>
        </ul>
    </div>
</div>