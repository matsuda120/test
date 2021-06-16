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
     * 【松浦 6/14】
     */
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * beforeFilter method
     * 【松浦 6/14】
     * 
     * @param Event $event
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'view']);
    }

    /**
     * isAuthorized method
     * 【松浦 6/14】
     */
    public function isAuthorized($user)
    {
        if (isset($user['userid']) && $user['userid'] === 'admin') {
            return true;
        }
        $id = $this->request->getParam('pass.0');

        if ($id == $user['id']) {
            return true;
        }
        return false;
    }

    /**
     * Index method
     * 【松浦 6/14】
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     * 【松浦 6/14】
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['FishingResults' => ['Weathers', 'Prefectures', 'FishingTypes']],
        ]);
        $this->set(compact('user'));
    }

    /**
     * Add method
     * 【松浦 6/14】
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('ユーザー登録完了しました'));

                return $this->redirect(
                    ['controller' => 'FishingResults', 'action' => 'index']
                );
            }
            $this->Flash->error(__('会員登録エラー'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     * 【松浦 6/14】
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
                $this->Flash->success(__('会員情報修正完了しました'));

                return $this->redirect(
                    ['controller' => 'FishingResults', 'action' => 'index']
                );
            }
            $this->Flash->error(__('会員情報修正エラー'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     * 【松浦 6/14】
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('会員情報削除完了しました'));
        } else {
            $this->Flash->error(__('会員情報削除エラー'));
        }

        return $this->redirect(
            ['controller' => 'FishingResults', 'action' => 'index']
        );
    }

    /**
     * Login method
     * 【松浦 6/14】
     * 
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
            $this->Flash->error(__('ユーザＩＤもしくはパスワードが間違っています'));
        }
    }

    /**
     * Logout method
     * 【松浦 6/14】
     */
    public function logout()
    {
        $this->Flash->success('ログアウトしました');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Admin method
     * 【松浦 6/16】
     *
     * @return \Cake\Http\Response|null
     */
    public function admin()
    {
        $users = $this->paginate($this->Users);

        $wearherTable = $this->getTableLocator()->get('Weathers');
        $weathers = $wearherTable->find();

        $prefectureTable = $this->getTableLocator()->get('Prefectures');
        $prefectures = $prefectureTable->find();

        $fishingTypeTable = $this->getTableLocator()->get('FishingTypes');
        $fishingTypes = $fishingTypeTable->find();

        $this->set(compact('users', 'weathers', 'prefectures', 'fishingTypes'));
    }
}
