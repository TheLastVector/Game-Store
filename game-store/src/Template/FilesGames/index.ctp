<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilesGame[]|\Cake\Collection\CollectionInterface $filesGames
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Files Game'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filesGames index large-9 medium-8 columns content">
    <h3><?= __('Files Games') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filesGames as $filesGame): ?>
            <tr>
                <td><?= $this->Number->format($filesGame->id) ?></td>
                <td><?= $filesGame->has('game') ? $this->Html->link($filesGame->game->name, ['controller' => 'Games', 'action' => 'view', $filesGame->game->id]) : '' ?></td>
                <td><?= $filesGame->has('file') ? $this->Html->link($filesGame->file->name, ['controller' => 'Files', 'action' => 'view', $filesGame->file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $filesGame->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filesGame->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filesGame->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filesGame->id)]) ?>
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
