<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FishingTypes Controller
 *
 * @property \App\Model\Table\FishingTypesTable $FishingTypes
 *
 * @method \App\Model\Entity\FishingType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FishingTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $fishingTypes = $this->paginate($this->FishingTypes);

        $this->set(compact('fishingTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Fishing Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fishingType = $this->FishingTypes->get($id, [
            'contain' => ['FishingResults'],
        ]);

        $this->set('fishingType', $fishingType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fishingType = $this->FishingTypes->newEntity();
        if ($this->request->is('post')) {
            $fishingType = $this->FishingTypes->patchEntity($fishingType, $this->request->getData());
            if ($this->FishingTypes->save($fishingType)) {
                $this->Flash->success(__('The fishing type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fishing type could not be saved. Please, try again.'));
        }
        $this->set(compact('fishingType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fishing Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fishingType = $this->FishingTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fishingType = $this->FishingTypes->patchEntity($fishingType, $this->request->getData());
            if ($this->FishingTypes->save($fishingType)) {
                $this->Flash->success(__('The fishing type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fishing type could not be saved. Please, try again.'));
        }
        $this->set(compact('fishingType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fishing Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fishingType = $this->FishingTypes->get($id);
        if ($this->FishingTypes->delete($fishingType)) {
            $this->Flash->success(__('The fishing type has been deleted.'));
        } else {
            $this->Flash->error(__('The fishing type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
