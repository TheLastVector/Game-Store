<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new role'), ['controller' => 'Roles', 'action' => 'add']) . '</li>';

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

            echo '<li>' . $this->Html->link(__('Add a new tag'), ['controller' => 'Tags', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all tags'), ['controller' => 'Tags', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new user'), ['controller' => 'Users', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all users'), ['controller' => 'Users', 'action' => 'index']) . '</li>';
        ?>
    </ul>
</nav>

<div class="roles index large-9 medium-8 columns content">
    <?php
        $urlToRestApi = $this->Url->build(
            [
                'prefix' => 'api',
                'controller' => 'Roles'
            ], 
            true
        );
        echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
        echo $this->Html->script('Roles/index', ['block' => 'scriptBottom']);
    ?>

    <div  ng-app="app" ng-controller="RoleCRUDCtrl">
        <table>
            <tr>
                <td width="100">Name:</td>
                <td><input type="text" id="name" ng-model="role.name" /></td>
            </tr>
            <tr>
                <td width="100">Description:</td>
                <td><input type="text" id="description" ng-model="role.description" /></td>
            </tr>
        </table>

        <button type="button" ng-click="addRole(role.name, role.description)">Add Role</button>
        <button type="button" ng-click="updateRole(role.id, role.name, role.description)">Update Role</button>
        
        <p style="color: green">{{message}}</p>
        <p style="color: red">{{errorMessage}}</p>
        
        <table style="width:100%" ng-init="getAllRoles()">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <tr ng-repeat="role in roles">
                <td>{{role.id}}</td>
                <td>{{role.name}}</td>
                <td>{{role.description}}</td>
                <td><a ng-click="getRole(role.id)">[Edit]</a> | <a ng-click="deleteRole(role.id)">[Delete]</a></td>
            </tr>
        </table> 
    </div>
</div>
