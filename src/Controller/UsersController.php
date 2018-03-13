<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;
use App\Controller\component\Email;
use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class UsersController extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator');
	var $components = array('RequestHandler');

    public function initialize()
    {
        parent::initialize();
		$this->Auth->allow(['logout','trangchu']);
    }


	public function login()
	{	
		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			
			if ($user) {
				$this->Auth->setUser($user);
				//print_r($this->request->session()->check($user));die;
				
				return $this->redirect(URL_Profile);

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
			'limit' => LIMITED,
			'order' => [
            'users.id' => 'asc'
        	],
        );
		$user = $this->paginate('Users');
		$this->set('users',$user);		
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
		$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
	}
	
	public function userview()
	{
		$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
		# code...
		$user = $this->Users->get($this->Auth->user('id'));
		$this->set('user',$user);
	}
	public function adduser()
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
	            return $this->redirect(URL_INDEX);
			}

			$this->Flash->error(__('Unable to register your account.'));
		}
		$this->set('user',$user);
			}
	public function edituser($id)
	{	
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			$name = $this->request->data['name'];
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Email->sendUserEmail($this->request->data['email'],'Update profile',$name,'update');
				$this->Flash->success(__('Your profile data has been updated.'));
				return $this->redirect(URL_INDEX);
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
			return $this->redirect(URL_INDEX);
		}		
		
	}
	



}
?>
