

<table border="2" align="center"   class="table table-striped">
<div id="pagination_data">
<td><h1>All users</h1></td>
<td><p><?= $this->Html->link('Add User', ['action' => 'add']) ?></p></td>
<td><p><?= $this->Html->link('logout', ['action' => 'logout']) ?></p></td>
    <tr>
        <th>Id</th>
        <th>username</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?= $user->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete user with id # {0}?',$user->id)])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
        <div class="pagination_link">
        <tr>
        <td>
            <?= $this->Paginator->prev('« Previous ', array('class' => 'disabled'));
             //Shows the next and previous links?>
        </td>
        <td >
            <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); //Shows the page numbers?>
        </td>
        <td>   <?=  $this->Paginator->next(' Next »', array('class' => 'disabled')); //Shows the next and previous links?>
        </td>
        <td>   <?= " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages?>
        </td>
        </tr>
        </div>
</div>
</table>
<script>
$(document).ready(function() {
  
});
</script>