<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[] $posts
 */
?>

<div class="content">
<?php foreach ($posts as $post): ?> 
    <h3><?= $post-> title ?></h3>

    <!-- 日付のフォーマットを指定する記述 -->
    <p><?= $user->fishing_date->i18nFormat('YYYY年MM月dd日') ?></p>

    <!-- 改行ヘルパー ヘルパーは&thisからアクセスすることができる -->
    <!-- autoParagraphはｐタグが自動で取得されるので記述不要 -->
    <?= $this->Text->autoParagraph(h($user-> discription)) ?>

    <!-- 詳細ページへのリンク -->
    <a href="/users/view/<?= $user->id ?>" class="button">釣果情報の詳細</a> 
    <!-- ↑↓同じ -->
    <?= $this->Html->link('釣果情報の詳細',  [
        // 'controller' => 'Posts', ←同じコントローラーの場合は記述不要
        'action' => 'view',
        $user->id
    ],['class' => 'button']) ?>

<?php endforeach; ?>

<?php if($this->Paginator->total() > 1): ?> 
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< 最初') ?>
            <?= $this->Paginator->prev('< 前へ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('次へ >') ?>
            <?= $this->Paginator->last('最後 >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>