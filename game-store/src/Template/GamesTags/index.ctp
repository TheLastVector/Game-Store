<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesTag[]|\Cake\Collection\CollectionInterface $gamesTags
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Games Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamesTags index large-9 medium-8 columns content">
    <h3><?= __('Games Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesTags as $gamesTag): ?>
            <tr>
                <td><?= $this->Number->format($gamesTag->id) ?></td>
                <td><?= $gamesTag->has('game') ? $this->Html->link($gamesTag->game->name, ['controller' => 'Games', 'action' => 'view', $gamesTag->game->id]) : '' ?></td>
                <td><?= $gamesTag->has('tag') ? $this->Html->link($gamesTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $gamesTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gamesTag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gamesTag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gamesTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesTag->id)]) ?>
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
