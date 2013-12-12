<?php echo $this->Form->create('Batch'); ?>
<fieldset>
	<?php echo $this->Form->submit('Run Batch', array('class'=>'btn btn-primary', 'div'=>false, 'style'=>"margin-left: 15px;")); ?>			
</fieldset>
<?php echo $this->Form->end(); ?>
