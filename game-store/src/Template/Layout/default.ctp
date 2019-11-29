<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?php
        echo $this->Html->css([
            'base.css',
            'style.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
        ]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
                ], ['block' => 'scriptLibraries']
        );
    ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <!-- <h1><a href=""><?= $this->fetch('title') ?></a></h1> -->
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php
                    $loguser = $this->request->getSession()->read('Auth.User');
                    if ($loguser) {
                        $user = $loguser['username'];
                        echo '<li>' . $this->Html->link('Home', ['controller' => 'Games', 'action' => 'index']) . '</li>';
                        echo '<li>' . $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]) . '</li>';
                        echo '<li>' . $this->Html->link('About', ['controller' => 'About', 'action' => 'index']) . '</li>';
                        echo '<li>' . $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) . '</li>';
                        echo '<li>' . $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) . '</li>';
                        echo '<li>' . $this->Html->link('Portuguese', ['action' => 'changeLang', 'pt_BR'], ['escape' => false]) . '</li>';
                        echo '<li>' . $this->Html->link('logout', ['controller' => 'Users', 'action' => 'logout']) . '</li>';
                    } else {
                        echo '<li>' . $this->Html->link('Home', ['controller' => 'Games', 'action' => 'index']) . '</li>';
                        echo '<li>' . $this->Html->link('About', ['controller' => 'About', 'action' => 'index']) . '</li>';
                        echo '<li>' . $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) . '</li>';
                        echo '<li>' . $this->Html->link('French', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) . '</li>';
                        echo '<li>' . $this->Html->link('Portuguese', ['action' => 'changeLang', 'pt_BR'], ['escape' => false]) . '</li>';
                        
                        if ($this->request->getAttribute("here") !== '/Game-Store/game-store/users/login') {
                            echo '<li>' . $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) . '</li>';
                        }

                        if ($this->request->getAttribute("here") !== '/Game-Store/game-store/users/sign-up') {
                            echo '<li>' . $this->Html->link('Sign up', ['controller' => 'Users', 'action' => 'signUp']) . '</li>';
                        }
                    }
                ?>
                <!-- <li>
                    <?php 
                        if ($this->request->getAttribute("here") === '/Game-Store/game-store/users/login') {
                            echo 'It\'s inside.';
                        }
                        echo $this->request->getAttribute("here") 
                    ?>
                </li> -->
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
    <?= $this->fetch('script'); ?>
    <?= $this->fetch('scriptBottom') ?> 
</body>
</html>
