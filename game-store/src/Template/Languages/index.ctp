<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language[]|\Cake\Collection\CollectionInterface $languages
 */
?>

<?php
    echo $this->Html->css([
        'materialize/css/materialize.min.css'
    ]);
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Form->postLink(__('Add a new language'), ['controller' => 'Languages', 'action' => 'add']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

            echo '<li>' . $this->Html->link(__('Associate a platform to a game'), ['controller' => 'GamesPlatforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Tag a game'), ['controller' => 'GamesTags', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all games and their tags'), ['controller' => 'GamesTags', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Force a new purchase'), ['controller' => 'GamesUsers', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users and their purchases'), ['controller' => 'GamesUsers', 'action' => 'index']) . '</li>';

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
<div class="languages index large-9 medium-8 columns content">
    <?php $this->Html->script('Languages/index', ['block' => 'scriptBottom']); ?>

    <div ng-app="Captcha">
        <div class="container" ng-controller="loginCtrl" class="d-inline-block align-top-right">
            <!-- floating button for login -->
            <!-- <div id="login-btn" class="fixed-action-btn" style="top:45px; right:24px;">
                <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger red" href="#modal-login-form"><i class="material-icons left">account_box</i>Login</a>
            </div> -->
            <!-- modal for user login -->
            <!-- <div id="modal-login-form" class="modal"> -->
                <div class="modal-content">
                    <div id="captcha"></div> 
                    <p style="color:red;">{{ captcha_status}}</p>
                    <h4 id="modal-login-title">Login</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input ng-model="username" type="text" class="validate" id="username" name="username" />
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field col s12">
                            <input ng-model="password" type="password" class="validate" id="password" name="password" />
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field col s12">
                            <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="login()"><i class="material-icons left">add</i>Login</a>
                            <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <!-- floating button for logout/change password -->
            <!-- <div id="logout-btn" class="fixed-action-btn" style="top:45px; right:24px;">
                <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger red" href="#modal-logout-form"><i class="material-icons left">eject</i>Logout (Change Password)</a>
            </div> -->
            <!-- modal for user login -->
            <!-- <div id="modal-logout-form" class="modal"> -->
                <div class="modal-content">
                    <h4 id="modal-login-title">Logout or Change Password</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input ng-model="newPassword" type="password" class="validate" id="form-password" />
                            <label for="password">New Password</label>
                        </div>                    
                        <div class="input-field col s12">
                            <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="changePassword()"><i class="material-icons left">autorenew</i>Change Password</a>
                            <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="logout()"><i class="material-icons left">eject</i>Logout</a>
                            <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>

    <h3><?= __('Languages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($languages as $language): ?>
            <tr>
                <td><?= $this->Number->format($language->id) ?></td>
                <td><?= h($language->name) ?></td>
                <td><?= h($language->created) ?></td>
                <td><?= h($language->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $language->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $language->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete # {0}?', $language->id)]) ?>
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
