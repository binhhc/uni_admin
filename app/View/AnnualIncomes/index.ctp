<div class="pull-right">
	<?php echo $this->Html->link('Add', array('controller' => 'AnnualIncomes', 'action' => 'add'), array('class'=>'btn btn-primary')) ?>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="nowrap center" width="8%">Employee ID</th>
			<th>Yearly amount</th>
			<th>Income gross</th>
			<th>Income net</th>
			<th >Total cut</th>
			<th >Total tax</th>
			<th class="nowrap center" width="12%">Action</th>
		</tr>
	</thead>      
	<tbody>
		<?php if (empty($annualIncome)) { ?>
			<tr>
				<td colspan="7"><?php echo __("Empty data!"); ?></td>
			</tr>
			<?php
		} else {
			foreach ($annualIncome as $annual):
				?>
				<tr>                             
					<td class="text-center"><?php echo $annual['AnnualIncome']['employee_id']; ?></td>
					<td class=""><?php echo h($annual['AnnualIncome']['yearly_amount']); ?></td>
					<td class=""><?php echo h($annual['AnnualIncome']['income_gross']); ?></td>
					<td class=""><?php echo h($annual['AnnualIncome']['income_net']); ?></td>
					<td class=""><?php echo h($annual['AnnualIncome']['total_cut']); ?></td> 
					<td class=""><?php echo h($annual['AnnualIncome']['total_tax']); ?></td>
					<td class="text-center">
						<?php echo $this->Form->postLink('Edit', array('action' => 'edit'), array('escape' => false, 'class' => 'btn btn-info', 'data' => array('id' => $annual['AnnualIncome']['id']))); ?>
						<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $annual['AnnualIncome']['id']), array('escape' => false, 'class' => 'btn btn-danger'), __('%s ' . __('Do you sure delete'), h($annual['AnnualIncome']['employee_id']))); ?>
					</td>
				</tr>

				<?php
			endforeach;
		}
		?>
	</tbody>
</table>
<?php if ($this->Paginator->numbers()): ?>
	<div class="pagination">
		<ul>
			<?php echo '<li>' . $this->Paginator->prev(__('<<'), array(), null, array('class' => 'prev disabled')) . '</li>'; ?>
			<?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '')); ?>
			<?php echo '<li>' . $this->Paginator->next(__('>>'), array(), null, array('class' => 'next disabled')) . '</li>'; ?>
		</ul>
	</div>
<?php endif; ?>
