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
            if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
                echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

                echo '<li>' . $this->Html->link(__('Associate a platform to a game'), ['controller' => 'GamesPlatforms', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

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
        <?= $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Number Of Players') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Release Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->games as $games): ?>
            <tr>
                <td><?= h($games->name) ?></td>
                <td><?= h($games->number_of_players) ?></td>
                <td><?= h($games->description) ?></td>
                <td><?= h($games->release_date) ?></td>
                <td class="actions">
                    <?php 
                        $loggedUser = $this->request->getSession()->read('Auth.User');

                        // Admin and Staff
                        if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
                            echo $this->Html->link(__('[More details]'), ['controller' => 'Games', 'action' => 'view', $games->id]);
                            echo ' ';
                            echo $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]);
                            echo ' ';
                            echo $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]);
                        }
                        // Client
                        else if ($loggedUser['role_id'] === 3) {
                            echo $this->Html->link(__('[More details]'), ['controller' => 'Games', 'action' => 'view', $games->id]);
                        }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
