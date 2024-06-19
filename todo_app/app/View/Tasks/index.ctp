<h1>To Doリスト</h1>
<table>
    <tr>
        <th>優先度</th>
        <th>タスク名</th>
        <th>期限</th>
        <th>操作</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
    <tr>
        <td><?php echo h($task['Task']['priority']); ?></td>
        <td><?php echo h($task['Task']['title']); ?></td>
        <td><?php echo h($task['Task']['due_date']); ?></td>
        <td>
            <?php echo $this->Html->link('詳細確認', array('action' => 'view', $task['Task']['id'])); ?>
            <?php echo $this->Html->link('編集', array('action' => 'edit', $task['Task']['id'])); ?>
            <?php echo $this->Form->postLink(
                '完了',
                array('action' => 'delete', $task['Task']['id']),
                array('confirm' => '削除してもよろしいですか？')
            ); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Html->link('タスクを追加', array('action' => 'add')); ?>
