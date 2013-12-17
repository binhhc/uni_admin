<div class="well" style="padding: 8px 0;">
<ul class="nav nav-list">
    <li class="nav-header">アクション</li>
    <li class="divider"></li>
    <li><?php echo $this->Html->link('<i class="fa fa-plus-square-o"></i> 追加', array('action' => 'add'), array('escape' => false)) ?></li>
    <li><?php echo $this->Html->link('<i class="fa fa-minus-square-o"></i> 削除', array('action' => 'delete'), array('escape' => false)) ?></li>
</ul>
</div>