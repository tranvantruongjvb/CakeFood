<table width="90%">
	<h1><?= h($user->name) ?></h1>
	<p>Username : <?= h($user->username) ?></p>
	<p>Email  :<?= h($user->email) ?></p>
	<p>Phone  :<?= h($user->phone) ?></p>
	<p>Birth date  :<?= h($user->birthdate) ?></p>
	<p>Created: <?= $user->created->format(DATE_RFC850) ?></p>
	<p><?= $this->Html->link('Update information', ['action' => 'edit', $user->id]) ?></p>
	
</table>