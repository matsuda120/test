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
        <legend><?= __('login') ?></legend>
        <?= $this->Form->control('email'); ?>
        <?= $this->Form->control('password'); ?>
      </fieldset>
    <?= $this->Form->button(__('submit')); ?>
    <?= $this->Form->end() ?>
    </div>