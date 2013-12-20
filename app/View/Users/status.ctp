<div class="main">
    <div class="container">
        <div class="widget stacked">
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span3">
                        <?php
                            echo $this->Element("sidemenu", array('controller' => $this->name)); 
                            if($batchStatus['running']){
                        ?>
                        <div class="stats">
                            <div class="stat">
                                        <p class="stat-time">
                                            <span class="stat-value" id="process-time"><?php echo $batchStatus['running_time']; ?></span>
                                            実行合計時間
                                        </p>
                            </div><!-- /substat -->
                        </div><!-- /substats -->
                        <?php } ?>
                    </div>
                    <div class="span9">
                        <?php if($batchStatus['running']): ?>
                            <div class="stats">
                                <div class="stat">
                                    <div class="debug-area" id="batch-status" style="height: 300px;">
                                        <div class="logs">
                                            <p class="<?php echo $batchStatus['type'] == 'ERROR' ? 'text-error' : 'text-success'; ?>"><?php echo $batchStatus['type']; ?></p>
                                            <p><?php echo $batchStatus['message']; ?></p>
                                            <p class="text-info"><?php echo $batchStatus['time']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /substats -->

                            <script type="text/javascript">
                            $(function(){
                                var time = $('#process-time');
                                var log  = $('#batch-status');
                                var last_time = '';

                                setInterval(updateStatus, 1000);
                                
                                function updateStatus(){
                                    $.getJSON('<?php echo Router::url('/Users/status'); ?>', function(json, textStatus) {
                                        if(!json || !json.running){
                                            window.location = window.location + '?done';
                                            window.location.reload();
                                        }
                                        var class_name = json.type == 'ERROR' ? 'text-error' : 'text-success';

                                        var log_message = $('<div class="logs" style="display:none;">'
                                            + '<p class="'+class_name+'">'+json.type+'</p>'
                                            + '<p>'+json.message+'</p>'
                                            + '<p class="text-info">'+json.time+'</p></div>');

                                        time.text(json.running_time || '--:--:--');

                                        if(last_time != json.time){
                                            var scrollY = log.get(0).scrollHeight || 0;
                                            var items = log.find('> *');

                                            items.addClass('muted').css('opacity', '0.4');
                                            log.append(log_message.fadeIn(200).show());
                                            log.animate({ scrollTop: scrollY }, 500);

                                            if(items.length >= 20){
                                                items.eq(0).remove();
                                            }
                                        }

                                        last_time = json.time;
                                    });
                                }
                            })
                            </script>
                        <?php else: ?>
                            <p class="stats">バッチを実行していません。</p>
                        <?php endif; ?>
                    </div>
               </div><!-- /rowfluid -->
            </div><!-- /widget-content -->
        </div><!-- /widget-stack -->
    </div><!-- /container -->
</div><!-- /main -->
