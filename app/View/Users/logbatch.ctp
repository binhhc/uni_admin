<div class="mainbar">
     <div class="matter">
        <div class="container"> 
            <div class="widget">
                <div class="widget-content">
                               
                    <div class="span9">
                         <div class="stats">
                                <div class="stat">
                                    <div class="debug-area" id="batch-status" style="height: 300px;">
                                        <div class="logs">
                                            <?php echo $logs;?>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div><!-- /substats -->
                            <div align="right"> <?php echo $this->Form->postLink('<i class="fa fa-eraser"></i> ログ掃除', array('action' => 'logbatch/clear'), array('escape' => false)) ?></div>
                       <div>
               </div><!-- /rowfluid -->
            </div><!-- /widget-content -->
        </div><!-- /widget-stack -->
    </div><!-- /container -->
</div><!-- /main -->
