<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;
use App\Controller\component\Email;
use App\Controller\component\Upload;
use Cake\View\Helper;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Controller\Component;
use Cake\Network\Session\DatabaseSession;
use Cake\View\Helper\SessionHelper;
use Cake\Collection\Collection;

class UsersController extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator');
	var $components = array('RequestHandler');

    public function initialize()
    {
        parent::initialize();
    }


	public function login()
	{	
		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect(URL_Profile);
			}
			$this->Flash->error(__('Invalid username or password, try again.'));
			$this->redirect($this->referer());
		}
	}
	
	public function logout(){
		$this->Flash->success('You successfully have loged out');
		$this->Auth->logout();
		$this->redirect(URL_INDEX);
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
	
	public function news()
	{
		# code...
	}
	public function contact()
	{
		$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);

        if($this->request->is('post')) {
        	$data =$this->request->data();
			$name = $this->request->data['your-name'];
			$email = $this->request->data['your-email'];
			$subject = $this->request->data['your-subject'];
			$message = $this->request->data['your-message'];
			$array  = array('name'=>$name,'email'=>$email,'subject'=>$subject, 'message'=>$message );
			$this->Email->sendUserEmail($email,'CakeFoody',$array,'contact');
			$this->Flash->success(__('Thank you so much for your message '.$name));
	        $this->redirect(URL_INDEX);	
		}

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
	{	$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
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
	{	$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
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
