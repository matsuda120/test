<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FishingResults Controller
 *
 * @property \App\Model\Table\FishingResultsTable $FishingResults
 * @method \App\Model\Entity\FishingResult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FishingResultsController extends AppController
{
    /**
     * Initialization method
     */
    public function initialize()
    {
        // 【松浦 6/1】
        // ログアウトと新規登録画面にはユーザー認証なしでアクセス可能となる記述
        // parent::initialize();
        // $this->Auth->allow(['logout', 'add']);
        
        //レイアウト指定
        $this->viewBuilder()->setLayout('head');
    }

    /**
     * isAuthorized method
     * 
     * 【松浦 6/1】
     * ユーザーのIDが一致した時のみ修正と削除ができるようにする
     * ログインしている自分以外のユーザーが情報の修正・削除ができない
     */
    // public function isAuthorized($user)
    // {
    //     $id = $this->request->getParam('pass.0');
 
    //     if ($id == $user['id']) {
    //         return true;
    //     }
 
    //     return false;
    // }

//     /**
//      * isAuthorized method
//      */
//     public function isAuthorized($user)
//     {

//         //　ログインしているユーザーは釣果を「登録」「修正」「削除」できる　？？？
//         $action = $this->request->getParam('action');
//          if (in_array($action, ['add', 'edit', 'delete'])) {
//              return true;
//         }

//         //　？？？
//         $action = $this->request->getParam('action');
//         if (in_array($action, ['add', 'weathers'])) {
//             return true;
//         }

//         //　？？？
//         $action = $this->request->getParam('action');
//         if (in_array($action, ['add', 'prefectures'])) {
//             return true;
//         }

//         //　？？？
//         $action = $this->request->getParam('action');
//         if (in_array($action, ['add', 'fishingTypes'])) {
//             return true;
//         }
        
        
//         $slug = $this->request->getParam('pass.0');
//         if (!$slug) {
//             return false;
//         }
 
//         $fishingResult = $this->FishingResults->findBySlug($slug)->first();
 
//         return $fishingResult->user_id === $user['id'];
//     }
// }



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
        $title = '釣果一覧画面';

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
                $this->Flash->success(__('釣果登録完了しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('釣果登録エラー'));
        }
        $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);
        $users = $this->FishingResults->Users->find('list', ['limit' => 200]);
        $lists = ['（えさ）', '（ルアー）'];
        $mlists = ['ｍ', 'ｃｍ'];
        $glists = ['ｋｇ', 'ｇ'];
        $this->set(compact('fishingResult', 'weathers', 'prefectures', 'fishingTypes', 'users', 'lists', 'mlists', 'glists'));
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
        $lists = ['（えさ）', '（ルアー）'];
        $mlists = ['ｍ', 'ｃｍ'];
        $glists = ['ｋｇ', 'ｇ'];
        $this->set(compact('fishingResult', 'weathers', 'prefectures', 'fishingTypes', 'users', 'lists', 'mlists', 'glists'));
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
     * search method  未実装
     */
    public function search()
    {
    }

    /**
     * columchange method　未実装
     */
    public function columchange()
    {
    }

}
