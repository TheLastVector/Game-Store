<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilesGame $filesGame
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Files Game'), ['action' => 'edit', $filesGame->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Files Game'), ['action' => 'delete', $filesGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filesGame->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files Games'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Files Game'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="filesGames view large-9 medium-8 columns content">
    <h3><?= h($filesGame->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $filesGame->has('game') ? $this->Html->link($filesGame->game->name, ['controller' => 'Games', 'action' => 'view', $filesGame->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $filesGame->has('file') ? $this->Html->link($filesGame->file->name, ['controller' => 'Files', 'action' => 'view', $filesGame->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($filesGame->id) ?></td>
        </tr>
    </table>
</div>
