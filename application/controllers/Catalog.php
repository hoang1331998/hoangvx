<?php
    class Success extends MY_Controller{

        function __construct()
		{
			parent:: __construct();
			$this->load->model('Catalog_model');
		}
    }
?>