<?php
namespace App\Controller;

class PostsController extends AppController
{
    public function initialize() :void
    {
        parent::initialize();

        //レイアウト指定
        $this->viewBuilder()->setLayout('head');
        
    }

    //一覧表示件数を制限する記述
    public $paginate = [
        'limit' => 30,
        'order' => [
            'fishing_date' => 'desc'
        ]
    ];
    
    // /my-project/Posts 「/index」は省略
    public function index()
    {
        //すべてのデータを取得する記述　＝引数をALLにする（何も指定しない場合もデフォルトでALL）
        $users = $this->Users->find('all');

        //検索条件を指定する→WHEREメソッド
        //引数に連想配列を指定 KEY検索するカラム名　VALUE検索する文字列
        //querybuilder 自動的にSQLに変換
        //SQLのクエリーを使わずにメソッドを呼び出すだけで
        //複雑なSQLの命令文を行うことが可能
        //Tableオブジェクトからfind()メソッドを指定

        // 完全一致
        $users = $this->Users->find()->where(['date' => '2021/05/27']);

        //部分一致
        $users = $this->Users->find()->where(['fish_type LIKE' => '%2021%']);

        //複数のカラムを検索条件
        $users = $this->Users->find()
            ->where([
                'fish_type LIKE' => '%2021%'
                'deleted' => false
            ]);
        
        //複数のカラムを検索条件（'fishing_date >' →　何日以降の結果を検索する記述）
        $users = $this->Users->find()
            ->where(['fishing_date >' => '2021/05/27']);

        //複数のカラムを検索条件（日付の範囲検索の記述）
        $users = $this->Users->find()
            ->where(function($exp) {
                return $exp->between('fishing_date', '2021-05-15', '2021-05-20');
            });
        
        //すべてのデータの表示件数を制限
        $users = $this->Users->find()->limit(3);

        //データを並び替える(例　日付が新しい順)
        $users = $this->Users->find()->order(['fishing_date' => 'desc']);

        //検索
        $users = $this->Users->find()->where(['deleted' => 'false']);
        // ↑↓同じ
        $users = $this->Users->findByDeleted(false);
        //↑に検索条件を追加する場合の記述
        $users = $this->Users->findByDeletedAndDate(false, '2021-05-15');

       //コントローラーからビューに渡す記述
        $this->$this->set(compact('posts'));
    }

    public function find() {
        $persons = [];
        if ($this->request->is('post')) {
            $find = $this->request->data['find'];
            $query = $this->Persons->find();
            $exp = $query->newExpr();
            $fnc = function($exp, $f) {
                return $exp
                    ->isNotNull('name')
                    ->isNotNull('mail')
                    ->gt('age',0)
                    ->in('name', explode(',',$f));
            };
            $persons = $query->where($fnc($exp,$find));
        }
        $this->set('persons', $persons);
        $this->set('msg', null);
    }




    // /my-project/Posts/view/id
    public function view($id = null)
    {
        //レイアウトの自動読み込みを無効にする記述↓
        //$this->viewBuilder()->disableAutoLayout();

        //ひとつのデータを取得する記述　＝getメソッドを使う 引数には取得したいID変数
        $user = $this->Users->get($id);

        $title = '釣果一覧画面';

        $this->set(compact('post'));
        
        //Vieｗファイルを指定
        // $this->render('index');
    }
