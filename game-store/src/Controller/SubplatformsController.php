<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subplatforms Controller
 *
 * @property \App\Model\Table\SubplatformsTable $Subplatforms
 *
 * @method \App\Model\Entity\Subplatform[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubplatformsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Platforms']
        ];
        $subplatforms = $this->paginate($this->Subplatforms);

        $this->set(compact('subplatforms'));
    }

    /**
     * View method
     *
     * @param string|null $id Subplatform id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subplatform = $this->Subplatforms->get($id, [
            'contain' => ['Platforms']
        ]);

        $this->set('subplatform', $subplatform);
    }

    public function getByPlatform() {
        $platform_id = $this->request->query('platform_id');

        $subplatforms = $this->Subplatforms->find('all', [
            'conditions' => ['Subplatforms.platform_id' => $platform_id]
        ]);
        $this->set('subplatforms', $subplatforms);
        $this->set('_serialize', ['subplatforms']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subplatform = $this->Subplatforms->newEntity();
        if ($this->request->is('post')) {
            $subplatform = $this->Subplatforms->patchEntity($subplatform, $this->request->getData());
            if ($this->Subplatforms->save($subplatform)) {
                $this->Flash->success(__('The subplatform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subplatform could not be saved. Please, try again.'));
        }
        $platforms = $this->Subplatforms->Platforms->find('list', ['limit' => 200]);
        $this->set(compact('subplatform', 'platforms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subplatform id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subplatform = $this->Subplatforms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subplatform = $this->Subplatforms->patchEntity($subplatform, $this->request->getData());
            if ($this->Subplatforms->save($subplatform)) {
                $this->Flash->success(__('The subplatform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subplatform could not be saved. Please, try again.'));
        }
        $platforms = $this->Subplatforms->Platforms->find('list', ['limit' => 200]);
        $this->set(compact('subplatform', 'platforms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subplatform id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subplatform = $this->Subplatforms->get($id);
        if ($this->Subplatforms->delete($subplatform)) {
            $this->Flash->success(__('The subplatform has been deleted.'));
        } else {
            $this->Flash->error(__('The subplatform could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $param = $this->request->getParam('pass.0');

        // Administrator
        if ($user['role_id'] === 1) {
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete', 'getByPlatform'])) {
                return true;
            }
        }
        // Staff 
        else if ($user['role_id'] === 2) {
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete', 'getByPlatform'])) {
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
