<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<!-- Menu du côté gauche -->
<?php $this->start('tb_actions'); ?>
    <?php 
        echo '<li>' . $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $role->id]) . '</li>';
        echo '<li>' . $this->Html->link(__('Add a new role'), ['controller' => 'Roles', 'action' => 'add']) . '</li>';
        echo '<li>' . $this->Html->link(__('List all roles'), ['controller' => 'Roles', 'action' => 'index']) . '</li>';
        echo '<li>' . $this->Html->link(__('Leave admin version'), ['prefix' => false, 'controller' => 'Roles', 'action' => 'index']) . '</li>';
    ?>
<?php $this->end(); ?>

<?php $this->start('tb_sidebar'); ?>
    <div class="dropdown hidden-xs">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?= __("Actions") ?>
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <?= $this->fetch('tb_actions') ?>
        </ul>
    </div>
<?php $this->end(); ?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($role->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($role->description) ?></td>
        </tr>
    </table>
</div>
