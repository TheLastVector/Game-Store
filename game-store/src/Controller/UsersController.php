<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->viewBuilder()->setLayout('default');

        $this->Auth->allow(['logout', 'signUp']);
        $this->Auth->deny(['index']);
    }

    /**
     * Sign up method
     *
     * @return \Cake\Http\Response|null Redirects on successful sign up, renders view otherwise.
     */
    public function signUp()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($newUser = $this->Users->save($user)) {
                $this->Flash->success(__('You have successfully signed up. Login to acces your account.'));

                return $this->redirect(['action' => 'login']);
                /*return $this->redirect(['controller' => 'GamesUsers' , 'action' => 'buy', $newUser -> id]);*/
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $languages = $this->Users->Languages->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $games = $this->Users->Games->find('list', ['limit' => 200]);
        $this->set(compact('user', 'languages', 'roles', 'games'));
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect(['controller' => 'Users' , 'action' => 'view', $user['id']]);
                /*return $this->redirect($this->Auth->redirectUrl());*/
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'Roles']
        ];

        $informations = $this->Users;

        $users = $this->paginate($informations);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Languages', 'Roles', 'Games']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($newUser = $this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
                /*return $this->redirect(['controller' => 'GamesUsers' , 'action' => 'buy', $newUser -> id]);*/
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $languages = $this->Users->Languages->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $games = $this->Users->Games->find('list', ['limit' => 200]);
        $this->set(compact('user', 'languages', 'roles', 'games'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Games']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $languages = $this->Users->Languages->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $games = $this->Users->Games->find('list', ['limit' => 200]);
        $this->set(compact('user', 'languages', 'roles', 'games'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $param = $this->request->getParam('pass.0');

        // Administrator
        if ($user['role_id'] === 1) {
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
                return true;
            }
        }
        // Staff 
        else if ($user['role_id'] === 2) {
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete'])) {
                return true;
            }
        }
        // Client
        else if ($user['role_id'] === 3) { 
            if (in_array($action, ['view', 'edit']) && $param == $user['id']){
                return true;
            }
        }else {
            return false;
        }

        return false;
    }
}
