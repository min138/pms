<?php

$this->load->view('includes/header',$this->data);
$this->load->view($this->data['page_content'],$this->data);
$this->load->view('includes/footer',$this->data);
