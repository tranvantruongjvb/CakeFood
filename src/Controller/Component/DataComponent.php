<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;

class DataComponent extends Component
	{
	   public function randd($option=12){
	     $int = rand(0,10);
	     $a_z = "01234567891";
	     $rand_letter = $a_z[$int];
	     for($i=1;$i<$option;$i++){
	      $int1 = rand(0,10);
	      $rand_letter.= $a_z[$int1];
	     }
	     return $rand_letter;
	   }
	}
?>