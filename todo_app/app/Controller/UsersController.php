<?php
class UsersController extends AppController {
    public $components = array('Auth', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login');
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('登録が成功しました。ログインしてください。'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Flash->error(__('ユーザの作成に失敗しました。'));
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ユーザ名、またはパスワードが違います。'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
?>
