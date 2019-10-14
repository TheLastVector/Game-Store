<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesUser[]|\Cake\Collection\CollectionInterface $gamesUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php 
            // Actions on currect item/element
            // *None*

            // Similar to the client
            echo '<li>' . $this->Html->link(__('Shop'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            // Basic related actions
            echo '<li>' . $this->Html->link(__('Add a new purchase'), ['action' => 'add']) . '</li>';

            // All other actions
            echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

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
<div class="gamesUsers index large-9 medium-8 columns content">
    <h3><?= __('Purchases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gamesUsers as $gamesUser): ?>
            <tr>
                <td><?= $gamesUser->has('user') ? $this->Html->link($gamesUser->user->username, ['controller' => 'Users', 'action' => 'view', $gamesUser->user->id]) : '' ?></td>
                <td><?= $gamesUser->has('game') ? $this->Html->link($gamesUser->game->name, ['controller' => 'Games', 'action' => 'view', $gamesUser->game->id]) : '' ?></td>
                <td><?= $this->Number->format($gamesUser->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('[More details]'), ['action' => 'view', $gamesUser->id]) ?>
                    <?= $this->Html->link(__('[Edit]'), ['action' => 'edit', $gamesUser->id]) ?>
                    <?= $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $gamesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gamesUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
