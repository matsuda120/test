<?php
namespace App\Controller;

class ListsController extends AppController
{
    public function initialize() :void
    {
        parent::initialize();

        //レイアウト指定
        $this->viewBuilder()->setLayout('head');
        
    }
    
    // /my-project/Lists 「/index」は省略
    public function index()
    { 
    }

    // /my-project/Lists/view/id
    public function view($id = null)
    {
        //レイアウトの自動読み込みを無効にする記述↓
        //$this->viewBuilder()->disableAutoLayout();

        $title = '釣果一覧画面';
        $this->set(compact(['id', 'title']));
        
        //Vieｗファイルを指定
        // $this->render('index');
    }
}