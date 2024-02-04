<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Login extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_admin');
    }
    public function login_get(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // $adminModel = new _admin();
        $result = $this->m_admin->login();

        if($result){
            $this->response([
                'status' => true,
                'message' => "Login successful",
            ], RestController::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => "Login failed",
            ], RestController::HTTP_BAD_REQUEST);
        $this->response([
                    'status' => true,
                    'message' => "Login successful",
                ], RestController::HTTP_OK);
        }     
        
    }

    public function register_post(){

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $authModel = new Auth();
        $result = $authModel->register($data);

        if ($result) {
            $this->response([
                'status' => true,
                'message' => "Registration successfully",
            ],RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Register failed",
            ], RestController::HTTP_BAD_REQUEST);
        }     
        
    }

} 