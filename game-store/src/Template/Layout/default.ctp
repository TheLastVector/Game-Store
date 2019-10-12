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
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
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
                        echo '<li>' . $this->Html->link('logout', ['controller' => 'Users', 'action' => 'logout']) . '</li>';
                    } else {
                        echo '<li>' . $this->Html->link('Home', ['controller' => 'Games', 'action' => 'index']) . '</li>';
                        
                        if ($this->request->here !== '/Game-Store/game-store/users/login') {
                            echo '<li>' . $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) . '</li>';
                        }

                        if ($this->request->here !== '/Game-Store/game-store/users/sign-up') {
                            echo '<li>' . $this->Html->link('Sign up', ['controller' => 'Users', 'action' => 'signUp']) . '</li>';
                        }
                    }
                ?>
                <!-- <li>
                    <?php 
                        if ($this->request->here === '/Game-Store/game-store/users/login') {
                            echo 'It\'s inside.';
                        }
                        echo $this->request->here 
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
</body>
</html>
