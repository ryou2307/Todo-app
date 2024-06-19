<?php
class User extends AppModel {
    public $hasMany = array(
        'Task' => array(
            'className' => 'Task',
            'foreignKey' => 'user_id',
            'dependent' => true
        )
    );

    public $validate = array(
        'username' => array(
            'rule' => 'notBlank'
        ),
        'password' => array(
            'rule' => 'notBlank'
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}
?>
