<h1>タスクを追加</h1>
<?php
echo $this->Html->script('jquery');
echo $this->Html->script('jquery-ui');
echo $this->Html->script('datepicker-ja');
echo $this->Html->css('jquery-ui');

echo $this->Form->create('Task');
echo $this->Form->input('title', array('label' => 'タスク名'));
echo $this->Form->input('details', array(
    'label' => '詳細',
    'type' => 'textarea'
));
echo $this->Form->input('due_date', array(
    'type' => 'text', // ここを 'date' から 'text' に変更します
    'label' => '期限',
    'class' => 'datepicker',
    'placeholder' => 'YYYY-MM-DD'
));

echo $this->Form->input('priority', array(
    'label' => '優先度',
    'options' => array(
        'S' => 'S',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C'
    )
));

echo $this->Form->end('追加');
echo $this->Html->link('戻る', array('action' => 'index'));
?>

<script>
$(function() {
    $.datepicker.regional['ja'] = {
        closeText: '閉じる',
        prevText: '&#x3C;前',
        nextText: '次&#x3E;',
        currentText: '今日',
        monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
        monthNamesShort: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
        dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
        dayNamesShort: ['日','月','火','水','木','金','土'],
        dayNamesMin: ['日','月','火','水','木','金','土'],
        weekHeader: '週',
        dateFormat: 'yy-mm-dd',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: '年'
    };
    $.datepicker.setDefaults($.datepicker.regional['ja']);

    $(".datepicker").datepicker();
});
</script>
