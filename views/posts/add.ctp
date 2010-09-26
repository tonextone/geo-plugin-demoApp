<div class="posts form">
<?php echo $form->create('Post');?>
	<fieldset>
		<legend><?php __('Add Post');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('body');
	?>
	
	<p>Place</p>
	
	<?php echo $form->input('Place.0.name', array('class' => 'word')); ?>
	<?php echo $form->input('Place.0.address'); ?>
	<?php echo $form->input('Place.0.lat'); ?>
	<?php echo $form->input('Place.0.lng'); ?>
	
	<?php echo $this->element('location_picker'); ?>
	
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Posts', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Places', true), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Place', true), array('controller' => 'places', 'action' => 'add')); ?> </li>
	</ul>
</div>
