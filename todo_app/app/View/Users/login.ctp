<h2>ログイン</h2>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => 'ユーザ名'));
echo $this->Form->input('password', array(
    'label' => 'パスワード',
    'type' => 'password'
));
echo $this->Form->end('ログイン');
?>
<p><?php echo $this->Html->link('アカウントを作成する', array('controller' => 'users', 'action' => 'register')); ?></p>
