<div class="well" style="padding: 8px 0;">
<ul class="nav nav-list">
    <li class="nav-header">アクション</li>
    <?php if($controller <> 'Users') { ?>
    <li class="divider"></li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus-square-o"></i> 追加', array('action' => 'add'), array('escape' => false)) ?></li>
    <li><?php echo $this->Html->link('<i class="fa fa-minus-square-o"></i> 削除',  '#',array('onclick' => "deleteAll('".Router::url('/'.$controller)."');", 'escape' => false)); ?></li>
    <?php } else {?>
    <li><?php echo $this->Form->postLink('<i class="fa fa-play-circle-o"></i> バッチ実行', array('action' => 'runbatch'), array('escape' => false)) ?></li>
    <?php } ?>
</ul>
</div>