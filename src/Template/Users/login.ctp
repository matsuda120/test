<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- 【松浦　6/14】 -->

<div class="users form large-12 medium-8 columns content">

  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
  <fieldset>
    <?= $this->Form->control('userid', ['label' => 'ユーザーＩＤ']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
  </fieldset>

  <?= $this->Form->button(__('ログイン')); ?>
  <?= $this->Form->end() ?>

</div>