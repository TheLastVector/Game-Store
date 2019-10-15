<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesUser $gamesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            $loggedUser = $this->request->getSession()->read('Auth.User');
            if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
                echo '<li>' . $this->Html->link(__('Shop'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Force a new purchase'), ['controller' => 'GamesUsers', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all users and their purchases'), ['controller' => 'GamesUsers', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

                echo '<li>' . $this->Html->link(__('Associate a platform to a game'), ['controller' => 'GamesPlatforms', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Tag a game'), ['controller' => 'GamesTags', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all games and their tags'), ['controller' => 'GamesTags', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Form->postLink(__('Add a new language'), ['controller' => 'Languages', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Form->postLink(__('List all languages'), ['controller' => 'Languages', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new platform'), ['controller' => 'Platforms', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all platforms'), ['controller' => 'Platforms', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new role'), ['controller' => 'Roles', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all roles'), ['controller' => 'Roles', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new tag'), ['controller' => 'Tags', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all tags'), ['controller' => 'Tags', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';
            } else {
                echo '<li>' . $this->Html->link(__('Shop'), ['controller' => 'Games', 'action' => 'index']) . '</li>';
            }
        ?>
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
