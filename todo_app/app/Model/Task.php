<?php
class Task extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'due_date' => array(
            'rule' => 'date'
        ),
        'priority' => array(
            'rule' => 'notBlank'
        ),
        'details' => array(
            'rule' => 'notBlank'
        )
    );
}
?>
