<?php echo $this->Form->create('Batch'); ?>
<fieldset>
	<table>
		<tr>
			<td width="15%">Input patch contain csv</td>
			<td width="40%"><?php echo $this->Form->input('patch', array('type'=>'text', 'label'=>false)); ?></td>
			<td><?php echo $this->Form->submit('Run Batch', array('class'=>'btn btn-primary')); ?></td>
		</tr>
	</table>
</fieldset>
<?php echo $this->Form->end(); ?>
