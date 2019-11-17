<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subplatform $subplatform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Subplatforms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Platforms'), ['controller' => 'Platforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Platform'), ['controller' => 'Platforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subplatforms form large-9 medium-8 columns content">
    <?= $this->Form->create($subplatform) ?>
    <fieldset>
        <legend><?= __('Add Subplatform') ?></legend>
        <?php
            echo $this->Form->control('platform_id', ['options' => $platforms]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
