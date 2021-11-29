<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
     public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Não é possível adicionar o usuário.'));
        }
        $this->set('user', $user);
    }

    public function initialize() :void
    {

    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');

    // Add this line to check authentication result and lock your site
    $this->loadComponent('Authentication.Authentication');
    
    }

    public function isAuthorized($user)
{
    // Admin pode acessar todas as actions
    if (isset($user['role']) && $user['role'] === 'admin') {
        return true;
    }

    // Bloqueia acesso por padrão
    return false;
}

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // for all controllers in our application, make index and view
    // actions public, skipping the authentication check
    $this->Authentication->addUnauthenticatedActions(['index', 'view']);
}


}
