<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {
    
	/**
   * Get All Data from this method.
   *
   * @return Response
   */
   
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0){
      if(!empty($id)){
         $data = $this->db->get_where("disciplinas", ['id_disciplina' => $id])->row_array();
      }else{
         $data = $this->db->get("disciplinas")->result();
      }
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
      $input = $this->input->post();
      $this->db->insert('disciplinas',$input);
      $this->response(['Disciplina agregada'], REST_Controller::HTTP_OK);
   }

   public function index_put($id)
   {
      $input = $this->put();
      $this->db->update('disciplinas', $input, array('id_disciplina'=>$id));
      $this->response(['Disciplina actualizada.'], REST_Controller::HTTP_OK);
   }

   public function index_delete($id)
   {
      $this->db->delete('disciplinas', array('id_disciplina'=>$id));
      $this->response(['Disciplina eliminada.'], REST_Controller::HTTP_OK);
   }

}