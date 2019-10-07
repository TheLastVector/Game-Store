<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesPlatform $gamesPlatform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Games Platform'), ['action' => 'edit', $gamesPlatform->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Games Platform'), ['action' => 'delete', $gamesPlatform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesPlatform->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Games Platforms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Games Platform'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Platforms'), ['controller' => 'Platforms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Platform'), ['controller' => 'Platforms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gamesPlatforms view large-9 medium-8 columns content">
    <h3><?= h($gamesPlatform->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesPlatform->has('game') ? $this->Html->link($gamesPlatform->game->name, ['controller' => 'Games', 'action' => 'view', $gamesPlatform->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Platform') ?></th>
            <td><?= $gamesPlatform->has('platform') ? $this->Html->link($gamesPlatform->platform->name, ['controller' => 'Platforms', 'action' => 'view', $gamesPlatform->platform->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gamesPlatform->id) ?></td>
        </tr>
    </table>
</div>
