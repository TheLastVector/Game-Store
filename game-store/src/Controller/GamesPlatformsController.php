<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GamesPlatforms Controller
 *
 * @property \App\Model\Table\GamesPlatformsTable $GamesPlatforms
 *
 * @method \App\Model\Entity\GamesPlatform[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GamesPlatformsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Games', 'Platforms']
        ];
        $gamesPlatforms = $this->paginate($this->GamesPlatforms);

        $this->set(compact('gamesPlatforms'));
    }

    /**
     * View method
     *
     * @param string|null $id Games Platform id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gamesPlatform = $this->GamesPlatforms->get($id, [
            'contain' => ['Games', 'Platforms']
        ]);

        $this->set('gamesPlatform', $gamesPlatform);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gamesPlatform = $this->GamesPlatforms->newEntity();
        if ($this->request->is('post')) {
            $gamesPlatform = $this->GamesPlatforms->patchEntity($gamesPlatform, $this->request->getData());
            if ($this->GamesPlatforms->save($gamesPlatform)) {
                $this->Flash->success(__('The platform association to the game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The platform association to the game could not be saved. Please, try again.'));
        }


        $games = $this->GamesPlatforms->Games->find('list', ['limit' => 200]);

        // Bâtir la liste des plateformes
        $this->loadModel('Platforms');
        $platforms = $this->GamesPlatforms->Platforms->find('list', ['limit' => 200]);

        // Extraire l'id de la première plateforme
        $platforms = $platforms->toArray();
        reset($platforms);
        $platform_id = key($platforms);

        $subplatforms = $this->Platforms->Subplatforms->find('list', ['conditions' => ['Subplatforms.platform_id' => $platform_id]]);

        $this->set(compact('gamesPlatform', 'games', 'platforms', 'subplatforms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Games Platform id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gamesPlatform = $this->GamesPlatforms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gamesPlatform = $this->GamesPlatforms->patchEntity($gamesPlatform, $this->request->getData());
            if ($this->GamesPlatforms->save($gamesPlatform)) {
                $this->Flash->success(__('The platform association to the game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The platform association to the game could not be saved. Please, try again.'));
        }
        $games = $this->GamesPlatforms->Games->find('list', ['limit' => 200]);
        $platforms = $this->GamesPlatforms->Platforms->find('list', ['limit' => 200]);
        $this->set(compact('gamesPlatform', 'games', 'platforms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Games Platform id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gamesPlatform = $this->GamesPlatforms->get($id);
        if ($this->GamesPlatforms->delete($gamesPlatform)) {
            $this->Flash->success(__('The platform association to the game has been deleted.'));
        } else {
            $this->Flash->error(__('The platform association to the game could not be deleted. Please, try again.'));
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
