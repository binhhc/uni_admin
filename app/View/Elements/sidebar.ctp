<!-- Sidebar -->
<div class="sidebar">        
    <ul id="nav">
        <li>
            <?php
                $userInfo = '';
                if(strpos($this->request->url, 'UserInfos') !== false){
                    $userInfo = 'open';
                }
                echo $this->Html->link('<i class="fa  fa-user-md"></i> <span>社員情報</span>', array('controller' => 'UserInfos', 'action' => 'index'),array('escape' => false, 'class'=> $userInfo)); 
            ?>
        </li>
        <li>
            <?php
                $qualification = '';
                if(strpos($this->request->url, 'Qualifications') !== false){
                    $qualification = 'open';
                }
                echo $this->Html->link('<i class="fa fa-inbox"></i> <span>免許資格</span>', array('controller' => 'Qualifications', 'action' => 'index'),array('escape' => false, 'class'=>$qualification)); 
            ?>
        </li>
        <li>
            <?php
                $unitPrice = '';
                if(strpos($this->request->url, 'UnitPrices') !== false){
                    $unitPrice = 'open';
                }
                echo $this->Html->link('<i class="fa fa-pencil"></i> <span>給与情報</span>', array('controller' => 'UnitPrices', 'action' => 'index'), array('escape' => false, 'class'=>$unitPrice)); 
            ?>
        </li>
        <li>
            <?php
                $annual = '';
                if(strpos($this->request->url, 'AnnualIncomes') !== false){
                    $annual = 'open';
                }
                echo $this->Html->link('<i class="fa fa-money"></i> <span>年収情報</span>', array('controller' => 'AnnualIncomes', 'action' => 'index'),array('escape' => false, 'class'=>$annual)); 
            ?>
        </li>                
        <li>
            <?php
                $school = '';
                if(strpos($this->request->url, 'SchoolEducations') !== false){
                    $school = 'open';
                }
                echo $this->Html->link('<i class="fa fa-qrcode"></i> <span>学歴情報</span>', array('controller' => 'SchoolEducations', 'action' => 'index'),array('escape' => false, 'class'=>$school)); 
            ?>
        </li>                
        <li>
            <?php
                $work = '';
                if(strpos($this->request->url, 'WorkExperiences') !== false){
                    $work = 'open';
                }
                echo $this->Html->link('<i class="fa fa-adjust"></i> <span>職歴情報</span>', array('controller' => 'WorkExperiences', 'action' => 'index'),array('escape' => false, 'class'=>$work)); 
            ?>
        </li>
        <li>
            <?php
                $sysAuth = '';
                if(strpos($this->request->url, 'SystemAuths') !== false){
                    $sysAuth = 'open';
                }
                echo $this->Html->link('<i class="fa fa-lock"></i> <span>権限管理</span>', array('controller' => 'SystemAuths', 'action' => 'index'),array('escape' => false, 'class'=>$sysAuth)); 
            ?>
        </li> 
    </ul>
</div>
<!-- Sidebar ends -->