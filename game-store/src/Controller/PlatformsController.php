<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Platforms Controller
 *
 * @property \App\Model\Table\PlatformsTable $Platforms
 *
 * @method \App\Model\Entity\Platform[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlatformsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $platforms = $this->paginate($this->Platforms);

        $this->set(compact('platforms'));
    }

    /**
     * View method
     *
     * @param string|null $id Platform id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $platform = $this->Platforms->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('platform', $platform);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $platform = $this->Platforms->newEntity();
        if ($this->request->is('post')) {
            $platform = $this->Platforms->patchEntity($platform, $this->request->getData());
            if ($this->Platforms->save($platform)) {
                $this->Flash->success(__('The platform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The platform could not be saved. Please, try again.'));
        }
        $games = $this->Platforms->Games->find('list', ['limit' => 200]);
        $this->set(compact('platform', 'games'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Platform id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $platform = $this->Platforms->get($id, [
            'contain' => ['Games']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $platform = $this->Platforms->patchEntity($platform, $this->request->getData());
            if ($this->Platforms->save($platform)) {
                $this->Flash->success(__('The platform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The platform could not be saved. Please, try again.'));
        }
        $games = $this->Platforms->Games->find('list', ['limit' => 200]);
        $this->set(compact('platform', 'games'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Platform id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $platform = $this->Platforms->get($id);
        if ($this->Platforms->delete($platform)) {
            $this->Flash->success(__('The platform has been deleted.'));
        } else {
            $this->Flash->error(__('The platform could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
