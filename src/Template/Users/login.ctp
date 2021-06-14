<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
echo $this->Html->css('index');
echo $this->Html->css('login');
echo $this->Html->css('ikenodesign');
?>

<!DOCTYPE html>
    <html>
    
      <head>
      
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      </head>
      <div class="container">

      <!-- メニュー -->
<!-- <div class="h-menu">
     <input id="h-menu_checkbox" class="h-menuCheckbox" type="checkbox">
      <label class="h-menu_icon" for="h-menu_checkbox"><span class="hamburger-icon"></span></label>
      <label id="h-menu_black" class="h-menuCheckbox" for="h-menu_checkbox"></label>
      <div id="h-menu_content">
        <ul>
        <li>?= $this->Html->link(__('検索'), ['action' => 'find']) ?></li>
        <li>?= $this->Html->link(__('項目切替'), ['action' => 'filter']) ?></li>
        <li>?= $this->Html->link(__('釣果一覧'), ['action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?></li>
        </ul>
      </div>
</div> -->

<div class="users form">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
  <fieldset>
    <legend><?= __('ユーザ名とパスワードを入力してください') ?></legend>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('password') ?>
  </fieldset>
  <?= $this->Form->button(__('Login')); ?>
  <?= $this->Form->end() ?>
</div>


  <div class="screen">
    <div class="screen__content">
      <form class="login">
        <div class="login__field">    
     <i class="login__icon fas fa-user"></i>
      <input type="text" class="login__input" placeholder="User name / Email">
          <div class="profile-solid icon"></div>
        </div>
        <div class="login__field">
          <i class="login__icon fas fa-lock"></i>
          <input type="password" class="login__input" placeholder="Password">
        </div>
        <button class="button login__submit">
          <span class="button__text">ログイン</span>
          <i class="button__icon fas fa-chevron-right"></i>
        </button>       
        <div class="touroku">
          <a href="/my-project/users/add">会員登録はこちらから</a></div>
      </form>
      </div>
    <div class="screen__background">
      <span class="screen__background__shape screen__background__shape4"></span>
      <span class="screen__background__shape screen__background__shape3"></span>    
      <span class="screen__background__shape screen__background__shape2"></span>
      <span class="screen__background__shape screen__background__shape1"></span>
    </div>    
  </div>
</div>

</html>