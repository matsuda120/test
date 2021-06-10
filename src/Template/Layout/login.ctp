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
            
            <!-- <li class="name">
                <h2>?= $this->element('my_header') ?></h2>
            </li> -->
            
            <!-- <li class="name">
                <h1>?= $this->fetch('my_header') ?></h1>
            </li> -->
            
            <h1>aaaaaaaa</h1>

        </ul>
        <div class="top-bar-section">
            <ul class="right">

            <!-- ログイン状態：「ログアウト」ボタン
            　　　非ログイン状態：「ログイン」ボタン -->

            <?php if($this->request->getSession()->read('Auth.User.id')):?>
             <li><a href="/my-project/users/logout">ログアウト</a></li>
            <?php else:?>
             <li><a href="/my-project/users/login">ログイン</a></li>
             <li><a href="/my-project/users/add">会員登録</a></li>
            <?php endif;?>

             <!-- 不要？
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            -->
             
            </ul>
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
