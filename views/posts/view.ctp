<div class="posts view">
<h2><?php  __('Post');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Post', true), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Post', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Posts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Post', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Places', true), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Place', true), array('controller' => 'places', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php foreach ($post['Place'] as $place): ?>
<?php echo $map->draw(
	'static',
	array(
		'center' => "{$place['lat']},{$place['lng']}",
		'size' => '160x160',
		'zoom' => 16,
		'label' => $place['address'],
	)
); ?>
<?php endforeach; ?>

<div class="related">
	<h3><?php __('Related Places');?></h3>
	<?php if (!empty($post['Place'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Post Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Address'); ?></th>
		<th><?php __('Lat'); ?></th>
		<th><?php __('Lng'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($post['Place'] as $place):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $place['id'];?></td>
			<td><?php echo $place['post_id'];?></td>
			<td><?php echo $place['name'];?></td>
			<td><?php echo $place['address'];?></td>
			<td><?php echo $place['lat'];?></td>
			<td><?php echo $place['lng'];?></td>
			<td><?php echo $place['created'];?></td>
			<td><?php echo $place['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'places', 'action' => 'view', $place['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'places', 'action' => 'edit', $place['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'places', 'action' => 'delete', $place['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $place['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Place', true), array('controller' => 'places', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
