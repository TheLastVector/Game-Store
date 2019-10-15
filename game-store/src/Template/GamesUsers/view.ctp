<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesUser $gamesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php 
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
        ?>
    </ul>
</nav>
<div class="gamesUsers view large-9 medium-8 columns content">
    <h3>
        <?= h($gamesUser->id) ?>
        <?php 
            echo $this->Html->link(__('[Edit]'), ['action' => 'edit', $gamesUser->id]);
            echo ' ';
            echo $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $gamesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesUser->id)]);
        ?>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $gamesUser->has('user') ? $this->Html->link($gamesUser->user->id, ['controller' => 'Users', 'action' => 'view', $gamesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesUser->has('game') ? $this->Html->link($gamesUser->game->name, ['controller' => 'Games', 'action' => 'view', $gamesUser->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gamesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($gamesUser->quantity) ?></td>
        </tr>
    </table>
</div>
