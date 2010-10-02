<div class="posts form">
<?php echo $form->create('Post');?>
	<fieldset>
 		<legend><?php __('Edit Post');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('body');
	?>
	
	<p>Place</p>
	
	<?php echo $form->hidden('Place.0.id', array('value' => $this->data['Place'][0]['id'])); ?>
	
	<?php echo $form->input('Place.0.name', array('class' => 'word')); ?>
	<?php echo $form->input('Place.0.address'); ?>
	<?php echo $form->input('Place.0.lat'); ?>
	<?php echo $form->input('Place.0.lng'); ?>
	
	<?php echo $location->picker(); ?>
	
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Post.id'))); ?></li>
		<li><?php echo $html->link(__('List Posts', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Places', true), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Place', true), array('controller' => 'places', 'action' => 'add')); ?> </li>
	</ul>
</div>
