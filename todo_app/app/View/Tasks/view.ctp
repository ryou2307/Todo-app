<h1>タスク詳細</h1>
<p><strong>タスク名:</strong> <?php echo h($task['Task']['title']); ?></p>
<p><strong>期限:</strong> <?php echo h($task['Task']['due_date']); ?></p>
<p>
    <strong>詳細:</strong>
    <?php echo nl2br(h($task['Task']['details'])); ?>
</p>
<p><strong>作成日時:</strong> <?php echo h($task['Task']['created']); ?></p>
<p><strong>最終編集日時:</strong> <?php echo h($task['Task']['modified']); ?></p>
<?php echo $this->Html->link('編集 ', array('action' => 'edit', $task['Task']['id'])); ?>
<?php echo $this->Form->postLink(
    '削除 ',
    array('action' => 'delete', $task['Task']['id']),
    array('confirm' => '本当に削除してもよろしいですか？')
); ?>
<?php echo $this->Html->link('戻る', array('action' => 'index')); ?>
