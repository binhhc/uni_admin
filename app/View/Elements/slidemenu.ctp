<div style="margin-left: 5px; margin-top: 5px">
	<ul class="list-group">
	   	<li class="list-group-item" style="background-color: #E6E6E6">アクション</li>    
	    <li class="list-group-item"><?php echo $this->Form->postLink('<i class="fa fa-play-circle-o"></i> バッチ実行', array('action' => 'runbatch'), array('escape' => false)) ?>
	    </li>
	    <li class="list-group-item"><?php echo $this->Form->postLink('<i class="fa fa-bug"></i> エラーログ', array('action' => 'logbatch'), array('escape' => false)) ?>
	    </li>    
	</ul>
</div>
