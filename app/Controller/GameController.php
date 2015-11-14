<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class GameController extends TwitterBootstrapController {
	public $components = array('Flash','Session', 'Auth');
	public $uses = array('Room');

	public function beforeFilter()
	{
		parent::beforeFilter();
		if(is_null($this->Session->read('user'))){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
	}
	public function index() {
		$this->set('loginstatus',$this->Session->read('user')['username']);
		if ($this->request->is('post')) {
        // フォームのデータを検証して保存する...

			if ($this->Room->save($this->request->data)) {
				debug($this->request->data);
			}
		}
	}
	public function room($id){
		$this->set('roomname','ルーム：'.$id.' Team:A');
	}
}
