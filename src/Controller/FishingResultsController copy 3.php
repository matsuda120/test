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
        //parent::initialize();
        // $this->Auth->allow(['logout', 'add']);
        
        //レイアウト指定
        $this->viewBuilder()->setLayout('ikenodesign');
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

    //     $open_window = $this->Session->read('open_window');
    // $this->set(compact('open_window'));
    // $this->Session->delete('open_window'); 

        $this->set('fishingResults', $this->FishingResults->find('all'));

        $this->paginate = [
            'contain' => ['Weathers', 'Prefectures', 'FishingTypes', 'Users'],
        ];
        $fishingResults = $this->paginate($this->FishingResults);

        //コントローラーからビューに渡す記述
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

        //コントローラーからビューに渡す記述
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

        //POST送信されたことをチェックする
        if ($this->request->is('post')) {
            $fishingResult = $this->FishingResults->patchEntity($fishingResult, $this->request->getData());

            // $query = $this->request->getData(); // POSTデータの取得
            // $query['user_id'] = $this->Auth->user('id'); // ユーザーidの追加


            //$fishingResult = $this->FishingResults->patchEntity($fishingResult, $query);


            //dataの引数には、取り出したいフォームの名前を指定
            //$変数 = $this->request->data('hoge');



            // $str = $this->request->data('text1');
            // if ($str != null){
            //     $str = $this->request->data['text1'];
            //     $this->set('message', 'you typed:' . $str);
            // } else {
            //     $this->set('message','please type...');
            // }


            //[your id:1001, name:john]
            // $id = $this->request->query('id');
            // $name = $this->request->query('name');
            // $this->set('message', 'your id:' . $id . ', name:' . $name);


            //登録成功したら初期画面に戻る記述
            if ($this->FishingResults->save($fishingResult)) {
                //$this->Flash->success(__('釣果登録完了しました'));
                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('釣果登録エラー'));
        }
        $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);
        $users = $this->FishingResults->Users->find('list', ['limit' => 200]);
        $fishLists = $this->FishingResults->find('list', ['keyField' => 'fish_type', 'valueField' => 'fish_type']);
        $cityLists = $this->FishingResults->find('list', ['keyField' => 'city', 'valueField' => 'city']);
        $spotLists = $this->FishingResults->find('list', ['keyField' => 'spot', 'valueField' => 'spot']);
        $lureFeedNameLists = $this->FishingResults->find('list', ['keyField' => 'lure_feed_name', 'valueField' => 'lure_feed_name']);

        $this->set(compact(
            'fishingResult', 'weathers', 'prefectures', 'fishingTypes', 'users', 
            'fishLists', 'cityLists', 'spotLists', 'lureFeedNameLists'));
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
            //'contain' => [],
            //'contain' => ['Users'],
            'contain' => [],
        ]);
        //if ($this->request->is(['patch', 'post', 'put'])) {
        if ($this->request->is(['post', 'put'])) {    
            $fishingResult = $this->FishingResults->patchEntity($fishingResult, $this->request->getData());

            //$query = $this->request->getData(); // POSTデータの取得
            //$query['user_id'] = $this->Auth->user('id'); // ユーザーidの追加
            //$fishingResult = $this->FishingResults->patchEntity($fishingResult, $query);

            if ($this->FishingResults->save($fishingResult)) {
                //$this->Flash->success(__('The fishing result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The fishing result could not be saved. Please, try again.'));
        }
        $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);
        $users = $this->FishingResults->Users->find('list', ['limit' => 200]);
        $fishLists = $this->FishingResults->find('list', ['keyField' => 'fish_type', 'valueField' => 'fish_type']);
        $cityLists = $this->FishingResults->find('list', ['keyField' => 'city', 'valueField' => 'city']);
        $spotLists = $this->FishingResults->find('list', ['keyField' => 'spot', 'valueField' => 'spot']);
        $lureFeedNameLists = $this->FishingResults->find('list', ['keyField' => 'lure_feed_name', 'valueField' => 'lure_feed_name']);

        $this->set(compact(
            'fishingResult', 'weathers', 'prefectures', 'fishingTypes', 'users', 
            'fishLists', 'cityLists', 'spotLists', 'lureFeedNameLists'));
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
            //$this->Flash->success(__('The fishing result has been deleted.'));
        } else {
            //$this->Flash->error(__('The fishing result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * find method
     */


    // public function find() {

    //     $find = Null; //検索キーワード

    //     if($this->request->query('word') != null) {
    //         $find = $this->request->query('word'); //viewから得た検索キーワードを受け取る
    //         $words = explode(' ', $find);
    //         $query = $this->Articles->find()
    //             ->contain(['Users']);
    //         foreach ($words as $word) {
    //             $query->where([
    //                 'OR' => [
    //                     ['title like ' => '%'.$word.'%'],
    //                     ['Users.username like ' => '%'.$word.'%'],
    //                     ['content like ' => '%'.$word.'%']
    //                 ],
    //             ]);
    //         }
    //     }
    // }


    // public function find() {
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $query = $this->Persons->find();
    //         $exp = $query->newExpr();
    //         $fnc = function($exp, $f) {
    //             return $exp
    //                 ->isNotNull('name')
    //                 ->isNotNull('mail')
    //                 ->gt('age',0)
    //                 ->in('name', explode(',',$f));
    //         };
    //         $persons = $query->where($fnc($exp,$find));
    //     }
    //     $this->set('persons', $persons);
    //     $this->set('msg', null);
    // }


    // public function find() {
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $query = $this->Persons->find();
    //         $exp = $query->newExpr();
    //         $fnc = function($exp, $find) {
    //             return $exp->gte('age', $find * 1);
    //         };
    //         $persons = $query->where($fnc($exp,$find));
    //     }
    //     $this->set('persons', $persons);
    //     $this->set('msg', null);
    // }


    // public function find() {
    //     $this->set('msg', null);
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->find()
    //             ->where(["name like " => '%' . $find . '%'])
    //             ->orWhere(["mail like " => '%' . $find . '%']);
    //     }
    //     $this->set('persons', $persons);
    // }


    // public function find() {
    //     $this->set('msg', null);
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->findByName($find);
    //     }
    //     $this->set('persons', $persons);
    // }    
    

    // public function find() {
    //     $this->set('msg', null);
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->find()
    //             ->select(['id', 'name'])
    //             ->order(['name' =>'Asc'])
    //             ->where(["name like " => '%' . $find . '%']);
    //     } else {
    //         $persons = [];
    //     }
    //     $this->set('persons', $persons);
    // }

    
            //dataの引数には、取り出したいフォームの名前を指定
            //$変数 = $this->request->data('hoge');

    public function find()
    {
       
        if ($this->request->is('post')) {
            $find = $this->request->data['find'];
            $results = $this->FishingResults->find()->where(["city" => $find])->contain(['Weathers', 'Prefectures', 'FishingTypes', 'Users']);
        }

            //日付の範囲
            // $fishingResults = $this->FishingResults->find()
            //     ->where(function($exp) {
            //          return $exp->between('fishing_date', 'fishing_date_from', 'fishing_date_to');
            //     });

            //     $fishingResults = $this->FishingResults->find()
            //     ->where(function($exp) {
            //          return $exp->between('temperature', 'temperature_from', 'temperature_to');
            //     });
                
            //     $fishingResults = $this->FishingResults->find()
            //     ->where(function($exp) {
            //          return $exp->between('water_temperature', 'water_temperature_from', 'water_temperature_to');
            //     });

            //     $fishingResults = $this->FishingResults->find()
            //     ->where(function($exp) {
            //          return $exp->between('fish_caught_time', 'fish_caught_time_from', 'fish_caught_time_to');
            //     });

            // $this->paginate = [
            //     'contain' => ['Weathers', 'Prefectures', 'FishingTypes', 'Users'],
            // ];
            // $fishingResults = $this->paginate($this->FishingResults);

            // $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
            // $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
            // $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);
            // $users = $this->FishingResults->Users->find('list', ['limit' => 200]);
            $this->set(compact('results'));
            //$this->set(compact('results', 'fishingResults'));

        // $this->Session->write('post',$this->request->data);
        // $this->Session->write('open_window',true);
        //return $this->redirect(['controller' => 'FishingResult', 'action' => 'index']);


        //$this->set('fishingResults', $fishingResults);
    }
 

    //         // //20以上の

    //         // $fishingResults = $this->FishingResults->findByFishTypes($find);

    //         // //ageの値が$find以上のものだけが$personsに返される
    //         // $query = $this->Persons->find();
    //         // $exp = $query->newExpr();
    //         // $fnc = function($exp, $f) {
    //         //     return $exp
    //         //         ->gte('age', $find * 1); //フィールド >= 値 ↔　lte()
    //         //         ->eq('name','taro');  //where 'name' = 'taro'
    //         //         ->isNotNull('name'); //nameがnullでないものだけを検索
    //         //         ->like('name','%ko'); 　//nameの値が'ko'で終わる
    //         //         ->in('name',['taro','jiro','hanako']);　//配列の値のいずれかと等しいものを検索する

    //         // };
    //         // $persons = $query->where($fnc($exp,$find));
    //     }
          
    //     $this->paginate = [
    //         'contain' => ['Weathers', 'Prefectures', 'FishingTypes', 'Users'],
    //     ];
    //     $fishingResults = $this->paginate($this->FishingResults);

    //     //コントローラーからビューに渡す記述
    //     $this->set(compact('fishingResults'));
}