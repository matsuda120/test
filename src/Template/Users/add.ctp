<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fishing Results'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('会員登録') ?></legend>
        <?php
            echo $this->Form->control('ユーザーID');
            echo $this->Form->control('氏名');
            echo $this->Form->control('年齢');
            echo $this->Form->control('釣り歴');
            echo $this->Form->control('メールアドレス');
            echo $this->Form->control('パスワード');

            //未実装　表示させないようにする
            //echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
