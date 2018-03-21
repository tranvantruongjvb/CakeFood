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


class ProductsController  extends AppController{
	var $paginate = array();
	var $helpers = array('Paginator'   );
	var $components = array('RequestHandler','session');
    
    public function initialize()
    {
        parent::initialize();
		 
		$this->Auth->allow(['logout']);

    }

    public function index()
	{

        $promotion = $this->Products->find("all")
        ->where(['products.promotion_price >=' => 1 ]);
        $this->paginate= array(
            'limit' => 8,
            'order' => [
            'products.id' => 'asc'
            ]
        );
        $promotion_price = $this->paginate($promotion);
        $this->set('promotion_price',$promotion_price);

		$new = $this->Products->find("all")
        ->where(['products.new >=' => 1 ]);
        $this->paginate= array(
            'limit' => 8,
            'order' => [
            'products.id' => 'asc'
            ]
        );
        $product = $this->paginate($new)->toArray();
        $this->set('products',$product);

        $typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
	}

    public function getAddToCart($id){

        $product = $this->Products->get($id);
        $session = $this->request->session();
      
       $count = 1;
       if ($session->check('cart.'.$id)) {
            $items = $session->read('cart.'.$id);
            $items['quantity'] +=1;
        }else{
            $items = array(
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->unit_price,
            'quantity'=> 1,

            );
        }

         $session->write('cart.'.$id, $items, array('timeout' => 1, ));
         $s= $session->read('cart');
         $total=0;
         foreach ($s as $value) {
             $total += $value['price'] * $value['quantity'];
         }
          $session->write('payment.total',$total);
        $this->redirect($this->referer());

        
     }

     public function destroy()
     {    $session = $this->request->session();
          $session->destroy('cart');
           $this->redirect($this->referer());

     }

     public function order(){
        $typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);

         $session = $this->request->session();
        if($session->check('cart')){
            $oldCart = $session->read('cart');
            foreach ($oldCart as $value) {
                $items = array(
                $totalPrice =  $value['quantity'] * $value['price']);
            }
            $session->write('order', $totalPrice, array('timeout' => 1));
             $s=$session->read('order');

        }
       
    }

    public function postCheckout(){
        $session = $this->request->session();

        // khai báo database để lấy dữ liệu table
        $cus = TableRegistry::get('customer');
        $getbill = TableRegistry::get('bills');
        $get_bill_detail = TableRegistry::get('bill_detail');

        // read session
        $cart = $session->read('cart');
        $totalPrice = $session->read('payment.total');
        $req= $this->request->query;

        // save và bảng customer
        $cusumer = $cus->newEntity();
        $cusumer->name = $req['full_name'];
        $cusumer->email = $req['email'];
        $cusumer->address = $req['address'];
        $cusumer->phone_number = $req['phone'];
        $cusumer->note = $req['notes'];
        $cus->save($cusumer);
        
        // lấy giá trị cuối cùng (khácg hàng vừa mua cuối cùng )
        $customerid = $cus->find()
        ->select(['id', 'name'])
        ->where(['id !=' => 1])
        ->last();

        // save và bảng bill_details
        $bill = $getbill->newEntity();
        $bill->id_customer = $customerid->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $totalPrice;
        $bill->payment = $req['payment_method'];
        $bill->note = $req['notes'];
        $getbill->save($bill);
        
        // lấy bill id trong bảng bills
        $billid = $getbill->find()
        ->select(['id'])
        ->where(['id !=' => 1])
        ->last();

        foreach ($cart as $key) {
            // pr($billid['id']);
            $bill_detail = $getbill->newEntity();
            $bill_detail->id_bill = $billid['id'];
            $bill_detail->id_product = $key['id'];//$value['item']['id'];
            $bill_detail->quantity = $key['quantity'];
            $bill_detail->subtotal = $key['quantity'] *  $key['price'];
            $bill_detail->unit_price = $key['price'];
            $get_bill_detail->save($bill_detail);
        }

        $session->delete('cart');
        $session->delete('payment.total');
        $this->Flash->success(__('Cảm ơn bạn đã mua sản phẩm của chúng tôi. Đơn hàng đang được sử lý'));
        $this->redirect(URL_INDEX);
        
    }


    public function listcustomer()
    {
         $typeProducts = TableRegistry::get('typeproducts');
        $typeproducts = $typeProducts->find("all")-> toArray();

        $customer = TableRegistry::get('customer');
        $customer = TableRegistry::get('customer');
        $bill = TableRegistry::get('bills');
        $bill_detail = TableRegistry::get('bill_detail');

        $customers = $customer->find('all');
        $bills = $bill->find('all');
        $bill_details = $bill_detail->find('all');



        $this->set(compact('customers','typeproducts'));
    }
    
    public function listbill($id)
    {

        $typeProducts = TableRegistry::get('typeproducts');
        $typeproducts = $typeProducts->find("all")-> toArray();

        $customer = TableRegistry::get('customer');
        $bill = TableRegistry::get('bills');
        $bill_detail = TableRegistry::get('bill_detail');

        $getid = $customer->get($id)->id;

        $customers = $customer->find('all');
        $bills = $bill->find('all')
        ->where(['bills.id_customer =' => $getid])
        ->toArray();

        $bill_details = $bill_detail->find('all');

        $listbills = $bill->find()
        ->select(['c.name','c.email','c.address','c.phone_number','c.note','bills.total',
            'b.quantity','b.unit_price','p.name','p.image'
        ])
        ->where(['c.id =' => $getid])
        ->hydrate(false)
        ->join([
            'b' =>[
            'table' => 'bill_detail',
            'type' => 'LEFT',
            'conditions' => array(
                'bills.id = b.id_bill',
                )],
            'c' =>[
                    'table' => 'customer', 
                   'type' => 'LEFT',
                   'conditions' => array(
                   'c.id = bills.id_customer',
                )],
            'p' =>[
                    'table' => 'products', 
                   'type' => 'LEFT',
                   'conditions' => array(
                   'p.id = b.id_product',
                )],
        ])->toArray();
       
       $this->set(compact('listbills','customers','bills','bill_details','typeproducts'));
    }

    public function getSearch(){

        $key= $this->request->query;
        $find = $this->Products->find("all")
       ->where(['name LIKE' => '%'.$key['key'].'%']);

        $this->paginate= array(
            'order' => [
            'find.id' => 'asc'
            ]
        );
        $product = $this->paginate($find);
        $this->set('products',$product);

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
        ->where(['products.id_type =' => $gettype ]);
        
        $this->set(compact("typeproducts", "getproduct"));
    }
    public function viewproduct($id)
    {
        $product = $this->Products->get($id);
        $this->set('products', $product); 
        $typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);

        $type = $this->Products->find("all")
        ->where(['products.id_type >=' => $product->id_type ]);
        $this->paginate= array(
            'limit' => 9,
            'order' => [
            'products.id' => 'asc'
            ]
        );
        $producttype = $this->paginate($type);
        $this->set('producttype',$producttype);

        $new = $this->Products->find("all")
        ->limit('6')
        ->where(['products.new >=' => 1 ]);

        $this->set('productnew',$new);

    }

	public function addproduct()
    {   
         $typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);

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
         $typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
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
