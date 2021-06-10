<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //     parent::initialize();

    //   $this->viewBuilder()->layout('default');

    //  $this->loadComponent('RequestHandler'
    // //  , [
    // //      'enableBeforeRedirect' => false,
    // //  ]
    // );
    //     $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');


        // 【松浦 6/1】
        // ログイン機能

        //認証処理を追加
        $this->loadComponent('Auth',[
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'name',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
            //  $this->loadComponent('Auth', [
            //     'authenticate' => [  //送信されたフォームデータのキーとログイン処理の「username」「password」を紐つける設定
            //         'Form' => [
            //             'userModel' => 'Users',
            //             'fields' => ['username' => 'userid','password' => 'password']
            //         ]
            //     ],
            //     'loginAction' => '/Users/login',
            //     'loginRedirect' => [  //ログイン後のリダイレクト先設定
            //         'controller' => 'Users',
            //         'action' => 'index'
            //     ],
            //     'logoutRedirect' => [  //ログアウト後のリダイレクト先設定
            //         'controller' => 'Users',
            //         'action' => 'login'
            //     ]
    
            // ]);
    }

}






//('Auth', [
//                 'authenticate' => [
//                     'Form' => [
//                         'fields' => [
//                             'userid' => 'userid',
//                             'password' => 'password'
//                         ]



                        
//                     ]
//                 ],
//                 'loginRedirect'  => [ 'controller' => 'Users' , 'action' => 'index' ],
//                 'loginAction' => [
//                     'controller' => 'Users',
//                     'action' => 'login'
//                 ],
//                 'authorize' => ['Controller'],
//                 'unauthorizedRedirect' => $this->referer()
//             ]);
     
//             $this->Auth->allow(['display', 'view', 'index']);

//     }
// }
