<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<!--  【松浦　6/16】 -->

<br>

<h4><?= '≪管理者専用≫' ?></h4>


<br>
<br>
<br>


<!-- 天気 -->
<h3><?= __('天気') ?></h3>
<table class="design10">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'No']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('title', ['label' => '都道府県']) ?></th>
        <th scope="col" class="actions"><?= __('') ?></th>
    </tr>

    <?php foreach ($weathers as $weather) : ?>
        <tr>
            <td><?= $this->Number->format($weather->id) ?></td>
            <td><?= h($weather->title) ?></td>
            <td class="">
                <?= $this->Html->link(__('修正'), ['controller' => 'Weathers', 'action' => 'edit',  $weather->id]) ?>
                <?= $this->Form->postLink(__('削除'), ['controller' => 'Weathers', 'action' => 'delete', $weather->id], ['confirm' => __('この選択肢（No.{0}) を削除してよろしいでしょうか？', $weather->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>

<!-- 釣種 -->
<h3><?= __('釣種') ?></h3>
<table class="design10">

    <tr>
        <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'No']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('title', ['label' => '都道府県']) ?></th>
        <th scope="col" class="actions"><?= __('') ?></th>
    </tr>

    <?php foreach ($fishingTypes as $fishingType) : ?>
        <tr>
            <td><?= $this->Number->format($fishingType->id) ?></td>
            <td><?= h($fishingType->title) ?></td>
            <td class="">
                <?= $this->Html->link(__('修正'), ['controller' => 'FishingTypes', 'action' => 'edit',  $fishingType->id]) ?>
                <?= $this->Form->postLink(__('削除'), ['controller' => 'FishingTypes', 'action' => 'delete', $fishingType->id], ['confirm' => __('この選択肢（No.{0}) を削除してよろしいでしょうか？', $fishingType->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>

<!-- 都道府県 -->

<h3><?= __('都道府県') ?></h3>
<table class="design10">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'No']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('title', ['label' => '都道府県']) ?></th>
        <th scope="col" class="actions"><?= __('') ?></th>
    </tr>

    <tbody>
        <?php foreach ($prefectures as $prefecture) : ?>
            <tr>
                <td><?= $this->Number->format($prefecture->id) ?></td>
                <td><?= h($prefecture->title) ?></td>
                <td class="">
                    <?= $this->Html->link(__('修正'), ['controller' => 'Prefectures', 'action' => 'edit',  $prefecture->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['controller' => 'Prefectures', 'action' => 'delete', $prefecture->id], ['confirm' => __('この選択肢（No.{0}) を削除してよろしいでしょうか？', $prefecture->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>

</table>

<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>

<!-- 会員情報 編集-->

<h3><?= __('会員一覧') ?></h3>
<table class="design10">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id', ['label' => '管理番号']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('userid', ['label' => 'ユーザーID']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('name', ['label' => '名前']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('age', ['label' => 'ユーザー年齢ID']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('fishing_history', ['label' => '釣り歴']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('email', ['label' => 'メールアドレス']) ?></th>
        <th scope="col"><?= $this->Paginator->sort('password', ['label' => 'パスワード']) ?></th>
        <th scope="col" class="actions"><?= __('') ?></th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->userid) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= $this->Number->format($user->age) . '歳' ?></td>
            <td><?= h($user->fishing_history) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->password) ?></td>
            <td class="">
                <?= $this->Html->link(__('修正'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->id], ['confirm' => __('会員情報（No.{0}) を削除してよろしいでしょうか？', $user->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('≪')) ?>
        <?= $this->Paginator->prev('< ' . __('前ページ')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('次ページ') . ' >') ?>
        <?= $this->Paginator->last(__('≫') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('{{page}} / {{pages}} ページを表示  現在 {{current}} / {{count}}件を表示')]) ?></p>
</div>