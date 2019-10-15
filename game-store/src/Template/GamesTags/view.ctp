<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesTag $gamesTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Tag a game'), ['controller' => 'GamesTags', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their tags'), ['controller' => 'GamesTags', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

            echo '<li>' . $this->Html->link(__('Associate a platform to a game'), ['controller' => 'GamesPlatforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Force a new purchase'), ['controller' => 'GamesUsers', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users and their purchases'), ['controller' => 'GamesUsers', 'action' => 'index']) . '</li>';

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
<div class="gamesTags view large-9 medium-8 columns content">
    <h3>
        <?= h($gamesTag->id) ?>
        <?php 
            echo $this->Html->link(__('[Edit]'), ['action' => 'edit', $gamesTag->id]);
            echo ' ';
            echo $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $gamesTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesTag->id)]);
        ?>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesTag->has('game') ? $this->Html->link($gamesTag->game->name, ['controller' => 'Games', 'action' => 'view', $gamesTag->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $gamesTag->has('tag') ? $this->Html->link($gamesTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $gamesTag->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gamesTag->id) ?></td>
        </tr>
    </table>
</div>
