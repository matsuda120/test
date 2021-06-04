<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!-- 画面左側のメニュー項目 -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('検索'), ['controller' => 'FishingResults', 'action' => 'search']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['controller' => 'FishingResults', 'action' => 'columchange']) ?></li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('釣果修正'), ['action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('釣果削除'), ['action' => 'delete']) ?></li>
    </ul>
</nav>

<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">?= __('Actions') ?></li>
        <li>?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('List Fishing Results'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('会員登録') ?></legend>
        <?php
            echo $this->Form->control('userid');
            echo $this->Form->control('name');
            echo $this->Form->control('age');
            echo $this->Form->control('fishing_history');
            echo $this->Form->control('email');
            echo $this->Form->control('password');

            //未実装　表示させないようにする
            //echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>
