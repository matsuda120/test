<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Weathers Controller
 *
 * @property \App\Model\Table\WeathersTable $Weathers
 *
 * @method \App\Model\Entity\Weather[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WeathersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $weathers = $this->paginate($this->Weathers);

        $this->set(compact('weathers'));
    }

    /**
     * View method
     *
     * @param string|null $id Weather id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weather = $this->Weathers->get($id, [
            'contain' => ['FishingResults'],
        ]);

        $this->set('weather', $weather);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weather = $this->Weathers->newEntity();
        if ($this->request->is('post')) {
            $weather = $this->Weathers->patchEntity($weather, $this->request->getData());
            if ($this->Weathers->save($weather)) {
                $this->Flash->success(__('The weather has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weather could not be saved. Please, try again.'));
        }
        $this->set(compact('weather'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Weather id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weather = $this->Weathers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weather = $this->Weathers->patchEntity($weather, $this->request->getData());
            if ($this->Weathers->save($weather)) {
                $this->Flash->success(__('The weather has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weather could not be saved. Please, try again.'));
        }
        $this->set(compact('weather'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Weather id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weather = $this->Weathers->get($id);
        if ($this->Weathers->delete($weather)) {
            $this->Flash->success(__('The weather has been deleted.'));
        } else {
            $this->Flash->error(__('The weather could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
