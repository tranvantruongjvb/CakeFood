<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;
use App\Controller\component\Email;
use Cake\View\Helper;

class UsersController extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator');
	var $components = array('RequestHandler');

    public function initialize()
    {
        parent::initialize();
		 
		$this->Auth->allow(['logout', 'add','list_user']);

    }


	public function login()
	{	
		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			
			if ($user) {
				$this->Auth->setUser($user);
				//print_r($this->request->session()->check($user));die;
				
				return $this->redirect(URL_LIST_USER);

			}
			$this->Flash->error(__('Invalid username or password, try again.'));
		}
	}
	
	public function logout(){
		$this->Flash->success('You successfully have loged out');	
		return	$this->redirect($this->Auth->logout());
	}
	public function listUser()
	{
		$this->paginate= array(
			'limit' => 4,
			'order' => [
            'users.id' => 'asc'
        	],
        );
		$users = $this->paginate('Users');
		//print_r($users);
		$this->set('users',$users);		
	}
	public function admin()
	{

	}
	public function news()
	{
		# code...
	}
	public function contact()
	{
		# code...
	}
	public function view()
	{
		$user = $this->Users->get($this->Auth->user('id'));
		$this->set('user',$user);
	}
	public function add()
	{	
		$user = $this->Users->newEntity();
		if($this->request->is('post')) {
			$this->Users->patchEntity($user,$this->request->data);
			$name = $this->request->data['name'];
			$username = $this->request->data['username'];
			$email = $this->request->data['email'];
			$phone = $this->request->data['phone'];
			$array  = array('name'=>$name,'username'=>$username,'email'=>$email,'phone'=>$phone );
			if($this->Users->save($user)){

				$this->Email->sendUserEmail($email,'Register',$array,'add');
	            $this->Flash->success(__($name.' has been registered .'));
	            return $this->redirect(URL_LIST_USER);
			}

			$this->Flash->error(__('Unable to register your account.'));
		}
		$this->set('user',$user);
			}
	public function edit($id)
	{	
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			$name = $this->request->data['name'];
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Email->sendUserEmail($this->request->data['email'],'Update profile',$name,'update');
				$this->Flash->success(__('Your profile data has been updated.'));
				return $this->redirect(URL_LIST_USER);
			}
			$this->Flash->error(__('Unable to update your profile.'));
		}
	
		$this->set('user', $user);		
		
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
			return $this->redirect(URL_LIST_USER);
		}		
		
	}
		
}
?>
