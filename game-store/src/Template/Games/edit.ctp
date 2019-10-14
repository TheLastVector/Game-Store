<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game $game
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            // Actions on currect item/element
            echo '<li>' . $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $game->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]
            ) . '</li>';

            // Basic related actions
            echo '<li>' . $this->Html->link(__('Add a new game'), ['action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games'), ['action' => 'index']) . '</li>';

            // All other actions
            echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new Role'), ['controller' => 'Roles', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all roles'), ['controller' => 'Roles', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new language'), ['controller' => 'Languages', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all languages'), ['controller' => 'Languages', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('List all platforms'), ['controller' => 'Platforms', 'action' => 'index']) . '</li>';
            echo '<li>' . $this->Html->link(__('Add a new platform'), ['controller' => 'Platforms', 'action' => 'add']) . '</li>';

            echo '<li>' . $this->Html->link(__('List all tags'), ['controller' => 'Tags', 'action' => 'index']) . '</li>';
            echo '<li>' . $this->Html->link(__('Add a new tag'), ['controller' => 'Tags', 'action' => 'add']) . '</li>';
        ?>
    </ul>
</nav>
<div class="games form large-9 medium-8 columns content">
    <?= $this->Form->create($game) ?>
    <fieldset>
        <legend><?= __('Edit Game') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('price');
            echo $this->Form->control('number_of_players');
            echo $this->Form->control('description');
            echo $this->Form->control('release_date');
            echo $this->Form->control('platforms._ids', ['options' => $platforms]);
            echo $this->Form->control('tags._ids', ['options' => $tags]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
