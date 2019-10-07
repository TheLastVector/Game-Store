<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesTag $gamesTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Games Tag'), ['action' => 'edit', $gamesTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Games Tag'), ['action' => 'delete', $gamesTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Games Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Games Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamesTags view large-9 medium-8 columns content">
    <h3><?= h($gamesTag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesTag->has('game') ? $this->Html->link($gamesTag->game->name, ['controller' => 'Games', 'action' => 'view', $gamesTag->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $gamesTag->has('tag') ? $this->Html->link($gamesTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $gamesTag->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gamesTag->id) ?></td>
        </tr>
    </table>
</div>
