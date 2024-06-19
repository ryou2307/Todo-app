<h2>サインアップ</h2>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => 'ユーザ名'));
echo $this->Form->input('password', array(
    'label' => 'パスワード',
    'type' => 'password'
));
echo $this->Form->input('confirm_password', array(
    'label' => 'パスワードの確認',
    'type' => 'password'
));
echo $this->Form->end('サインアップ');
?>
<p><?php echo $this->Html->link('ログインページに戻る', array('controller' => 'users', 'action' => 'login')); ?></p>
