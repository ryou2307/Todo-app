<?php
class TasksController extends AppController {
    public $components = array('Auth', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    public function index() {
        $userId = $this->Auth->user('id');
        $this->set('tasks', $this->Task->find('all', array(
            'conditions' => array('Task.user_id' => $userId),
            'order' => array('Task.priority ASC', 'Task.due_date ASC')
        )));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid task'));
        }

        $task = $this->Task->findById($id);
        if (!$task || $task['Task']['user_id'] != $this->Auth->user('id')) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->set('task', $task);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Task->create();
            $this->request->data['Task']['user_id'] = $this->Auth->user('id');
            if ($this->Task->save($this->request->data)) {
                $this->Flash->success(__('Your task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your task.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid task'));
        }

        $task = $this->Task->findById($id);
        if (!$task || $task['Task']['user_id'] != $this->Auth->user('id')) {
            throw new NotFoundException(__('Invalid task'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Task->id = $id;
            if ($this->Task->save($this->request->data)) {
                $this->Flash->success(__('Your task has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your task.'));
        }

        if (!$this->request->data) {
            $this->request->data = $task;
        }
    }

    public function delete($id) {
        if ($this->request->is('post')) {
            $task = $this->Task->findById($id);
            if (!$task || $task['Task']['user_id'] != $this->Auth->user('id')) {
                throw new NotFoundException(__('Invalid task'));
            }

            if ($this->Task->delete($id)) {
                $this->Flash->success(__('The task with id: %s has been deleted.', h($id)));
            } else {
                $this->Flash->error(__('The task with id: %s could not be deleted.', h($id)));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function calendar() {
        $userId = $this->Auth->user('id');
        $this->set('tasks', $this->Task->find('all', array(
            'conditions' => array('Task.user_id' => $userId),
            'order' => array('Task.due_date ASC')
        )));
    }
}
?>
