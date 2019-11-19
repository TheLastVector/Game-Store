<!-- <?php
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
</nav> -->

<?php
    $urlToRestApi = $this->Url->build('/api/roles', true);
    echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
    echo $this->Html->script('Roles/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default roles-content">
            <div class="panel-heading">Roles
                <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a>
            </div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Role</h2>

                <form class="form" id="roleAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="description"/>
                    </div>

                    <a href="javascript:void(0);" class="btn btn-success" onclick="roleAction('add')">Add Role</a>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Role" -->
                </form>
            </div>

            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Role</h2>
                <form class="form" id="roleEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="nameEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="descriptionEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="roleAction('edit')">Update Role</a>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Role" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="roleData">
                    <?php 
                    $count = 0;
                    foreach ($roles as $role): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $role['name']; ?></td>
                            <td><?php echo $role['description']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editRole('<?php echo $role['id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? roleAction('delete', '<?php echo $role['id']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>