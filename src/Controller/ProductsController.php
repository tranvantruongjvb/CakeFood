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
                  $dir = WWW_ROOT . 'upload/' . $name['name'] ;
                $a = move_uploaded_file($data['image']['tmp_name'], $dir);
        }

        // //now do the save
        if ($this->Products->save($product)) 
        {       
            $this->Flash->success(__('The employee has been saved.'));

            return $this->redirect(URL_INDEX);
        } else {
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }   
        $this->set('product',$product);
}
       
 
}
?>