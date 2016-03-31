<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('TwitterBootstrapController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

class UsersController extends TwitterBootstrapController {

  //読み込むコンポーネントの指定
  public $components = array('Flash','Session', 'Auth');

  //どのアクションが呼ばれてもはじめに実行される関数
  public function beforeFilter()
  {
    parent::beforeFilter();

    //未ログインでアクセスできるアクションを指定
    //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
    $this->Auth->allow('register', 'login');
  }

  //ログイン後にリダイレクトされるアクション
  public function index(){
    $this->set('user', $this->Auth->user());
    $this->Session->write('user',$this->Auth->user());
    return $this->redirect(array('controller' => 'index'));
  }

  public function register(){
    if($this->Auth->user()){
      return $this->redirect('index');
    }
    //$this->requestにPOSTされたデータが入っている
    //POSTメソッドかつユーザ追加が成功したら
    $this->set('pagename', "register");
    if($this->request->is('post') && $this->User->save($this->request->data)){
      //ログイン
      //$this->request->dataの値を使用してログインする規約になっている
      $this->Auth->login();
      debug("登録完了");  
      return $this->redirect('index');
    }
  }

  public function login(){
    if($this->Auth->user()){
      return $this->redirect('index');
    }
    $this->set('pagename', "login");
    if($this->request->is('post')) {
      if($this->Auth->login()){
        $this->Session->write('user',$this->Auth->user());
        return $this->redirect(
            array('controller' => 'room', 'action' => 'index')
        );
      }
      else{
        $this->Flash->set('ログイン失敗');
      }
    }
  }

  public function logout(){
    $this->Auth->logout();
    $this->Session->delete('user');
    $this->redirect('login');
  }
}