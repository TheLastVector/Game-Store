<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesUser $gamesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Games User'), ['action' => 'edit', $gamesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Games User'), ['action' => 'delete', $gamesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Games Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Games User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamesUsers view large-9 medium-8 columns content">
    <h3><?= h($gamesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $gamesUser->has('user') ? $this->Html->link($gamesUser->user->id, ['controller' => 'Users', 'action' => 'view', $gamesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesUser->has('game') ? $this->Html->link($gamesUser->game->name, ['controller' => 'Games', 'action' => 'view', $gamesUser->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gamesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($gamesUser->quantity) ?></td>
        </tr>
    </table>
</div>
