<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesPlatform $gamesPlatform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Associate a platform to a game'), ['controller' => 'GamesPlatforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new subplatform'), ['controller' => 'Subplatforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all subplatforms'), ['controller' => 'Subplatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

            echo '<li>' . $this->Html->link(__('Tag a game'), ['controller' => 'GamesTags', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their tags'), ['controller' => 'GamesTags', 'action' => 'index']) . '</li>';

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
<div class="gamesPlatforms view large-9 medium-8 columns content">
    <h3>
        <?= h($gamesPlatform->id) ?>
        <?php 
            echo $this->Html->link(__('[Edit]'), ['action' => 'edit', $gamesPlatform->id]);
            echo ' ';
            echo $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $gamesPlatform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesPlatform->id)]);
        ?>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= $gamesPlatform->has('game') ? $this->Html->link($gamesPlatform->game->name, ['controller' => 'Games', 'action' => 'view', $gamesPlatform->game->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Platform') ?></th>
            <td><?= $gamesPlatform->has('platform') ? $this->Html->link($gamesPlatform->platform->name, ['controller' => 'Platforms', 'action' => 'view', $gamesPlatform->platform->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gamesPlatform->id) ?></td>
        </tr>
    </table>
</div>
