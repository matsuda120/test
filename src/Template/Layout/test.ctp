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
    
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('teststyle.css') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>


<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-4 medium-4 columns">
            <h1>釣果管理システム</h1>
        </ul>      

        <div class="top-bar-section">
            <ul class="right">
                <?php $userid = $this->request->getSession()->read('Auth.User.userid'); ?>
                <?php if ($userid == 'admin') : ?>
                    <li><?= $this->Html->link(__('管理者専用'), ['controller' => 'Users', 'action' => 'admin']) ?></li>
                <?php endif; ?>

                <li><?= $this->Html->link(__('釣果一覧'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('検索'), ['controller' => 'FishingResults', 'action' => 'find']) ?></li>
                <li><?= $this->Html->link(__('項目切替'), ['controller' => 'FishingResults', 'action' => 'filter']) ?></li>

                <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
                    <li><?= $this->Html->link(__('釣果登録'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                <?php else : ?>
                    <li><?= $this->Html->link(__('会員登録'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('ログイン'), ['controller' => 'Users', 'action' => 'login']) ?></li>
                <?php endif; ?>

                <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
                    <?php $username = $this->request->getSession()->read('Auth.User.name'); ?>
                    <?php $userid = $this->request->getSession()->read('Auth.User.id'); ?>
                    <li><?= $this->Html->link(__('こんにちは、' . $username . 'さん！'), ['controller' => 'Users', 'action' => 'view', $userid]); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->link(__('こんにちは、ゲストさん！'), ['controller' => 'FishingResults', 'action' => 'index']); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <?= $this->Flash->render() ?>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>　
    </div>

    <div class="footer">
        <div class="back large-12 medium-8 columns content">
            <button type="button" onclick="history.back()">戻る</button>
        </div>
    </div>
</body>

</html>