<h3 class="center-align"><?php echo lang('index_heading');?></h3>
<p class="center-align"><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message; ?></div>

<table>
	<tr class="border-row">
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><a href="/auth/edit_user/<?= $user->id; ?>"><i class="material-icons tools">edit</i></a></td>
		</tr>
	<?php endforeach;?>
</table>

<p class="admin-buttons">
	<a class="btn-floating" href="/auth/create_user"><i class="material-icons">add</i></a>
	<a class="btn-floating" href="/auth/create_group"><i class="material-icons">group_add</i></a>
</p>