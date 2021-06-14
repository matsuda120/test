<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class UsersController extends AppController
{
    /**
     * Initialization method
     */
    // public function initialize()
    // {
    //     // 【松浦 6/1】
    //     // ログアウトと新規登録画面にはユーザー認証なしでアクセス可能となる記述
    //     parent::initialize();
    //     $this->Auth->allow(['logout', 'add']);
        
    //     //レイアウト指定
    //     $this->viewBuilder()->setLayout('head');
    // }

    // /**
    //  * 認証スルー設定
    //  * @param Event $event
    //  * @return \Cake\Http\Response|null|void
    //  */
    //  public function beforeFilter(Event $event)
    //  {
    //    parent::beforeFilter($event);
    //    $this->Auth->allow(['add', 'index']);
    //  }

    /**
     * isAuthorized method
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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        //コントローラーからビューに渡す記述
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        //$title = '釣果一覧画面';
        
        $user = $this->Users->get($id, [
            'contain' => ['FishingResults'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        // 配列の中でひとつだけデータを取得する記述
        // findではなくgetメソッドを使う 引数には取得したいID変数
        $user = $this->Users->get($id);
        
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //  /**
    //  * Login method
    //  * 
    //  * 【松浦 6/1】
    //  * ログイン画面
    //  * 
    //  */
    // public function login()
    // {
    //     if ($this->request->is('post')) {
    //         $user = $this->Auth->identify();
    //         if ($user) {
    //             $this->Auth->setUser($user);
    //             return $this->redirect($this->Auth->redirectUrl('/users'));
    //         }
    //         $this->Flash->error('ユーザー名またはパスワードが不正です。');
    //     }
    // }



    /**
 * ログイン
 * @return \Cake\Http\Response|null
 */
public function login()
{
  if ($this->request->is('post')) {
    $user = $this->Auth->identify();
    if ($user) {
      $this->Auth->setUser($user);
      return $this->redirect($this->Auth->redirectUrl());
    }
    $this->Flash->error(__('ユーザ名もしくはパスワードが間違っています'));
  }
}

    /**
     * logout method
     * 
     * 【松浦 6/1】
     * ログアウト画面
     * 
     */
    public function logout()
    {
        $this->Flash->success('ログアウトしました。');
        return $this->redirect($this->Auth->logout());
    }


}
