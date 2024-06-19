<?php
class AppController extends Controller {
    public $components = array(
        'Session',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'tasks', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'ユーザ名、またはパスワードが違います。',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'username', 'password' => 'password')
                )
            )
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'login');
        
        // ユーザーがログインしていない場合はログインページにリダイレクト
        if (!$this->Auth->loggedIn() && $this->request->action !== 'login' && $this->request->action !== 'register') {
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }

        // ログイン後、ログイン画面とサインアップ画面にアクセスできないようにする
        if ($this->Auth->loggedIn() && ($this->request->action === 'login' || $this->request->action === 'register')) {
            return $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        }
    }
}
?>
