<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department_Model extends CI_Model{

		public function __construct(){

   		parent::__construct();
    	$this->load->library('session');
    
	}


	public function CreateNewDepartment(){

		 $dataFromController = array("department"=> $this->input->post('department') );

        return $this->db->insert('department',$dataFromController);

	}


	public function FindDepartment(){


		$this->db->select('department');
		$this->db->select('departmentid');
        $this->db->from('department');
		$this->db->where('enabled', 1);
        // $this->db->where('department', $this->input->post('department'));
        $query = $this->db->get();
        return $query->result_array();

	}


	public function FindDepartmentById($param){


		$this->db->select('department');
		$this->db->select('departmentid');
        $this->db->from('department');
        $this->db->where('departmentid',$param);
		$this->db->where('enabled', 1);
        $query = $this->db->get();
        return $query->row_array();

	}


	// ME TRAIGO EL DEPARTAMENTO CON LAS CATEGORIAS Y SUBCATEGORIAS ASIGNADAS Departamentos>>>Categorías creadas
	public function DepartmentCategories($param){

		// $this->db->select('level_1');
		// $this->db->from('level_category_1');
		// $this->db->where('departmentid', $param);
		// $query = $this->db->get();
		// return $query->result_array();

		$this->db->select('A.department, A.departmentid, B.level_category_id_1, B.level_1');
		$this->db->from('department A');
		$this->db->join('level_category_1 B', 'A.departmentid  		 = B.departmentid');
		$this->db->where('A.departmentid',$param);
		$this->db->where('B.enabled', 1);
		
		$query = $this->db->get();
		return $query->result_array();

	}
   

	public function getLevel_2Information(){


		$this->db->select('A.level_1, A.level_category_id_1, A.departmentid, B.level_2, B.level_category_id_2, B.enabled' );
		$this->db->from('level_category_1 A' );
		$this->db->join('level_category_2 B', 'A.level_category_id_1 = B.level_category_id_1');
		$this->db->where('B.level_category_id_1', $_GET["level_category_id_1"]);
		$this->db->where('A.enabled', 1);
		$query = $this->db->get();

		return $query->result_array();
			
	}


	public function getLevel_1Information(){

			$this->db->select('level_1, level_category_id_1');
			$this->db->from('level_category_1');
			$this->db->where('level_category_id_1', $_GET["level_category_id_1"]);
			$this->db->where('enabled', 1);
			$query = $this->db->get();
			
			return $query->row_array();

		}


	// Cuento las cantidades de departamentos creados
	public function departmentListCount(){

		$this->db->select('department , departmentid');
		$this->db->from('department');
		$this->db->where('enabled', 1);
		$query = $this->db->get();
		return $query->result_array();


	}

	
	public function saveLevel_1(){

		$this->db->set('level_1',  			  $this->input->post('level_1'));
		$this->db->set('departmentid',  	  $this->input->post('departmentid'));
        $this->db->insert('level_category_1'); 

	}


	public function saveLevel_2(){

		$this->db->set('level_2',  			  $this->input->post('level_2'));
        $this->db->set('level_category_id_1', $this->input->post('level_category_id_1'));
		$this->db->set('departmentid',  	  $this->input->post('departmentid'));
        $this->db->insert('level_category_2'); 

	}


	public function deleteLevel_2(){

		$this->db->delete('level_category_2', array('level_category_id_2' => $this->input->post('level_category_id_2'))); 
	
		$this->db->where('level_category_id_2', $this->input->post('level_category_id_2'));
		

	}


	public function updateLevel_2(){

		$id   =  $this->input->post('level_category_id_2');
		$data = array('level_2'=>$this->input->post('level_2'));

		$this->db->where('level_category_id_2',$id);
		return $this->db->update('level_category_2', $data);	
		
	}


	public function enabledLevel_category_2(){


		$this->db->select('enabled');
		$this->db->from('level_category_2');
		$this->db->where('level_category_id_2', $this->input->post('level_category_id_2') );
		$query = $this->db->get();
		return $query->row_array();

	}

		public function changeEnabledLevel_category_2($level_category_id_2, $dataFromController){
	
		
		$data = array('enabled'=>$dataFromController);	
		$this->db->where('level_category_id_2', $level_category_id_2);
		return $this->db->update('level_category_2', $data);

	}


	public function getDepartmentLevels1(){

		$this->db->select('level_category_id_1, level_1');
		$this->db->from('level_category_1');
		$this->db->where('enabled', 1);
		$query = $this->db->get();
		return $query->result_array();
      
    }

	
	public function getDepartmentLevels2(){

		$this->db->select('level_2, level_category_id_2');
		$this->db->from('level_category_2');
		$this->db->where('enabled', 1);
		$query = $this->db->get();
		return $query->result_array();
      
    }

	public function updateDepartment(){


		$departmentId   = 				      $this->input->post('departmentid');
		$data 			= array('department'=>$this->input->post('department'));

		$this->db->where('departmentid',$departmentId);
		return $this->db->update('department', $data);


	}


	public function deleteDepartment(){


		$departmentId   = 				      $this->input->post('departmentid');
		$data 			= array('enabled'=>   $this->input->post('enabled'));

		$this->db->where('departmentid',$departmentId);
		return $this->db->update('department', $data);


	}


	public function updateCategorie(){


		$level_category_id_1   = 		     $this->input->post('level_category_id_1');
		$data 			= array('level_1'=>  $this->input->post('level_1'));

		$this->db->where('level_category_id_1'	   ,$level_category_id_1);
		return $this->db->update('level_category_1', $data);


	}


	public function deleteCategorie(){


		$level_category_id_1   = 		     $this->input->post('level_category_id_1');
		$data 		      	   = array('enabled' =>  0);

		$this->db->where('level_category_id_1'	   ,$level_category_id_1);
		return $this->db->update('level_category_1', $data);


	}


	


	public function updateSubCategories(){


		$level_category_id_1   = 		     $this->input->post('level_category_id_2');
		$data 			= array('level_2'=>  $this->input->post('level_2'));

		$this->db->where('level_category_id_2'	   ,$level_category_id_1);
		return $this->db->update('level_category_2', $data);


	}


	public function deleteSubCategorie(){


		$level_category_id_1   = $this->input->post('level_category_id_2');
		$data 		      	   = array('enabled' =>  0);

		$this->db->where('level_category_id_2'	   ,$level_category_id_1);
		return $this->db->update('level_category_2', $data);


	}


}