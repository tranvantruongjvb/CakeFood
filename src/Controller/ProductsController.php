<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;
use App\Controller\component\Email;
use App\Controller\component\Upload;
use Cake\View\Helper;
use Cake\Utility\Text;
use Cake\Network\Exception\InternalErrorException;
class ProductsController  extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator');
	var $components = array('RequestHandler');

    public function initialize()
    {
        parent::initialize();
		 
		$this->Auth->allow(['logout']);

    }
    public function trangchu()
	{
		$product = $this->Products->find("all");
        $this->set('products',$product);
	}

	public function addproduct()
    {   
        
        $product = $this->Products->newEntity();
        if($this->request->is('post')) {
            $data = $this->request->data();
            $this->Products->patchEntity($product,$this->request->data);

            $name=$data['image'];
            $dir = WWW_ROOT .'img\uploads\ '. $name['name'] ;
            $a = move_uploaded_file($data['image']['tmp_name'], $dir);
            $product['image'] = 'http://localhost/cakecosy/webroot/img/uploads/'.$name['name'];
            echo "$dir";
            
        }


        // //now do the save
        if ($this->Products->save($product)) 
        {       
            $this->Flash->success(__('The product has been saved.'));
            
            return $this->redirect(URL_INDEX);
        } else {
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }   
        $this->set('product',$product);
    }
       
    public function editproduct($id)
    {   
        $product = $this->Products->get($id);
        if ($this->request->is(['post', 'put'])) {
            $name = $this->request->data['name'];
            $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
               // $this->Email->sendUserEmail($this->request->data['email'],'Update profile',$name,'update');
                $this->Flash->success(__('Your information data has been updated.'));
                return $this->redirect(URL_INDEX);
            }
            $this->Flash->error(__('Unable to update your profile.'));
        }
    
        $this->set('product', $product);      
        
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
