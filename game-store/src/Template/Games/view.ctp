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
            $loggedUser = $this->request->getSession()->read('Auth.User');
            if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
                // Actions on currect item/element
                echo '<li>' . $this->Html->link(__('Edit Game'), ['action' => 'edit', $game->id]) . '</li>';
                echo '<li>' . $this->Form->postLink(__('Delete Game'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) . '</li>';

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
            } else {
                echo '<li>' . $this->Html->link(__('Shop'), ['action' => 'index']) . '</li>';
            }
        ?>
    </ul>
</nav>
<div class="games view large-9 medium-8 columns content">
    <h3>
        <?php 
            echo h($game->name);
            echo ' ';
            echo $this->Html->link(__('[Edit]'), ['action' => 'edit', $game->id]);
            echo ' ';
            echo $this->Form->postLink(__('[Delete]'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]);
        ?>
    </h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($game->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($game->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($game->price) ?> $</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Players') ?></th>
            <td><?= $this->Number->format($game->number_of_players) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Release Date') ?></th>
            <td><?= h($game->release_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Playable in') ?></h4>
        <?php if (!empty($game->platforms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($game->platforms as $platforms): ?>
            <tr>
                <td><?= h($platforms->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('[More details]'), ['controller' => 'Platforms', 'action' => 'view', $platforms->id]) ?>
                    <?= $this->Html->link(__('[Edit]'), ['controller' => 'Platforms', 'action' => 'edit', $platforms->id]) ?>
                    <?= $this->Form->postLink(__('[Delete]'), ['controller' => 'Platforms', 'action' => 'delete', $platforms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $platforms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Tags') ?></h4>
        <?php if (!empty($game->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($game->tags as $tags): ?>
            <tr>
                <td><?= h($tags->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('[More details]'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                    <?= $this->Html->link(__('[Edit]'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                    <?= $this->Form->postLink(__('[Delete]'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?php 
        $loggedUser = $this->request->getSession()->read('Auth.User');

        // Admin && Staff
        if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
            echo '<div class="related">';
                echo '<h4>' . __('Purchased by') . '</h4>';
                if (!empty($game->users)) {
                    echo '<table cellpadding="0" cellspacing="0">';
                        echo '<tr>';
                            echo '<th scope="col">' . __('Username') . '</th>';
                            echo '<th scope="col">' . __('First Name') . '</th>';
                            echo '<th scope="col">' . __('Last Name') . '</th>';
                            echo '<th scope="col">' . __('Email') . '</th>';
                            echo '<th scope="col">' . __('Phone') . '</th>';
                            echo '<th scope="col">' . __('Address') . '</th>';
                            /*echo '<th scope="col">' . __('Language Id') . '</th>';
                            echo '<th scope="col">' . __('Role Id') . '</th>';*/
                            echo '<th scope="col" class="actions">' . __('Actions') . '</th>';
                        echo '</tr>';

                        foreach ($game->users as $users) {
                            echo '<tr>';
                                echo '<td>' . h($users->username) . '</td>';
                                echo '<td>' . h($users->first_name) . '</td>';
                                echo '<td>' . h($users->last_name) . '</td>';
                                echo '<td>' . h($users->email) . '</td>';
                                echo '<td>' . h('(' . substr($users->phone, 0, 3) . ')' . ' ' . substr($users->phone, 3, 3) . '-' . substr($users->phone, 6, 4)) . '</td>';
                                echo '<td>' . h($users->address) . '</td>';
                                /*echo '<td>' . h($users->language_id) . '</td>';
                                echo '<td>' . h($users->role_id) . '</td>';*/
                                echo '<td class="actions">';
                                        echo $this->Html->link(__('[More details]'), ['controller' => 'Users', 'action' => 'view', $users->id]);
                                        echo ' ';
                                        echo $this->Html->link(__('[Edit]'), ['controller' => 'Users', 'action' => 'edit', $users->id]);
                                        echo ' ';
                                        echo $this->Form->postLink(__('[Delete]'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]);
                                echo '</td>';
                            echo '</tr>';
                        }
                    echo '</table>';
                }

            echo '</div>';
        }
    ?>
</div>
