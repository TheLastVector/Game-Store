<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesUser $gamesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Games Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gamesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($gamesUser) ?>
    <fieldset>
        <legend><?= __('Buy' . ' ' . $game->name . ' ' . '?') ?></legend>
        <?php
            echo $this->Form->control('quantity');
            echo $this->Form->hidden('user_id', ['value' => $user -> id]);
            echo $this->Form->hidden('game_id', ['value' => $game -> id]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
