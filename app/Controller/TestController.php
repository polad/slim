<?php

class TestController
{
    public function index()
    {
        echo 'INDEX PAGE...';
    }
    
    public function set($id)
    {
        echo 'This is set() method with ID: ' . $id;
    }
}
