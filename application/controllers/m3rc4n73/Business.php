<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Business extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            "title"         => "TracklessBank - Business Registered",
            "content"       => "admin/bisnis/bisnis",
            'mn_opbisnis'   => "active",
            'mn_subbisnis'  => "active",
            "mn_bisnis"     => "active",
            "extra"         => "admin/bisnis/js/js_bisnis"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function business_category(){
        $data = array(
            "title"             => "TracklessBank - Business Category",
            "content"           => "admin/bisnis/category",
            'mn_opbisnis'       => "active",
            'mn_subcategory'    => "active",
            "mn_bisnis"         => "active",
            "extra"             => "admin/bisnis/js/js_category"
        );

        $this->load->view('admin_template/wrapper', $data);
    }


    public function historybisnis()
    {
        $result = apitrackless(URLAPI . "/v1/trackless/business/getBusiness");
        $data["token"]   = $this->security->get_csrf_hash();
        $data["history"] = $result->message;
        echo json_encode($data);
    }
    
    
    public function approve($id)
    {
        $result = apitrackless(URLAPI . "/v1/trackless/business/setBusiness?business_id=".base64_decode($id)."&status=".base64_encode('approve'));
        redirect("/m3rc4n73/business");
    }
    
    public function reject($id){
        $result = apitrackless(URLAPI . "/v1/trackless/business/setBusiness?business_id=".base64_decode($id)."&status=".base64_encode('delete'));
        redirect("/m3rc4n73/business");
    }
    
    public function categorybisnis()
    {
        $result = apitrackless(URLAPI . "/v1/trackless/business/getCategory");
        $data["token"]   = $this->security->get_csrf_hash();
        $data["history"] = $result->message;
        echo json_encode($data);
    }
    
    public function addcategory(){
        $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect(base_url() . "m3rc4n73/business/");
            return;
        }

        $input = $this->input;
        $category = $this->security->xss_clean($input->post("category"));
        $mdata=array(
                "category"  => $category
            );
        $result = apitrackless(URLAPI . "/v1/trackless/business/setCategory",json_encode($mdata));
        if (@$result->code!=200){
            $this->session->set_flashdata('failed', "Failed to add category");
            redirect(base_url() . "m3rc4n73/business/business_category");
            return;
        }
        $this->session->set_flashdata('success', "Category already saved");
        redirect(base_url() . "m3rc4n73/business/business_category");
        return;

    }

    public function updatecategory(){
        $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('id_category', 'Category ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect(base_url() . "m3rc4n73/business/");
            return;
        }

        $input = $this->input;
        $category = $this->security->xss_clean($input->post("category"));
        $id_category = $this->security->xss_clean($input->post("id_category"));
        
        $mdata=array(
            "id"        => $id_category,
            "category"  => $category
        );
        $result = apitrackless(URLAPI . "/v1/trackless/business/updateCategory",json_encode($mdata));
        if (@$result->code!=200){
            $this->session->set_flashdata('failed', "Failed to update category");
            redirect(base_url() . "m3rc4n73/business/business_category");
            return;
        }
        $this->session->set_flashdata('success', "Category already saved");
        redirect(base_url() . "m3rc4n73/business/business_category");
        return;

    }
}