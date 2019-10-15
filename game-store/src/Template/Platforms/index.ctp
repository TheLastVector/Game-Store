<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Platform[]|\Cake\Collection\CollectionInterface $platforms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new platform'), ['controller' => 'Platforms', 'action' => 'add']) . '</li>';

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
<div class="platforms index large-9 medium-8 columns content">
    <h3><?= __('Platforms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($platforms as $platform): ?>
            <tr>
                <td><?= $this->Number->format($platform->id) ?></td>
                <td><?= h($platform->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $platform->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $platform->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $platform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $platform->id)]) ?>
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
