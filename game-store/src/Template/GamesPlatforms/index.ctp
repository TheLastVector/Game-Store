<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesPlatform[]|\Cake\Collection\CollectionInterface $gamesPlatforms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Games Platform'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Platforms'), ['controller' => 'Platforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Platform'), ['controller' => 'Platforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamesPlatforms index large-9 medium-8 columns content">
    <h3><?= __('Games Platforms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('platform_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesPlatforms as $gamesPlatform): ?>
            <tr>
                <td><?= $this->Number->format($gamesPlatform->id) ?></td>
                <td><?= $gamesPlatform->has('game') ? $this->Html->link($gamesPlatform->game->name, ['controller' => 'Games', 'action' => 'view', $gamesPlatform->game->id]) : '' ?></td>
                <td><?= $gamesPlatform->has('platform') ? $this->Html->link($gamesPlatform->platform->name, ['controller' => 'Platforms', 'action' => 'view', $gamesPlatform->platform->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gamesPlatform->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gamesPlatform->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gamesPlatform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesPlatform->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
