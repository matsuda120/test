<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
     * 【松浦 6/14】
     */
    public function initialize()
    {
        parent::initialize();

        //レイアウト指定
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * 認証スルー設定
     * 【松浦 6/14】
     * 
     * @param Event $event
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['find', 'filter', 'view', 'index']);
    }

    /**
     * isAuthorized method
     * 【松浦 6/14】
     * 
     * ユーザーのIDが一致した時のみ修正と削除ができるようにする
     * ログインしている自分以外のユーザーが情報の修正・削除ができない
     */
    public function isAuthorized($user)
    {
        // 登録ユーザー全員が登録できる記述
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        // 自分の記録を修正＆削除できる記述
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $postId = (int)$this->request->getParam('pass.0');
            if ($this->FishingResults->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     * 【松浦 6/15】
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('fishingResults', $this->FishingResults->find('all'));

        if ($this->request->getQuery("sort")) {
            $sort = [$this->request->getQuery("sort") => $this->request->getQuery("direction")];
        } else {
            $sort = ["FishingResults.id" => "asc"];
        }

        $this->paginate = [
            'contain' => ['Weathers', 'Prefectures', 'FishingTypes', 'Users'],
        ];
        $fishingResults = $this->paginate($this->FishingResults->find()->order($sort));

        $this->set(compact('fishingResults'));
    }

    /**
     * View method
     * 【松浦　6/9】
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
     * 【松浦　6/9】
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fishingResult = $this->FishingResults->newEntity();

        if ($this->request->is('post')) {
            $fishingResult = $this->FishingResults->patchEntity($fishingResult, $this->request->getData());
            $fishingResult->user_id = $this->Auth->user('id');
            //登録成功したら初期画面に戻る記述
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

        $fishLists = $this->FishingResults->find('list', ['keyField' => 'fish_type', 'valueField' => 'fish_type']);
        $cityLists = $this->FishingResults->find('list', ['keyField' => 'city', 'valueField' => 'city']);
        $spotLists = $this->FishingResults->find('list', ['keyField' => 'spot', 'valueField' => 'spot']);
        $lureFeedNameLists = $this->FishingResults->find('list', ['keyField' => 'lure_feed_name', 'valueField' => 'lure_feed_name']);

        // $weathers = $this->FishingResults->Weathers->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        // $prefectures = $this->FishingResults->Prefectures->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        // $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['keyField' => 'title', 'valueField' => 'title']);

        //$users = $this->FishingResults->Users->find('list', ['keyField' => 'userid', 'valueField' => 'userid']);



        $this->set(compact(
            'fishingResult',
            'weathers',
            'prefectures',
            'fishingTypes',
            'users',
            'fishLists',
            'cityLists',
            'spotLists',
            'lureFeedNameLists'
        ));
    } //add end

    /**
     * Edit method
     * 【松浦　6/9】
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

            if ($this->FishingResults->save($fishingResult)) {
                $this->Flash->success(__('釣果情報修正完了しました'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('釣果情報修正エラー'));
        }
        $weathers = $this->FishingResults->Weathers->find('list', ['limit' => 200]);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['limit' => 200]);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['limit' => 200]);

        // $users = $this->FishingResults->Users->find('list', ['limit' => 200]);

        $fishLists = $this->FishingResults->find('list', ['keyField' => 'fish_type', 'valueField' => 'fish_type']);
        $cityLists = $this->FishingResults->find('list', ['keyField' => 'city', 'valueField' => 'city']);
        $spotLists = $this->FishingResults->find('list', ['keyField' => 'spot', 'valueField' => 'spot']);
        $lureFeedNameLists = $this->FishingResults->find('list', ['keyField' => 'lure_feed_name', 'valueField' => 'lure_feed_name']);

        // $weathers = $this->FishingResults->Weathers->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        // $prefectures = $this->FishingResults->Prefectures->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        // $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['keyField' => 'title', 'valueField' => 'title']);

        $users = $this->FishingResults->Users->find('list', ['keyField' => 'userid', 'valueField' => 'userid']);



        $this->set(compact(
            'fishingResult',
            'weathers',
            'prefectures',
            'fishingTypes',
            'users',
            'fishLists',
            'cityLists',
            'spotLists',
            'lureFeedNameLists'
        ));
    }  //edit end

    /**
     * Delete method
     * 【松浦　6/7 修正】
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
            $this->Flash->success(__('釣果情報削除完了しました'));
        } else {
            $this->Flash->error(__('釣果情報削除エラー'));
        }

        return $this->redirect(['action' => 'index']);
    } //delete end

    /**
     * find method
     * 【松浦 6/15】
     */
    public function find()
    {
        $results = [];

        if ($this->request->is('post')) {
            $requestData = $this->request->getData();

            $conditions = [];

            // 日付
            if (!empty($requestData['fishing_date'])) {
                $conditions['fishing_date >'] = $requestData['fishing_date'];
            }

            //釣り開始時間
            if (!empty($requestData['time_from'])) {
                $conditions['time_from >'] = $requestData['time_from'];
            }

            //天気
            if (!empty($requestData['weather'])) {
                $conditions['Weathers.title like'] = '%' . $requestData['weather'] . '%';
            }

            //都道府県
            if (!empty($requestData['prefecture'])) {
                $conditions['Prefectures.title like'] = '%' . $requestData['prefecture'] . '%';
            }

            //市町村
            if (!empty($requestData['city'])) {
                $conditions['city like'] = '%' . $requestData['city'] . '%';
            }

            //スポット
            if (!empty($requestData['spot'])) {
                $conditions['spot like'] = '%' . $requestData['spot'] . '%';
            }

            //魚種
            if (!empty($requestData['fish_type'])) {
                $conditions['fish_type like'] = '%' . $requestData['fish_type'] . '%';
            }

            //釣った時間
            if (!empty($requestData['fish_caught_time'])) {
                $conditions['fish_caught_time >'] = $requestData['fish_caught_time'];
            }

            //釣種
            if (!empty($requestData['fishing_type'])) {
                $conditions['FishingTypes.title like'] = '%' . $requestData['fishing_type'] . '%';
            }

            //ルアー／えさ名称
            if (!empty($requestData['lure_feed_name'])) {
                $conditions['lure_feed_name like'] = '%' . $requestData['lure_feed_name'] . '%';
            }

            //ルアー／えさ
            if (!empty($requestData['lure_feed'])) {
                $conditions['lure_feed like'] = '%' . $requestData['lure_feed'] . '%';
            }

            //ユーザーID
            if (!empty($requestData['userid'])) {
                $conditions['Users.userid like'] = '%' . $requestData['userid'] . '%';
            }

            $results = $this->FishingResults->find()
                ->where($conditions)
                ->contain(['Weathers', 'Prefectures', 'FishingTypes', 'Users']);
        }

        $weathers = $this->FishingResults->Weathers->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['keyField' => 'title', 'valueField' => 'title']);

        $fishLists = $this->FishingResults->find('list', ['keyField' => 'fish_type', 'valueField' => 'fish_type']);
        $cityLists = $this->FishingResults->find('list', ['keyField' => 'city', 'valueField' => 'city']);
        $spotLists = $this->FishingResults->find('list', ['keyField' => 'spot', 'valueField' => 'spot']);
        $lureFeedNameLists = $this->FishingResults->find('list', ['keyField' => 'lure_feed_name', 'valueField' => 'lure_feed_name']);

        $userLists = $this->FishingResults->Users->find('list', ['keyField' => 'userid', 'valueField' => 'userid']);

        $this->set("msg1", "↓↓　検索結果を表示しました　↓↓");
        $this->set("msg2", "×　検索結果なし　×"); //未実装
        $this->set(compact(
            'results',
            'weathers',
            'prefectures',
            'fishingTypes',
            'fishLists',
            'cityLists',
            'spotLists',
            'lureFeedNameLists',
            'userLists'
        ));
    } // find end


    /**
     * filter method
     * 【松浦 6/15】
     */
    public function filter()
    {
        $results = [];

        if ($this->request->is('post')) {
            $requestData = $this->request->getData();

            $conditions = [];

            // 日付
            if (!empty($requestData['fishing_date'])) {
                $conditions['fishing_date'] = $requestData['fishing_date'];
            }

            //釣り開始時間
            if (!empty($requestData['time_from'])) {
                $conditions['time_from >'] = $requestData['time_from'];
            }

            //天気
            if (!empty($requestData['weather'])) {
                $conditions['Weathers.title like'] = '%' . $requestData['weather'] . '%';
            }

            //都道府県
            if (!empty($requestData['prefecture'])) {
                $conditions['Prefectures.title like'] = '%' . $requestData['prefecture'] . '%';
            }

            //市町村
            if (!empty($requestData['city'])) {
                $conditions['city like'] = '%' . $requestData['city'] . '%';
            }

            //スポット
            if (!empty($requestData['spot'])) {
                $conditions['spot like'] = '%' . $requestData['spot'] . '%';
            }

            //魚種
            if (!empty($requestData['fish_type'])) {
                $conditions['fish_type like'] = '%' . $requestData['fish_type'] . '%';
            }

            //釣った時間
            if (!empty($requestData['fish_caught_time'])) {
                $conditions['fish_caught_time >'] = $requestData['fish_caught_time'];
            }

            //釣種
            if (!empty($requestData['fishing_type'])) {
                $conditions['FishingTypes.title like'] = '%' . $requestData['fishing_type'] . '%';
            }

            //ルアー／えさ名称
            if (!empty($requestData['lure_feed_name'])) {
                $conditions['lure_feed_name like'] = '%' . $requestData['lure_feed_name'] . '%';
            }

            //ルアー／えさ
            if (!empty($requestData['lure_feed'])) {
                $conditions['lure_feed like'] = '%' . $requestData['lure_feed'] . '%';
            }

            //ユーザーID
            if (!empty($requestData['userid'])) {
                $conditions['Users.userid like'] = '%' . $requestData['userid'] . '%';
            }

            $results = $this->FishingResults->find()
                ->select([$conditions]);
        }

        $weathers = $this->FishingResults->Weathers->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        $prefectures = $this->FishingResults->Prefectures->find('list', ['keyField' => 'title', 'valueField' => 'title']);
        $fishingTypes = $this->FishingResults->FishingTypes->find('list', ['keyField' => 'title', 'valueField' => 'title']);

        $fishLists = $this->FishingResults->find('list', ['keyField' => 'fish_type', 'valueField' => 'fish_type']);
        $cityLists = $this->FishingResults->find('list', ['keyField' => 'city', 'valueField' => 'city']);
        $spotLists = $this->FishingResults->find('list', ['keyField' => 'spot', 'valueField' => 'spot']);
        $lureFeedNameLists = $this->FishingResults->find('list', ['keyField' => 'lure_feed_name', 'valueField' => 'lure_feed_name']);

        $userLists = $this->FishingResults->Users->find('list', ['keyField' => 'userid', 'valueField' => 'userid']);


        $this->set("msg1", "↓↓　検索結果を表示しました　↓↓");
        $this->set("msg2", "×　検索結果なし　×"); //未実装
        $this->set(compact(
            'results',
            'weathers',
            'prefectures',
            'fishingTypes',
            'fishLists',
            'cityLists',
            'spotLists',
            'lureFeedNameLists',
            'userLists'
        ));
    } // filter end

} // END




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
            
            //$this->set(compact('results', 'fishingResults'));

        // $this->Session->write('post',$this->request->data);
        // $this->Session->write('open_window',true);
        //return $this->redirect(['controller' => 'FishingResult', 'action' => 'index']);


        //$this->set('fishingResults', $fishingResults);

 

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
