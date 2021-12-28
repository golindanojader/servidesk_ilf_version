<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Ticket_Model extends CI_Model{

    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('image_lib');
        
    }




    // BUSCA TICKETS PENDIENTE

    public function ValidateTicketByStatus(){

        $this->db->select('A.TICKETNUM');
        $this->db->select('B.CREATED');
        $this->db->from('ticket A');
        $this->db->join('ticket_date B','A.TICKETID = B.TICKETID');
        $this->db->where('A.STATUS',1);
        $this->db->where('A.USER_ID', $_SESSION['ID']);
        $query = $this->db->get();
        return $query->row();

        // $this->db->select('TICKETNUM');
        // $this->db->from('ticket');
        // $this->db->where('STATUS',1);
        // $this->db->where('USER_ID', $_SESSION['ID']);
        
        // $query = $this->db->get();
        // return $query->row();

    }


    public function ValidateTicket(){

        $this->db->select('TICKETNUM');
        $this->db->order_by('TICKETNUM','DESC');
        $this->db->from('ticket');
        $query = $this->db->get();

        return $query->row();

    }


    public function saveTicketId(){

        $dataFromController = array("TICKETNUM" => $this->input->post('TICKETNUM'),
                                    "USER_ID"   => $_SESSION['ID'],
                                    "STATUS" => 1);

        $this->db->insert('ticket',$dataFromController);

    }


    public function getTicketByUser(){

        $this->db->select('TICKETID');
        $this->db->from('ticket');
        $this->db->where('TICKETNUM', $this->input->post('TICKETNUM'));
        $this->db->where('USER_ID', $_SESSION['ID']);
        $this->db->order_by('TICKETID', 'DESC');
        $query = $this->db->get();
        return $query->row();
        
    
    }


    public function saveCreationDateTicket($dataFromController){

        $actualDate  =  date('Y-m-d H:m:s');
        $this->db->set('TICKETID', $dataFromController);
        $this->db->set('CREATED', $actualDate);
        $this->db->insert('ticket_date');  // Produces: INSERT INTO mytable (`name`) VALUES ('{$name}')
       

    }



    public function ticketDate(){

        $this->db->select('A.CREATED');
        $this->db->from('ticket_date A');
        $this->db->join('ticket B', 'A.TICKETID = B.TICKETID');
        $this->db->order_by('A.TICKETID', 'DESC');
        $query = $this->db->get();
        return $query->row();

    }


    public function listAdminUser(){

        $this->db->select('username, name, lastname');
        $this->db->from('user');
        $this->db->where('STATUS', 300);
        $query = $this->db->get();
        return $query->result_array();

    }


    public function departmentList(){

        $this->db->select('department, departmentid');
        $this->db->from('department');
        $this->db->where('enabled', 1);
        $query = $this->db->get();
        return $query->result_array();

    }

    //EN EL PANEL DE CREACION DE TICKET SOLO LLAMA A SISTEMAS
    public function departmentListSistemas(){

        $this->db->select('department, departmentid');
        $this->db->from('department');
        $this->db->where('departmentid', 49);
        $this->db->where('enabled', 1);
        $query = $this->db->get();
        return $query->result_array();

    }

    

    public function get_category_level_1(){

        $this->db->select('level_category_id_1, level_1, departmentid');
        $this->db->from('level_category_1');
        $this->db->where('departmentid', $this->input->post('categoryid'));
        $this->db->where('enabled', 1);
        $query = $this->db->get();
        return $query->result_array();

    }


    public function get_category_level_2(){

        $this->db->select('level_category_id_1, level_category_id_2,  level_2, departmentid');
        $this->db->from('level_category_2');
        $this->db->where('departmentid', $this->input->post('departmentid'));
        $this->db->where('level_category_id_1', $this->input->post('level_category_id_1'));
        $this->db->where('enabled', 1 );
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_category_level_3(){


        $this->db->select('level_category_id_1, level_category_id_2, level_category_id_3, level_3, departmentid');
        $this->db->from('level_category_3');
        $this->db->where('departmentid', $this->input->post('categoryid'));
        $this->db->where('level_category_id_1', $this->input->post('level_category_id_1'));
        $this->db->where('level_category_id_2', $this->input->post('level_category_id_2'));
        $query = $this->db->get();
        return $query->result_array();


    }


    public function saveInformationTicket($image){

        $this->db->set('ticketnum',              $this->input->post('ticketid'));
        $this->db->set('description',            $this->input->post('description'));
        $this->db->set('status',                 $this->input->post('status'));  
        $this->db->set('departmentid',           $this->input->post('departmentid'));
        $this->db->set('user_id',                $this->input->post('user_id'));
        $this->db->set('priority',               $this->input->post('priority'));
        $this->db->set('level_category_id_1',    $this->input->post('level_category_id_1'));
        $this->db->set('level_category_id_2',    $this->input->post('level_category_id_2')); 
        $this->db->set('image', $image); 
        $this->db->where('ticketnum',            $this->input->post('ticketid'));
        $this->db->where('user_id',              $this->input->post('user_id'));
        $this->db->update('ticket');
  
    
    }

    // **********************************************************
    // ME TRAIGO TODOS LOS TICKETS PENDIENTES
    // **********************************************************
     public function getTicketStatus_1(){


        $this->db->select('A.ticketid, A.ticketnum, A.description, A.priority, A.status as status_ticket, A.image, 
                           B.created, B.changed, B.status as status_date, B.expiration,
                           C.department,
                           D.username,
                           D.name,
                           D.lastname,
                           E.level_1,
                           F.level_2
                           ');
        $this->db->from('ticket A');
        $this->db->join('ticket_date B',      'A.TICKETID            = B.TICKETID');
        $this->db->join('department C',       'A.DEPARTMENTID        = c.departmentid');
        $this->db->join('user D',             'A.user_id             = d.user_id');
        $this->db->join('level_category_1 E', 'A.level_category_id_1 = E.level_category_id_1');
        $this->db->join('level_category_2 F', 'A.level_category_id_2 = F.level_category_id_2');
        $this->db->where('A.status',  2);
        $this->db->order_by(' B.created','DESC');
        $query = $this->db->get();
        return $query->result_array();


    
}

public function changeStatusTicket(){

        $this->db->set('status',                 $this->input->post('status'));
        $this->db->set('message',                $this->input->post('message'));
        $this->db->where('ticketnum',            $this->input->post('ticketnum'));
        $this->db->update('ticket');
    

}

public function closeTicketByDate(){

    $this->db->set('changed',  date('Y-m-d H:m:s'));
    $this->db->where('ticketid', $this->input->post('ticketid'));
    $this->db->update('ticket_date');

}


// *******************************************************************************
// ME TRAIGO TODOS LOS TICKETS POR ESTATUS 3 (FINALIZADOS)(USUARIO ADMINISTRADOR)
// *******************************************************************************

public function getTicketStatus_3(){

    $this->db->select('A.ticketnum, A.description, A.priority, A.status as status_ticket,  A.image, A.message,
    B.created, B.changed, B.status as status_date, B.expiration,
    C.department,
    D.username,
    D.name,
    D.lastname,
    D.email,
    E.level_1,
    F.level_2,
    G.department as departmentUser');
    $this->db->from('ticket A');
    $this->db->join('ticket_date B',      'A.TICKETID            = B.TICKETID');
    $this->db->join('department C',       'A.departmentid        = C.departmentid');
    $this->db->join('user D',             'A.user_id             = D.user_id');
    $this->db->join('level_category_1 E', 'A.level_category_id_1 = E.level_category_id_1');
    $this->db->join('level_category_2 F', 'A.level_category_id_2 = F.level_category_id_2');
    $this->db->join('department G',       'D.departmentid        = G.departmentid');
     $this->db->order_by('A.ticketnum DESC', 'B.changed ASC');
    $this->db->where('A.status',  3);
   
    $query = $this->db->get();
    return $query->result_array();


}


// *************************************************************
//ME TRAIGO CANTIDAD DE TICKET CREADOS, FINALIZADOS, PENDIENTES.
// *************************************************************
public function ticketsCounts(){

  
    $this->db->select('status');
    $this->db->from('ticket');
    $this->db->where('user_id',  $_SESSION['ID']);
    $query = $this->db->get();
    return  $query->result_array();

}






// ************************************************************************
//ME TRAIGO CANTIDAD DE TICKET CREADOS, FINALIZADOS, PENDIENTES. (CLIENTE)
// ************************************************************************
public function getTicketStatusUser(){


    $this->db->select('A.ticketnum, A.description, A.priority, A.image, A.message, A.status as status_ticket,  
    B.created, B.changed, B.status as status_date, B.expiration,
    C.department,
    D.username,
    D.name,
    D.email,
    D.lastname,
    E.level_1,
    F.level_2,
    G.department as departmentUser');
    $this->db->from('ticket A');
    $this->db->join('ticket_date B',      'A.TICKETID            = B.TICKETID');
    $this->db->join('department C',       'A.departmentid        = c.departmentid');
    $this->db->join('user D',             'A.user_id             = d.user_id');
    $this->db->join('level_category_1 E', 'A.level_category_id_1 = E.level_category_id_1');
    $this->db->join('level_category_2 F', 'A.level_category_id_2 = F.level_category_id_2');
    $this->db->join('department G',       'D.departmentid        = G.departmentid');
    $this->db->where('A.user_id', $_SESSION["ID"]);
    $this->db->order_by(' A.status', 'ASC');
    $query = $this->db->get();
    return $query->result_array();


}

}
