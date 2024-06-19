<!DOCTYPE html>
<html>
<head>
    <?php
        echo $this->Html->charset();
        $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
        $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
    ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');
        echo $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
        echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css');
        echo $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js');
        echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
        echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js');
        echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <script>
    $(document).ready(function(){
        // Flashメッセージが存在する場合は5秒後にフェードアウト
        $('#flashMessage').length && setTimeout(function(){
            $('#flashMessage').fadeOut('slow');
        }, 2000);
    });
    </script>
    <style>
        #toolbar {
            background-color: #333;
            overflow: hidden;
        }

        #toolbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #toolbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?php echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
        </div>
        
        <!-- ログイン済みの場合にのみツールバーを表示 -->
        <?php if ($this->Session->check('Auth.User')): ?>
        <div id="toolbar">
            <?php echo $this->Html->link('To Doリスト', array('controller' => 'tasks', 'action' => 'index')); ?>
            <?php echo $this->Html->link('カレンダー', array('controller' => 'tasks', 'action' => 'calendar')); ?>
            <?php echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout')); ?>
        </div>
        <?php endif; ?>

        <div id="content">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
            <?php echo $this->Html->link(
                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                    'https://cakephp.org/',
                    array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                );
            ?>
            <p>
                <?php echo $cakeVersion; ?>
            </p>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
    <div id="flashMessage">
        <!-- Flashメッセージの表示 -->
        <?php echo $this->Session->flash('flashMessage', array('id' => 'flashMessage')); ?>
    </div>
</body>
</html>
