<?php
    $urlToLinkedListFilter = $this->Url->build([
        "controller" => "Platforms",
        "action" => "getPlatforms",
        "_ext" => "json"
    ]);
    echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
    echo $this->Html->script('GamesPlatforms/handle-list-of-platforms', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GamesPlatform $gamesPlatform
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
       <?php 
            echo '<li>' . $this->Html->link(__('Store'), ['controller' => 'Games', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('List all games and their platforms'), ['controller' => 'GamesPlatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new subplatform'), ['controller' => 'Subplatforms', 'action' => 'add']) . '</li>';
            echo '<li>' . $this->Html->link(__('List all subplatforms'), ['controller' => 'Subplatforms', 'action' => 'index']) . '</li>';

            echo '<li>' . $this->Html->link(__('Add a new game'), ['controller' => 'Games', 'action' => 'add']) . '</li>';

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
        ?>
    </ul>
</nav>
<div class="gamesPlatforms form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="gamesPlatformsController">
    <?= $this->Form->create($gamesPlatform) ?>
    <fieldset>
        <legend><?= __('Add Games Platform') ?></legend>
        <?php
            echo $this->Form->control('game_id', ['options' => $games]);
        ?>
        <!-- <?php 
            echo $this->Form->control('platform_id', ['options' => $platforms]);
            echo $this->Form->control('subplatform_id', ['option' => $subplatforms]);
        ?> -->
        <select 
            name="platform_id"
            id="platform-id" 
            ng-model="platform" 
            ng-options="platform.name for platform in platforms track by platform.id"
        >
            <option value=''>Select</option>
        </select>
        <select 
            name="subplatform_id"
            id="subplatform-id" 
            ng-disabled="!platform"
            ng-model="subplatform"
            ng-options="subplatform.name for subplatform in platform.subplatforms track by subplatform.id"
        >
            <option value=''>Select</option>
        </select>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
