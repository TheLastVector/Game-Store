<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilesGame $filesGame
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $filesGame->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $filesGame->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Files Games'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filesGames form large-9 medium-8 columns content">
    <?= $this->Form->create($filesGame) ?>
    <fieldset>
        <legend><?= __('Edit Files Game') ?></legend>
        <?php
            echo $this->Form->control('game_id', ['options' => $games]);
            echo $this->Form->control('file_id', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
