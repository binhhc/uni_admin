<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">  
    <div class="conjtainer">
        <!-- Menu button for smallar screens -->
        <div class="navbar-header">
            <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span>Menu</span>
            </button>
            <!-- Site name for smallar screens -->
            <a href="#" class="navbar-brand hidden-lg"> 一元管理</a>
        </div>
      
        <!-- Navigation starts -->
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">           
            <li class="dropdown dropdown-big">
                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cloud-upload"></i>UNI ADMIN</a> -->
            </li>
        </ul>
       
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
        <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-user"> <?php echo $this->Session->read('email_user');?> </i> <b class="caret"></b>
            </a>            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
                <li>
                    <?php echo $this->Html->link('<i class="fa fa-play-circle"></i> バッチ実行', array('controller' => 'Users', 'action' => 'status'),array('escape' => false)); ?>
                </li>
                <li class="divider"></li>
                <li>
                    <?php echo $this->Html->link('<i class="fa fa-external-link"></i> ログアウト', array('controller' => 'Users', 'action' => 'logout'),array('escape' => false)); ?>                    
                </li>
            </ul>
          </li>          
        </ul>
      </nav>
    </div>
</div>
<!-- Header starts -->
<header>
    <div class="container">
        <div class="row">
            <!-- Logo section -->
            <div class="col-md-4">
                <!-- Logo. -->
                <div class="logo">                    
                    <h1>
                        <?php echo $this->Html->link('<i class="fa fa-th"></i> 一元管理', array(
                    'controller'=>'UserInfos', 'action'=>'index'),array('escape' => false)) ?>
                    </h1>   
                </div>
                <!-- Logo ends -->
            </div>

            <!-- Data section -->
            <div class="col-md-4">                
            </div>           

            <!-- Data section -->
            <div class="col-md-4">
                <div class="header-data">
                    <!-- Traffic data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i class="fa fa-bell bgreen"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><?php echo $this->Session->read('users');?><em>users</em></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!-- Members data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with blue background -->
                            <i class="fa fa-cog bblue"></i> 
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><?php echo $this->Session->read('systems');?><em>Systems</em></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              </div>
            </div>
        </div>
    </div>
</header>

