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
				$this->Flash->success(__("Đăng nhập thành công.."));
				return $this->redirect(URL_INDEX);
			}
			$this->Flash->error(__('Email Hoặc Password Của Bạn Không Đúng. Thử Lại'));
			$this->redirect($this->referer());
		}
	}

	
	public function logout(){
		
		$this->Auth->logout();
		$this->Flash->success('Bạn Đã Logout Thành Công ');
		$session = $this->request->session();
        $session->destroy();
        $this->redirect(URL_INDEX);
	}
	public function listUser()
	{
		$this->paginate= array(
			'limit' => 8,
			'order' => [
            'users.id' => 'DESC'
        	],
        );
		$user = $this->paginate('Users');
		$this->set('users',$user);		
	}
	
	// public function resetpass()
	// {
	// 	    	 $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	// 	    $pass = array(); //remember to declare $pass as an array
	// 	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	// 	    for ($i = 0; $i < 8; $i++) {
	// 	        $n = rand(0, $alphaLength);
	// 	        $pass[] = $alphabet[$n];
	// 	    }
		    
	// 	pr($pass);die;
	// }

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
			$this->Flash->success(__('Cảm Ơn Bạn Đã Góp Ý Cho CakeFoody '.$name ));
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
	{	
		$typeProducts = TableRegistry::get('typeproducts');
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

			$olduser = $this->Users->find('all')->toArray();
		       foreach ($olduser as $key) {
		       		if($key['username'] == $username){
		       			$this->Flash->error(__('UserName của bạn đã tồn tại'));
		       			return $this->redirect($this->referer());
		       		}
			       	elseif($key['email'] == $email){
			       		$this->Flash->error(__('Email của bạn đã tồn tại'));
			       		return $this->redirect($this->referer());
			       	}
			       	elseif($key['phone'] == $phone){
			       		$this->Flash->error(__('Số Điện của bạn đã tồn tại'));
			       		return $this->redirect($this->referer());
			       	}
			       
		       }
			if($this->Users->save($user)){

				$this->Email->sendUserEmail($email,'Register',$array,'add');
	            $this->Flash->success(__($name.' Đã Được Thêm  .'));
	            return $this->redirect(URL_INDEX);
			}

			$this->Flash->error(__('Không thể Đăng Ký Tài Khoản.'));
		}
		$this->set('user',$user);
			}
	public function edituser($id)
	{	$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
		$user = $this->Users->get($id);

		$passold =  $user['password'];
		//pr($passold);die;
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			$pass = $this->request->data['password'];
			if($pass =='******'){
				$user['password'] = $passold;
				
			}else {
				$user['password'] = $pass;
			}
			$name = $this->request->data['name'];
				if ($this->Users->save($user)) {
					$this->Email->sendUserEmail($this->request->data['email'],'Update profile',$name,'update');
					$this->Flash->success(__('Thông Tin Của Bạn Được Cập Nhật.'));
					return $this->redirect($this->referer());
				}$this->Flash->error(__('Không Thể Cập Nhật Thông Tin Của Bạn.'));
		}
	
		$this->set('user', $user);		
		
	}
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('Người Dùng Có Tên: {0} Đã Được Xóa.', h($id)));
			return $this->redirect($this->referer());
		}		
		
	}
	



}
?>
