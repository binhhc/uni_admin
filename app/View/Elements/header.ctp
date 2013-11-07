<div style="text-align: center; height: 60px;  background-color: green; vertical-align: bottom">
    <?php 
    echo $this->Html->link('AnnualIncomes', array('controller' => 'AnnualIncomes', 'action' => 'index')); 
    echo ' | ';
    echo $this->Html->link('Quanlifications', array('controller' => 'Quanlifications', 'action' => 'index'));
    echo ' | ';
    echo $this->Html->link('SchoolEducations', array('controller' => 'SchoolEducations', 'action' => 'index'));
    echo ' | ';
    echo $this->Html->link('UnitPrices', array('controller' => 'UnitPrices', 'action' => 'index'));
    echo ' | ';
    echo $this->Html->link('UserInfos', array('controller' => 'UserInfos', 'action' => 'index'));
    echo ' | ';
    echo $this->Html->link('WorkExperiences', array('controller' => 'WorkExperiences', 'action' => 'index'));
    ?>
    
</div>