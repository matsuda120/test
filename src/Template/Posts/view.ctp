<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>

<h1><?= $post->$title ?></h1>
<p><?= $post->body ?></p>


<div class="content">
<?php foreach ($posts as $post): ?> 
    <h3><?= $post-> title ?></h3>
    <p><?= $post-> discription ?></p>
<?php endforeach; ?>