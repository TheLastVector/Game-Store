<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Platform $platform
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new platform'), ['controller' => 'Platforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all platforms'), ['controller' => 'Platforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

            echo '<li>' . $this->Html->link(__('Associate a platform to a game'), ['controller' => 'GamesPlatforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Tag a game'), ['controller' => 'GamesTags', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their tags'), ['controller' => 'GamesTags', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Force a new purchase'), ['controller' => 'GamesUsers', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users and their purchases'), ['controller' => 'GamesUsers', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Form->postLink(__('Add a new language'), ['controller' => 'Languages', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Form->postLink(__('List all languages'), ['controller' => 'Languages', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new role'), ['controller' => 'Roles', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all roles'), ['controller' => 'Roles', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new tag'), ['controller' => 'Tags', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all tags'), ['controller' => 'Tags', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';
        ?>
    </ul>
</nav>
<div class="platforms view large-9 medium-8 columns content">
    <h3>
        <?= h($platform->name) ?>
        <?php 
            echo '<li>' . $this->Html->link(__('[Edit]'), ['action' => 'edit', $platform->id]) . '</li>';
            echo ' ';
            echo '<li>' . $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $platform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $platform->id)]) . '</li>';
        ?>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($platform->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($platform->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Games') ?></h4>
        <?php if (!empty($platform->games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Number Of Players') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Release Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($platform->games as $games): ?>
            <tr>
                <td><?= h($games->id) ?></td>
                <td><?= h($games->name) ?></td>
                <td><?= h($games->price) ?></td>
                <td><?= h($games->number_of_players) ?></td>
                <td><?= h($games->description) ?></td>
                <td><?= h($games->release_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $games->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
