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
		$typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			
			if ($user) {
				$this->Auth->setUser($user);
				$this->Flash->success(__("Đăng nhập thành công... Mời bạn mua hàng"));
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
		$typeProducts = TableRegistry::get('typeproducts');
		$typeproducts = $typeProducts->find('all');
		$this->paginate= array(
			'limit' => 8,
			'order' => [
            'users.id' => 'DESC'
        	],
        );
		$users = $this->paginate('Users');
		$this->set(compact('users','typeproducts'));		
	}
	
	public function forgetpass()
	{

		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		    $pass = array(); //remember to declare $pass as an array
		    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, $alphaLength);
		        $pass[] = $alphabet[$n];
		    }
		   	if($this->request->is('post'))
		   	{
		   		$getdata = $this->request->data();
		   		$email = $getdata['email'];
		   		$getuser = $this->Users->find()
		   		->where(['users.email =' => $email])
		   		->toArray();
		   		$id= $getuser['0']['id'];
		   		$email = $getuser['0']['email'];
		   		$getinfo = $this->Users->get($id);
		   		if(!$getinfo){
		   				$this->Flash->error(__('Email bạn nhập không khớp với bất kỳ tài khoản nào.'));
		       			return $this->redirect($this->referer());
		   		}else{
		   			$p = md5((implode("",$pass)));
		   			$getinfo['password'] = $p  ;
		   			if($this->Users->save($getinfo))
		   			{
		   				$array  = array('pass'=>$p );
		   				$this->Email->sendUserEmail($email,'Forgetpass',$array,'forgetpass');
		   				$this->Flash->success(__(' Mật khẩu mới đã gửi tới email của bạn. Hãy truy cập email để đăng nhập .'));
		   			}
		   			else{
		   				$this->Flash->error(__('Lỗi rồi.'));
		       			return $this->redirect($this->referer());
		   			}
		   			
		   		}
		   	}   
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
		       			$this->Flash->error(__('Tên người dùng của bạn đã tồn tại'));
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
	            $this->Flash->success(__($name.' Tài khoản đã được đăng ký. Hãy đăng nhập  .'));
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
		//pr($passold);die;
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);

			$array=array('name'=> $user['name']);
			if ($this->Users->save($user)) {
				$this->Email->sendUserEmail($this->request->data['email'],'Cập nhật thông tin trên CakeFoody',$array,'update');
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
			$this->Flash->success(__('Người Dùng Có Tên: {0} Đã Được Xóa.', h($name)));
			return $this->redirect($this->referer());
		}		
		
	}
	
}
?>
