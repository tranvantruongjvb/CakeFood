<?php 
namespace App\Controller\Component;

use Cake\Mailer\Email;
use Cake\Controller\Component;
class EmailComponent extends Component
{
	public function sendUserEmail($to,$subject,$arrayName = array(),$msg)
    {
       $email = new Email('default');
       $email
            ->transport('gmail')
            ->from(['tranvantruong.jvb@gmail.com' => 'tranvantruong.jvb@gmail.com'])
            ->to($to)
            ->subject($subject)
            ->emailFormat('html')
            ->template($msg)
            ->set(['arrayName'=>$arrayName]) //set username để gọi tên cho folder html
            ->viewVars(array($msg => $msg))
            ->send($msg); 
            // pr($arrayName);die;
    }
}

 ?>
