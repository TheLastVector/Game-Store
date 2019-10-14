<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 *
 * @method \App\Model\Entity\Game[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GamesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index', 'view']);
        /*$this->Auth->deny(['index']);*/
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $games = $this->paginate($this->Games);

        $this->set(compact('games'));
    }

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Platforms', 'Tags', 'Users']
        ]);

        $this->set('game', $game);
    }

    public function buy($id = null) {
        $game = $this->Games->get($id, [
            'contain' => ['Platforms', 'Tags', 'Users']
        ]);

        return $this->redirect(['controller' => 'GamesUsers' , 'action' => 'buy', $game -> id]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $game = $this->Games->newEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $platforms = $this->Games->Platforms->find('list', ['limit' => 200]);
        $tags = $this->Games->Tags->find('list', ['limit' => 200]);
        $users = $this->Games->Users->find('list', ['limit' => 200]);
        $this->set(compact('game', 'platforms', 'tags', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Platforms', 'Tags', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $platforms = $this->Games->Platforms->find('list', ['limit' => 200]);
        $tags = $this->Games->Tags->find('list', ['limit' => 200]);
        $users = $this->Games->Users->find('list', ['limit' => 200]);
        $this->set(compact('game', 'platforms', 'tags', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
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
