<?php $this->extend('/Layout/TwitterBootstrap/dashboard'); ?>

<?php
$urlToGamesAutocompleteJson = $this->Url->build([
    "controller" => "Games",
    "action" => "findGames",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToGamesAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Games/find-games', ['block' => 'scriptBottom']);
?>

<?php $this->start('tb_actions'); ?>
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Shop'), ['controller' => 'Games', 'action' => 'index']) ?></li>
<?php $this->end(); ?>

<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<?= $this->Form->create('Games') ?>
<fieldset>
    <legend><?= __('Search Game by Name') ?></legend>
    <?php
        echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>

    <legend><?= __('Search Game by Platform') ?></legend>
</fieldset>
<?= $this->Form->end() ?>