<?php
$urlToGamesAutocompleteJson = $this->Url->build([
    "controller" => "Games",
    "action" => "findGames",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToGamesAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Games/find-games', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Shop'), ['controller' => 'Games', 'action' => 'index']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Games') ?>
<fieldset>
    <legend><?= __('Search Game by Name') ?></legend>
    <?php
        echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>

    <legend><?= __('Search Game by Platform') ?></legend>
</fieldset>
<?= $this->Form->end() ?>