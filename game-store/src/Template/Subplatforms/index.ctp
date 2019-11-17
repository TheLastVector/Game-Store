<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subplatform[]|\Cake\Collection\CollectionInterface $subplatforms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subplatform'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Platforms'), ['controller' => 'Platforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Platform'), ['controller' => 'Platforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subplatforms index large-9 medium-8 columns content">
    <h3><?= __('Subplatforms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('platform_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subplatforms as $subplatform): ?>
            <tr>
                <td><?= $this->Number->format($subplatform->id) ?></td>
                <td><?= $subplatform->has('platform') ? $this->Html->link($subplatform->platform->name, ['controller' => 'Platforms', 'action' => 'view', $subplatform->platform->id]) : '' ?></td>
                <td><?= h($subplatform->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subplatform->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subplatform->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subplatform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subplatform->id)]) ?>
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
