<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subplatform $subplatform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subplatform'), ['action' => 'edit', $subplatform->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subplatform'), ['action' => 'delete', $subplatform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subplatform->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subplatforms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subplatform'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Platforms'), ['controller' => 'Platforms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Platform'), ['controller' => 'Platforms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subplatforms view large-9 medium-8 columns content">
    <h3><?= h($subplatform->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Platform') ?></th>
            <td><?= $subplatform->has('platform') ? $this->Html->link($subplatform->platform->name, ['controller' => 'Platforms', 'action' => 'view', $subplatform->platform->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subplatform->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subplatform->id) ?></td>
        </tr>
    </table>
</div>
