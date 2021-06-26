<?php

namespace Application\Controllers;

use Application\Interfaces\RequestInterface;


class RequestController implements RequestInterface {


    public function get_params() {

        $request_method = $_SERVER["REQUEST_METHOD"];

        if ($request_method == "GET") {
            
            return $this->list_all_get_params();

        } elseif ($request_method == "POST") {

            return $this->list_all_post_params();
        } 
        
        return false;

    }

    function get_param ($key) {
        
        $request_method = $_SERVER["REQUEST_METHOD"];

        if ($request_method == "GET") {
            
            return $this->get_request_param($key);

        } elseif ($request_method == "POST") {

            return $this->post_request_param($key);
        } 
        
        return false;
        
    }

    private function get_request_param ($key) {
        if (isset ( $_GET ) &&  isset($_GET[$key] ) ) {

            return $_GET[$key];

        }
        return false;
    }

    private function post_request_param ($key) {
        
        $json_request_object = json_decode(file_get_contents("php://input"));
        
        if (isset ( $json_request_object ) &&  isset($json_request_object->{$key} ) ) {

            return $json_request_object->{$key};

        }

        return $false;
    }

    private function list_all_get_params() {
        
        $arr = (object)array();

        if (isset ( $_GET ) ) {
            
            foreach ( $_GET as $key => $value ) {
                
                $arr->$key = $value; 

            }            
        }

        return $arr;
    }

    private function list_all_post_params() {
        $arr = (object)array();

        $json_request_object = json_decode(file_get_contents("php://input"));

        if (isset ( $json_request_object ) ) {
            
            foreach ( $json_request_object as $key => $value ) {
                
                $arr->$key = $value; 

            }            
        }

        return $arr;
    }




}