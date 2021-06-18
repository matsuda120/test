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

<!-- 【松浦　6/16】 -->

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('teststyle.css') ?>

    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://kit.fontawesome.com/70592d1a2d.js" crossorigin="anonymous"></script>
</head>

<header class="header-3">
    <div class="header-inner">
        <div class="logo">
            <h1>釣果管理システム</h1>
        </div>
        <nav class="header-nav">

            <div class="header-nav-item">

                <?php $userid = $this->request->getSession()->read('Auth.User.userid'); ?>
                <?php if ($userid == 'admin') : ?>
                    <div class="header-button header-login">
                        <?= $this->Html->link(__('管理者専用'), ['controller' => 'Users', 'action' => 'admin']) ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
                    <div class="header-button header-login">
                        <?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?>
                    </div>
                <?php else : ?>
                    <div class="header-button header-login">
                        <?= $this->Html->link(__('会員登録'), ['controller' => 'Users', 'action' => 'add']) ?>
                    </div>
                    <div class="header-button header-login">
                        <?= $this->Html->link(__('ログイン'), ['controller' => 'Users', 'action' => 'login']) ?>
                    </div>
                <?php endif; ?>


                <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
                    <?php $username = $this->request->getSession()->read('Auth.User.name'); ?>
                    <?php $userid = $this->request->getSession()->read('Auth.User.id'); ?>
                    <div class="header-button header-login">
                        <?= $this->Html->link(__('こんにちは、' . $username . 'さん！'), ['controller' => 'Users', 'action' => 'view', $userid]); ?>
                    </div>
                <?php else : ?>
                    <div class="header-button header-login">
                        <?= $this->Html->link(__('こんにちは、ゲストさん！'), ['controller' => 'FishingResults', 'action' => 'index']); ?>
                    </div>
                <?php endif; ?>
            </div>

    </div>
    </nav>
    </div>
</header>

<body>
    <div class="cp_cont">
        <div class="cp_offcm01">
            <input type="checkbox" id="cp_toggle01">
            <label for="cp_toggle01"><span></span></label>
            <div class="cp_menu">
                <ul>
                    <?php $userid = $this->request->getSession()->read('Auth.User.userid'); ?>
                    <?php if ($userid == 'admin') : ?>
                        <li><?= $this->Html->link(__('管理者専用'), ['controller' => 'Users', 'action' => 'admin']) ?></li>
                    <?php endif; ?>
                    <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
                        <li><?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                    <?php else : ?>
                        <li><?= $this->Html->link(__('会員登録'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('ログイン'), ['controller' => 'Users', 'action' => 'login']) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="cp_contents">
            <?= $this->Flash->render() ?>

            <div class="container clearfix">
                <?= $this->fetch('content') ?>　
            </div>

            <!-- <div class="footer">
                <div class="back large-12 medium-8 columns content">
                    <button type="button" onclick="history.back()">戻る</button>
                </div>
            </div> -->

        </div>
    </div>
    </div>

</body>

</html>