<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!-- 【松浦　6/14】 -->

<div class="users form large-12 medium-8 columns content">

    <!-- 画面タイトル -->
    <!-- <h3><= __('会員登録') ?></h3> -->

    <?= $this->Form->create($user) ?>

    <legend><?= __('') ?></legend>
    <?php
    echo $this->Form->control(
        'userid',
        ['label' => 'ユーザーＩＤ']
    );
    echo $this->Form->control(
        'name',
        ['label' => '名前']
    );
    echo $this->Form->control(
        'age',
        ['label' => '年齢']
    );
    echo $this->Form->control(
        'fishing_history',
        ['label' => '釣り歴']
    );
    echo $this->Form->control(
        'email',
        ['label' => 'メールアドレス']
    );
    echo $this->Form->control(
        'password',
        ['label' => 'パスワード']
    );

    //未実装　表示させないようにする
    //echo $this->Form->
    //control('deleted');

    ?>

    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>