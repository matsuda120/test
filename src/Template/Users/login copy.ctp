<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- 【松浦　6/14】 -->

<style>
  /* layout */
  body,
  p,
  form,
  input {
    margin: 0
  }

  #form {
    width: 400px;
    margin: 30px auto;
    padding: 20px;
    border: 1px solid #555;
  }

  form p {
    font-size: 14px;
  }

  .form-title {
    text-align: center;
  }

  .userid,
  .password {
    margin-bottom: 20px;
  }

  input[type="userid"],
  input[type="password"] {
    width: 300px;
    padding: 4px;
    font-size: 14px;
  }

  .submit {
    text-align: right;
  }

  /* font */
  #form font {
    color: #077685;
    font-weight: bold;
  }

  #form .form-title {
    font-family: Arial;
    font-size: 30px;
    color: #4eb4c2;
  }

  /* skin */
  #form {
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0px 1px 10px #488a9e;
    -moz-box-shadow: 0px 1px 10px #488a9e;
    box-shadow: 0px 1px 10px #488a9e;
    border: solid #4eb4c2 1px;
    background: #fafafa;
  }

  #form .form-title {
    padding-bottom: 6px;
    border-bottom: 2px solid #4eb4c2;
    margin-bottom: 20px;
  }

  button {
    font-family: Arial;
    color: #ffffff;
    font-size: 16px;
    padding-top: 10px;
    padding-right: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    text-decoration: none;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 0px 8px 6px #e3e3e3;
    -moz-box-shadow: 0px 8px 6px #e3e3e3;
    box-shadow: 0px 8px 6px #e3e3e3;
    border: solid #f5fdff 4px;
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#61c7e0), to(#418da8));
    background: -moz-linear-gradient(top, #61c7e0, #418da8);
  }

  .submit input:hover {
    background: #37a4bf;

  }

  #form p a {
    color: #1798a5;
    text-align: left;
  }
</style>

<div id="form">
  <p class="form-title">ログイン</p>
  <form action="post">
    <p class="font">ユーザーID</p>
    <p class="mail"><input type="email" name="mail" /></p>
    <p class="font">パスワード</p>
    <p class="pass"><input type="password" name="pass" /></p>
    <p><a href-"飛ばすところ">会員登録はこちらから</a></p>

    <p class="submit"><input type="submit" value="Login" /></p>
  </form>
</div>

<div id="form">
  <p class="form-title">ログイン</p>
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
  <p class="font">ユーザーID</p>
  <?= $this->Form->control('userid', ['label' => 'ユーザーＩＤ']) ?>
  <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
  <?= $this->Form->button(__('ログイン')); ?>
  <?= $this->Form->end() ?>
</div>