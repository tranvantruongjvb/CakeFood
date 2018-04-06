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
    public function getnews()
    {
          $news = TableRegistry::get('get_email');
        if($this->request->is('post')) {

            $data = $this->request->data();           
            print_r($data['email']);die;

           
                 $email = $data['your_email'];
                 $array  = array('email'=>$email);
                 $get = $news->newEntity();
                 $get->email = $email;
                 $news->save($get);
                 $this->Email->sendUserEmail($email,'CakeFoody',$array,'getnews');
                 $this->Flash->success(__('Cảm ơn bạn đăng ký'));
                 $this->redirect($this->referer());
            
           
        
        }

    }

    public function index()
	{

        $promotion = $this->Products->find("all")
        ->where( ['products.promotion_price >=' => 1])
        ->order(['products.id' => 'DESC']);
        $this->paginate= array(
            'limit' => 8);
        $promotion_price = $this->paginate($promotion);
        $this->set('promotion_price',$promotion_price);

		$new = $this->Products->find("all")
        ->where(['products.new >=' => 1 ]);
        $this->paginate= array(
            'limit' => 8,
            'order' => array('products.id' => 'DESC'),
        );

        $product = $this->paginate($new)->toArray();
        $this->set('products',$product);

        $this->readtypeproduct();
	}

    public function getAddToCart($id){

        $product = $this->Products->get($id);
        $session = $this->request->session();
      
      
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
         $session->delete('payment.total2');
         $session->write('cart.'.$id, $items);
         $s= $session->read('cart');
         $total=0;
         foreach ($s as $value) {
             $total += $value['price'] * $value['quantity'];
         }
          $session->write('payment.total',$total);
        $this->redirect($this->referer());
     }

     public function deleteitems($id)
     {
        $product = $this->Products->get($id);
        $session = $this->request->session();
        $session->delete('cart.'.$product->id);

        $s= $session->read('cart');
         $total=0;
         foreach ($s as $value) {
             $total += $value['price'] * $value['quantity'];
         }
          $session->write('payment.total2',$total);
        $this->redirect($this->referer());
     }

     public function updatequantity()
     {   
         
        $s= $this->request->data;
        $id = $s['id'];
        $b = $s['sl'];

        $session = $this->request->session();
       if ($session->check('cart.'.$id)) {
            $items = $session->read('cart.'.$id);
            $items['quantity'] = $b;
        }
        $session->delete('payment.total2');
         $session->write('cart.'.$id, $items);
         $s= $session->read('cart');
         $total=0;
         foreach ($s as $value) {
             $total += $value['price'] * $value['quantity'];
         }
          $session->write('payment.total',$total);die;

     }

     public function destroy()
     {    $session = $this->request->session();
          $session->destroy('cart');
           $this->redirect($this->referer());

     }

     public function order(){

        $this->readtypeproduct();

        $session = $this->request->session();
        if($session->check('cart')){
            $oldCart = $session->read('cart');
            foreach ($oldCart as $value) {
                $items = array(
                $totalPrice =  $value['quantity'] * $value['price']);
            }
            $session->write('order', $totalPrice);
             $s=$session->read('order');

        }
       
    }

    public function customerbill($id)
    {
        $this->readtypeproduct();
        $cus = TableRegistry::get('customer');
        $getid = $cus->get($id)->id;

        $getcus= $cus->find('all')
        ->where(['customer.id_user = ' => $getid ])
        ->toArray();
        $this->set('billcustomer',$getcus);
    }

    

     public function customer($id)
    {
        $this->listbill($id);

    }


    public function listcustomer()
    {
        $this->readtypeproduct();

        $customer = TableRegistry::get('customer');
        $customer = TableRegistry::get('customer');
        $bill = TableRegistry::get('bills');
        $bill_detail = TableRegistry::get('bill_detail');

        $find = $customer->find('all');
        
        $customers = $this->paginate($find);
        $bills = $bill->find('all');
        $bill_details = $bill_detail->find('all');



        $this->set(compact('customers','typeproducts'));
    }
    
    public function billdetail($id)
    {
        $this->readtypeproduct();
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
            'b.quantity','b.unit_price','b.created_at','p.name','p.image'
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
         $this->readtypeproduct();
        $key= $this->request->query;

        $findname = $this->Products->find("all")
       ->where(['name LIKE' => '%'.$key['key'].'%']);
        $this->paginate= array(
            'order' => [
            'find.id' => 'asc'
            ]
        );
        $products = $this->paginate($findname);
        if (count($products)== 0) {
            $findid = $this->Products->find("all")
               ->where(['id =' => $key['key'].'%']);
                $this->paginate= array(
                    'order' => [
                    'find.id' => 'asc'
                    ]
                );
               $products = $this->paginate($findid);
        }
        
        $this->set(compact('products'));

     }

     public function postCheckout(){
        
        $session = $this->request->session();
        // khai báo database để lấy dữ liệu table
        $cus = TableRegistry::get('customer');
        $getbill = TableRegistry::get('bills');
        $get_bill_detail = TableRegistry::get('bill_detail');
        $get_email = TableRegistry::get('get_email');

        // read session
        $readuser = $session->read('Auth.User');
        $cart = $session->read('cart');
        $totalPrice = $session->read('payment.total');
        $req= $this->request->data();
        $readcustomer = $cus->find('all');

        if($readuser['permission']==1 || $readuser['permission']== 2 ){
            $cusumer->id_user = $readuser['id'];
        }

        $cusumer = $cus->newEntity();
        $cusumer->name = $req['full_name'];
        $cusumer->id_user = 0;
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

        //save và bảng get_email
        $get = $get_email->newEntity();
        $get->email = $req['email'];
        $get_email->save($get);

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
         
            $bill_detail = $getbill->newEntity();
            $bill_detail->id_bill = $billid['id'];
            $bill_detail->id_product = $key['id'];//$value['item']['id'];
            $bill_detail->quantity = $key['quantity'];
            $bill_detail->subtotal = $key['quantity'] *  $key['price'];
            $bill_detail->unit_price = $key['price'];
            $get_bill_detail->save($bill_detail);
        }


       
                   
        $array  = array('name'=>$cusumer->name);
        $this->Email->sendUserEmail($cusumer->email,'CakeFoody',$array,'order');
                    
                    
        
        $session->delete('cart');
        $session->delete('payment.total');
        $this->Flash->success(__('Cảm ơn bạn đã mua sản phẩm của chúng tôi. Đơn hàng đang được sử lý'));
        $this->redirect(URL_INDEX);
        
    }

     public function readtypeproduct()
     {
         $typeProducts = TableRegistry::get('typeproducts');
        $query = $typeProducts->find("all")-> toArray();
        $this->set('typeproducts',$query);
     }


    public function typeproduct($id)
     {   
        $this->readtypeproduct();
        $typeProducts = TableRegistry::get('typeproducts');
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
        $this->readtypeproduct();
        $product = $this->Products->get($id);
        $this->set('products', $product); 
       
        

        $type = $this->Products->find("all")
        ->where(['products.id_type >=' => $product->id_type ]
            );
        $this->paginate= array(
            'limit' => 10,
            'order' => [
            'products.id' =>' asc',

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
        $this->readtypeproduct();

        $product = $this->Products->newEntity();
        $this->Products->patchEntity($product,$this->request->data);
        if($this->request->is('post')) {
            $data = $this->request->data();           
            $name=$data['image'];
            $dir = WWW_ROOT .'img\uploads\ '. $name['name'] ;
            $a = move_uploaded_file($data['image']['tmp_name'], $dir);
            $product['image'] = '/webroot/img/uploads/'.$name['name'];
            if ($this->Products->save($product)) 
            {       
                $this->Flash->success(__('Sản Phẩm đã được thêm.'));
                
                return $this->redirect(URL_INDEX);
            } else {
                $this->Flash->error(__('Sản phẩm chưa được lưu. Thử lại.'));
            }   
        }
        
        $this->set('product',$product);
    }
    
    public function login()
    {
        $this->Products->Users->login();
    }

    public function editproduct($id)
    {   
       $this->readtypeproduct();
       $product = $this->Products->get($id);
       $get = $this->Products->find("all")
        ->select(['c.name'])
        ->hydrate(false)
        ->join([
            'table' => 'typeProducts',
            'alias' => 'c',
            'type' => 'LEFT',
            'conditions' => array(
                'c.id = products.id_type',
                )     
        ])
        ->where(['products.id_type =' => $product->id_type ])
        ->toArray();
        // $getname = $get['0']['name'];
        $getname = $get['0']['c']['name'];

       
        $image = $product->image;
        if ($this->request->is(['post', 'put'])) {
            //$name = $this->request->data['name'];
            $data = $this->request->data();
            
            $this->Products->patchEntity($product, $this->request->data);
            
                $name=$data['image'];
                
                if ($name['error'] == 0) {
                        $dir = WWW_ROOT .'img\uploads\ '. $name['name'] ;
                        $a = move_uploaded_file($data['image']['tmp_name'], $dir);
                        $product['image'] = '/img/uploads/'.$name['name'];
                }else { 
                        $product['image'] = $image;
                        pr( $product['image']);
               }
            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('Thông tin của sản phẩm đã được cập nhật.'));
                
                return $this-> redirect(array('action' => 'editproduct', $product->id));
            }
            $this->Flash->error(__('Không thể cập nhập thông tin cho sản phẩm. Thử lại .'));
        }
        $this->set(compact('product', 'getname'));        
    }

    public function delete($id)
    {

        $this->request->allowMethod(['post', 'delete']);
        
        $product = $this->Products->get($id);
var_dump($id);
die;
        if ($this->Products->delete($id)) {
            $this->Flash->success(__('Sản phẩm có id: {0} đã được xóa.', h($id)));
            return $this->redirect(URL_INDEX);
        }       
        
    }
}
?>
