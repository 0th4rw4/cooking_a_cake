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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' 
            ),
            'authorize' => array('Controller') // Added this line
        )
    );
    public $helpers = array('Html', 'Form', 'Session');

    //Se ejecuta antes de cualquier accion de un controlador
    public function beforeFilter() {
        // Este asunto de definir las constantes es para poder usarlas indiferentemente en cualquier parte dentro del sistema (views, controllers, models, etc)

        if( ! is_null( $this->Auth->user('id') ) ) {
            // definir una constante... estas variables no pueden redefinidas dentro del script
            define('MT_CLIENT_ID', $this->Auth->user('mt_client_id') );
        }

        /*
        if(defined('MT_CLIENT_ID')) ......
        $this->Post->find('all', array(
            'conditions'    => [
                'Post.mt_client_id' => MT_CLIENT_ID,
            ] 
        ));

        MT_CLIENT_ID = ___ NO EXISTE
        */

        //Configure AuthComponent
        $this->Auth->loginAction = array(
          'controller' => 'users',
          'action' => 'login'
        );
        $this->Auth->logoutRedirect = array(
          'controller' => 'users',
          'action' => 'login'
        );
        $this->Auth->loginRedirect = array(
          'controller' => 'posts',
          'action' => 'add'
        );
    }   

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return false;
    }
}

