<?php
namespace App\Controller;

use App\Controller\AppController;
// ???
use Cake\Utility\Text;

/**
 * FishingResults Controller
 *
 * @property \App\Model\Table\FishingResultsTable $FishingResults
 *
 * @method \App\Model\Entity\FishingResult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FishingResultsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Weathers', 'Prefectures', 'FishingTypes', 'Users'],
        ];
        $fishingResults = $this->paginate($this->FishingResults);

        $this->set(compact('fishingResults'));
    }

    /**
     * View method
     *
     * @param string|null $id Fishing Result id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fishingResult = $this->FishingResults->get($id, [
            'contain' => ['Weathers', 'Prefectures', 'FishingTypes', 'Users'],
        ]);

        $this->set('fishingResult', $fishingResult);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fishingResult = $this->FishingResults->newEntity();
        if ($this->request->is('post')) {
            $fishingResult = $this->FishingResults->patchEntity($fishingResult, $this->request->getData());

            $query = $this->request->getData(); // POSTデータの取得
            $query['user_id'] = $this->Auth->user('id'); // ユーザーidの追加

            $fishingResult = $this->FishingResults->patchEntity($fishingResult, $query);

            if ($this->FishingResults->save($fishingResult)) {
                $this->Flash->success(__('The fishing result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fishing result could not be saved. Please, try again.'));
        }
        $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);
        $users = $this->FishingResults->Users->find('list', ['limit' => 200]);
        $this->set(compact('fishingResult', 'weathers', 'prefectures', 'fishingTypes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fishing Result id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fishingResult = $this->FishingResults->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fishingResult = $this->FishingResults->patchEntity($fishingResult, $this->request->getData());
            if ($this->FishingResults->save($fishingResult)) {
                $this->Flash->success(__('The fishing result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fishing result could not be saved. Please, try again.'));
        }
        $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);
        $users = $this->FishingResults->Users->find('list', ['limit' => 200]);
        $this->set(compact('fishingResult', 'weathers', 'prefectures', 'fishingTypes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fishing Result id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fishingResult = $this->FishingResults->get($id);
        if ($this->FishingResults->delete($fishingResult)) {
            $this->Flash->success(__('The fishing result has been deleted.'));
        } else {
            $this->Flash->error(__('The fishing result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * isAuthorized method
     */
    public function isAuthorized($user)
    {

        //　ログインしているユーザーは釣果を「登録」「修正」「削除」できる　？？？
        $action = $this->request->getParam('action');
         if (in_array($action, ['add', 'edit', 'delete'])) {
             return true;
        }

        //　？？？
        $action = $this->request->getParam('action');
        if (in_array($action, ['add', 'weathers'])) {
            return true;
        }

        //　？？？
        $action = $this->request->getParam('action');
        if (in_array($action, ['add', 'prefectures'])) {
            return true;
        }

        //　？？？
        $action = $this->request->getParam('action');
        if (in_array($action, ['add', 'fishingTypes'])) {
            return true;
        }
        
        
        // $slug = $this->request->getParam('pass.0');
        // if (!$slug) {
        //     return false;
        // }
 
        //$fishingResult = $this->FishingResults->findBySlug($slug)->first();
 
        return $fishingResult->user_id === $user['id'];
    }
}
