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
    <!--横のメニューが出てる部分-->
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('ikenodesign.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="top-bar">
        <ul class="title-area">
            <h1 class="h1">釣</h1>
            <h2 class="h2">果管理システム</h2>
        </ul>

        <div class="top-bar-section">
            <nav class="pc-nav">
                <ul class="right">

                    <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
                        <li><a href="/my-project/users/logout">ログアウト</a></li>
                    <?php else : ?>
                        <li><a href="/my-project/users/login">ログイン</a></li>
                        <li><a href="/my-project/users/add">会員登録</a></li>
                    <?php endif; ?>



                </ul>
            </nav>
        </div>
    </nav>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <!-- フェッチのコンテントに作成したVieｗファイルが表示される -->
        <?= $this->fetch('content') ?>　
    </div>

    <footer>
    </footer>

</body>

</html>