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
		$new = $this->Products->find("all")
        ->where(['products.new >=' => 1 ]);
        $this->paginate= array(
            'limit' => 4,
            'order' => [
            'products.id' => 'asc'
            ]
        );
        $product = $this->paginate($new);
        $this->set('products',$product);
         $typeProducts = TableRegistry::get('typeproducts');
         $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
	}
    public function typeproduct($id)
     {   
        $typeProducts = TableRegistry::get('typeproducts');
        $typeproducts = $typeProducts->find("all")-> toArray();
        $gettype = $typeProducts->get($id)->id;
        $getproduct = $this->Products->find("all")
        ->hydrate(false)
        ->join([
            'table' => 'typeProducts',
            'alias' => 'c',
            'type' => 'LEFT',
            'conditions' => array(
                'c.id = products.id_type',
                )     
        ])
        ->where(['products.id_type =' => $gettype ])
        ->toArray();
        $this->set(compact("typeproducts", "getproduct"));
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
            $product['image'] = '/webroot/img/uploads/'.$name['name'];
            
            
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
            //$name = $this->request->data['name'];
            $data = $this->request->data();
            $this->Products->patchEntity($product, $this->request->data);
             $name=$data['image'];
            $dir = WWW_ROOT .'img\uploads\ '. $name['name'] ;
            $a = move_uploaded_file($data['image']['tmp_name'], $dir);
            $product['image'] = '/img/uploads/'.$name['name'];
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Your information data has been updated.'));
                return $this-> redirect(array('action' => 'editproduct', $product->id));
            }
            $this->Flash->error(__('Unable to update your profile.'));
        }
        $this->set('product', $product);        
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
            return $this->redirect(URL_INDEX);
        }       
        
    }
   
}
?>
