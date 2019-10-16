<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FilesGames Controller
 *
 * @property \App\Model\Table\FilesGamesTable $FilesGames
 *
 * @method \App\Model\Entity\FilesGame[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesGamesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Games', 'Files']
        ];
        $filesGames = $this->paginate($this->FilesGames);

        $this->set(compact('filesGames'));
    }

    /**
     * View method
     *
     * @param string|null $id Files Game id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filesGame = $this->FilesGames->get($id, [
            'contain' => ['Games', 'Files']
        ]);

        $this->set('filesGame', $filesGame);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filesGame = $this->FilesGames->newEntity();
        if ($this->request->is('post')) {
            $filesGame = $this->FilesGames->patchEntity($filesGame, $this->request->getData());
            if ($this->FilesGames->save($filesGame)) {
                $this->Flash->success(__('The files game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The files game could not be saved. Please, try again.'));
        }
        $games = $this->FilesGames->Games->find('list', ['limit' => 200]);
        $files = $this->FilesGames->Files->find('list', ['limit' => 200]);
        $this->set(compact('filesGame', 'games', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Files Game id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filesGame = $this->FilesGames->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filesGame = $this->FilesGames->patchEntity($filesGame, $this->request->getData());
            if ($this->FilesGames->save($filesGame)) {
                $this->Flash->success(__('The files game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The files game could not be saved. Please, try again.'));
        }
        $games = $this->FilesGames->Games->find('list', ['limit' => 200]);
        $files = $this->FilesGames->Files->find('list', ['limit' => 200]);
        $this->set(compact('filesGame', 'games', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Files Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filesGame = $this->FilesGames->get($id);
        if ($this->FilesGames->delete($filesGame)) {
            $this->Flash->success(__('The files game has been deleted.'));
        } else {
            $this->Flash->error(__('The files game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
