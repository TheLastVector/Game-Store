<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Platform $platform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $platform->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $platform->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Platforms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="platforms form large-9 medium-8 columns content">
    <?= $this->Form->create($platform) ?>
    <fieldset>
        <legend><?= __('Edit Platform') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('games._ids', ['options' => $games]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
