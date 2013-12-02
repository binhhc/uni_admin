<?php echo $this->Form->create('Batch'); ?>
<fieldset>
	<table>
		<tr>
			<td width="15%">Input patch contain csv</td>
			<td>
				<?php echo $this->Form->input('patch', array('type'=>'text', 'label'=>false, 'div'=>false)); ?>
			</td width="40%";>
			<td >
				<?php echo $this->Form->submit('Run Batch', array('class'=>'btn btn-primary', 'div'=>false, 'style'=>"margin-left: 15px;")); ?>
			</td>
		</tr>
	</table>
</fieldset>
<?php echo $this->Form->end(); ?>
