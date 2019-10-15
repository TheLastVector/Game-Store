<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GamesUsers Controller
 *
 * @property \App\Model\Table\GamesUsersTable $GamesUsers
 *
 * @method \App\Model\Entity\GamesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GamesUsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        /*$this->Auth->allow(['buy', 'signUp']);*/
        /*$this->Auth->deny(['']);*/
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Games']
        ];
        $gamesUsers = $this->paginate($this->GamesUsers);

        $this->set(compact('gamesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Games User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gamesUser = $this->GamesUsers->get($id, [
            'contain' => ['Users', 'Games']
        ]);

        $this->set('gamesUser', $gamesUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gamesUser = $this->GamesUsers->newEntity();
        if ($this->request->is('post')) {
            $gamesUser = $this->GamesUsers->patchEntity($gamesUser, $this->request->getData());
            if ($this->GamesUsers->save($gamesUser)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $users = $this->GamesUsers->Users->find('list', ['limit' => 200]);
        $games = $this->GamesUsers->Games->find('list', ['limit' => 200]);
        $this->set(compact('gamesUser', 'users', 'games'));
    }

    public function buy($gameId = null)
    {
        $loggedUser = $this->request->getSession()->read('Auth.User');

        $user = $this->GamesUsers->Users->get($loggedUser['id']);
        $game = $this->GamesUsers->Games->get($gameId);
        $gamesUser = $this->GamesUsers->newEntity();

        $gamesUser = $this->GamesUsers->newEntity();
        if ($this->request->is('post')) {
            $gamesUser = $this->GamesUsers->patchEntity($gamesUser, $this->request->getData());
            if ($this->GamesUsers->save($gamesUser)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $gamesUser->user_id]);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }

        $this->set(compact('gamesUser', 'user', 'game'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Games User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gamesUser = $this->GamesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gamesUser = $this->GamesUsers->patchEntity($gamesUser, $this->request->getData());
            if ($this->GamesUsers->save($gamesUser)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $users = $this->GamesUsers->Users->find('list', ['limit' => 200]);
        $games = $this->GamesUsers->Games->find('list', ['limit' => 200]);
        $this->set(compact('gamesUser', 'users', 'games'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Games User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gamesUser = $this->GamesUsers->get($id);
        if ($this->GamesUsers->delete($gamesUser)) {
            $this->Flash->success(__('The purchase has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $param = $this->request->getParam('pass.0');

        // Administrator
        if ($user['role_id'] === 1) {
            if (in_array($action, ['index', 'view', 'buy', 'add', 'edit', 'delete'])) {
                return true;
            }
        }
        // Staff 
        else if ($user['role_id'] === 2) {
            if (in_array($action, ['index', 'view', 'buy', 'add', 'edit', 'delete'])) {
                return true;
            }
        }
        // Client
        else if ($user['role_id'] === 3) { 
            if (in_array($action, ['view', 'buy'])){
                return true;
            }
        }else {
            return false;
        }

        return false;
    }
}
