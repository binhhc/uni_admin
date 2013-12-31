<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo Router::url('/', true).'UserInfos'?>"><i class="fa fa-th"> 一元管理</i></a>
            <ul class="pull-right" style="list-style:none">
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="fa fa-gears"></i>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">                           
                            <li>
                                <?php echo $this->Html->link('<i class="fa fa-code"></i> バッチ実行', array('controller' => 'Users', 'action' => 'status'),array('escape' => false)); ?>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'logout'), true); ?>">
                                    <i class="fa fa-chain-broken"></i> ログアウト
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <div class="subnav-collapse">
                    <ul class="mainnav">
                        <li class="<?php if(strpos($this->request->url, 'UserInfos') !== false){ echo 'active';} ?>">
                            <?php echo $this->Html->link('<i class="fa fa-male"></i> <span>社員情報</span>', array('controller' => 'UserInfos', 'action' => 'index'),array('escape' => false)); ?>
                        </li>
                        <li class="<?php if(strpos($this->request->url, 'Qualifications') !== false){ echo 'active';} ?>">
                            <?php echo $this->Html->link('<i class="fa fa-certificate"></i> <span>免許資格</span>', array('controller' => 'Qualifications', 'action' => 'index'),array('escape' => false)); ?>
                        </li>
                        <li class="<?php if(strpos($this->request->url, 'UnitPrices') !== false){ echo 'active';} ?>">
                            <?php echo $this->Html->link('<i class="fa fa-jpy"></i> <span>給与精算</span>', array('controller' => 'UnitPrices', 'action' => 'index'), array('escape' => false)); ?>
                        </li>
                        <li class="<?php if(strpos($this->request->url, 'AnnualIncomes') !== false){ echo 'active';} ?>">
                            <?php echo $this->Html->link('<i class="fa fa-signal"></i> <span>年収精算</span>', array('controller' => 'AnnualIncomes', 'action' => 'index'),array('escape' => false)); ?>
                        </li>                
                        <li class="<?php if(strpos($this->request->url, 'SchoolEducations') !== false){ echo 'active';} ?>">
                            <?php echo $this->Html->link('<i class="fa fa-book"></i> <span>教育履歴</span>', array('controller' => 'SchoolEducations', 'action' => 'index'),array('escape' => false)); ?>
                        </li>                
                        <li class="<?php if(strpos($this->request->url, 'WorkExperiences') !== false){ echo 'active';} ?>">
                            <?php echo $this->Html->link('<i class="fa fa-quote-left"></i> <span>職種履歴</span>', array('controller' => 'WorkExperiences', 'action' => 'index'),array('escape' => false)); ?>
                        </li>           
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</div>