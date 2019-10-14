<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GamesTags Controller
 *
 * @property \App\Model\Table\GamesTagsTable $GamesTags
 *
 * @method \App\Model\Entity\GamesTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GamesTagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Games', 'Tags']
        ];
        $gamesTags = $this->paginate($this->GamesTags);

        $this->set(compact('gamesTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Games Tag id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gamesTag = $this->GamesTags->get($id, [
            'contain' => ['Games', 'Tags']
        ]);

        $this->set('gamesTag', $gamesTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gamesTag = $this->GamesTags->newEntity();
        if ($this->request->is('post')) {
            $gamesTag = $this->GamesTags->patchEntity($gamesTag, $this->request->getData());
            if ($this->GamesTags->save($gamesTag)) {
                $this->Flash->success(__('The games tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The games tag could not be saved. Please, try again.'));
        }
        $games = $this->GamesTags->Games->find('list', ['limit' => 200]);
        $tags = $this->GamesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('gamesTag', 'games', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Games Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gamesTag = $this->GamesTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gamesTag = $this->GamesTags->patchEntity($gamesTag, $this->request->getData());
            if ($this->GamesTags->save($gamesTag)) {
                $this->Flash->success(__('The games tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The games tag could not be saved. Please, try again.'));
        }
        $games = $this->GamesTags->Games->find('list', ['limit' => 200]);
        $tags = $this->GamesTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('gamesTag', 'games', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Games Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gamesTag = $this->GamesTags->get($id);
        if ($this->GamesTags->delete($gamesTag)) {
            $this->Flash->success(__('The games tag has been deleted.'));
        } else {
            $this->Flash->error(__('The games tag could not be deleted. Please, try again.'));
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
            return false;
        }else {
            return false;
        }

        return false;
    }
}
