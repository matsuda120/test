<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- 【松浦　6/14】 -->


<div class="msr_text_03">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('userid', ['label' => 'ユーザーＩＤ']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
</div>

<div class="msr_sendbtn_03">
    <?= $this->Form->button(__('ログイン')); ?>
    <?= $this->Form->end() ?>
</div>