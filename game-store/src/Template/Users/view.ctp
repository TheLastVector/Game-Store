<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            $loggedUser = $this->request->getSession()->read('Auth.User');
            if ($loggedUser['role_id'] === 1) {
                echo '<li>' . $this->Html->link(__('Add a new user'), ['action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all users'), ['action' => 'index']) . '</li>';
                echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) . '</li>';
                echo '<li>' . $this->Html->link(__('Add a new Role'), ['controller' => 'Roles', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all roles'), ['controller' => 'Roles', 'action' => 'index']) . '</li>';
                echo '<li>' . $this->Html->link(__('Add a new language'), ['controller' => 'Languages', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all languages'), ['controller' => 'Languages', 'action' => 'index']) . '</li>';
            } else {
                echo '<li>' . $this->Html->link(__('Shop'), ['controller' => 'Games', 'action' => 'index']) . '</li>';
            }
        ?>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3>
        <?php
            $loggedUser = $this->request->getSession()->read('Auth.User');
            if ($loggedUser['id'] === $user->id) {
                echo 'My account';
            }else {
                echo $user->username;
            }
        ?>
        <?= $this->Html->link(__('[Edit]'), ['action' => 'edit', $user->id]) ?>
        <?= $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h('(' . substr($user->phone, 0, 3) . ')' . ' ' . substr($user->phone, 3, 3) . '-' . substr($user->phone, 6, 4)) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= h($user->language->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Game library') ?></h4>
        <?php if (!empty($user->games)): ?>
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
            <?php foreach ($user->games as $games): ?>
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
