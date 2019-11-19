<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Game[]|\Cake\Collection\CollectionInterface $games
 */
?>

<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
        <?php 
            $loggedUser = $this->request->getSession()->read('Auth.User');
            // Administrator & Staff
            if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
                echo '<li>' . $this->Html->link(__('Search games'), ['controller' => 'Games', 'action' => 'findGames']) . '</li>';

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

                echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';

                echo '<li>' . $this->Html->link(__('List all files'), ['controller' => 'Files', 'action' => 'index']) . '</li>';
                echo '<li>' . $this->Html->link(__('Add a new file'), ['controller' => 'Files', 'action' => 'add']) . '</li>';
                echo '<li>' . $this->Html->link(__('About'), ['controller' => 'About', 'action' => 'index']) . '</li>';
            } 
            // Client
            else if ($loggedUser['role_id'] === 3) {
                echo '<li>' . $this->Html->link(__('My account'), ['controller' => 'Users', 'action' => 'view', $loggedUser['id']]) . '</li>';

                echo '<li>' . $this->Html->link(__('List all files'), ['controller' => 'Files', 'action' => 'index']) . '</li>';
                echo '<li>' . $this->Html->link(__('Add a new file'), ['controller' => 'Files', 'action' => 'add']) . '</li>';
            }
            // Visitor
            else {
                echo '<li>' . $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) . '</li>';
            }
        ?>
    </ul>
<?php $this->end(); ?>

<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_of_players') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('release_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td><?= h($game->name) ?></td>
                <td><?= $this->Number->format($game->price) ?> $</td>
                <td><?= $this->Number->format($game->number_of_players) ?></td>
                <td><?= h($game->description) ?></td>
                <td><?= h(substr($game->release_date, 0, 2) . '/' . substr($game->release_date, 2, 2) . '/' . substr($game->release_date, 4, 4)) ?></td>
                <td class="actions">
                    <?php 
                        $loggedUser = $this->request->getSession()->read('Auth.User');

                        /*['class' => 'button', 'target' => '_blank'] Pour afficher dans une autre page*/

                        if ($loggedUser['role_id'] === 1 || $loggedUser['role_id'] === 2) {
                            echo $this->Html->link(__('Buy'), ['action' => 'buy', $game->id], ['class' => 'button']);
                            echo ' ';
                            echo $this->Html->link(__('More details'), ['action' => 'view', $game->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']);
                            echo ' ';
                            echo $this->Html->link(__(''), ['action' => 'edit', $game->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']);
                            echo ' ';
                            echo $this->Form->postLink(__(''), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']);
                        } else if ($loggedUser['role_id'] === 3) {
                            echo $this->Html->link(__('Buy'), ['action' => 'buy', $game->id], ['class' => 'button']);
                            echo ' ';
                            echo $this->Html->link(__(''), ['action' => 'view', $game->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']);
                        } else {
                            echo $this->Html->link(__(''), ['action' => 'view', $game->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']);
                        }
                    ?>
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
