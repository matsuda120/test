<!-- ログイン画面 -->

<?php
    /**
     * @var \App\View\AppView $this
     */
    ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
          <li class="heading"><?= __('Actions') ?></li>
          <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
      </ul>
    </nav>
    <div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
      <fieldset>
        <legend><?= __('ログイン') ?></legend>
        <?= $this->Form->control('userid', ['label' => 'ユーザーID']); ?>
        <?= $this->Form->control('password', ['label' => 'パスワード']); ?>
      </fieldset>
    <?= $this->Form->button(__('ログイン')); ?>
    <?= $this->Form->end() ?>
    </div>