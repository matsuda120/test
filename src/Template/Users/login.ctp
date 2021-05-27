<?php
    /**
     * @var \App\View\AppView $this
     */
    ?>

    <!-- 画面左側のメニュー項目 -->
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
          <li class="heading"><?= __('Actions') ?></li>
          <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('List Fishing Result'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
      </ul>
    </nav>

    <!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
          <li class="heading">?= __('Actions') ?></li>
          <li><= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
          <li>?= $this->Html->link(__('List Fishing Result'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
          <li>?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
      </ul>
    </nav> -->


    <div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
      <fieldset>
        <legend><?= __('ログイン') ?></legend>
        <?= $this->Form->control('ユーザーⅠⅮ') ?>
        <?= $this->Form->control('パスワード') ?>
      </fieldset>
    <?= $this->Form->button('ログイン') ?>
    <?= $this->Form->end() ?>
    </div>