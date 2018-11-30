<?php 

	class Home extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('Login_model');
			$this->load->Library('form_validation');
		}


		public function index()
		{

				
			$data['candidates'] = $this->Login_model->get_registered();

			

			if(isset($_POST['add']))
			{

				$fullname = $this->input->post('fullname');
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$insert_data  = array(
					'login_fullname' => $fullname,
					'login_username' => $username,
					'login_password' => $password
				);

				if($_POST['add'] == 'Submit')
				{
					$this->Login_model->insert('login',$insert_data);
				}
				else if($_POST['add'] == 'Update')
				{
					$id =$this->input->post('login_id');
					$where_data = array(
							'login_id' => $id
						);
					$this->Login_model->update('login',$where_data,$insert_data);
				}

				redirect('home/index');

			}

			if(isset($_POST['del']))
			{
				$id = $this->input->post('cand_id');
				$where_data = array(
							'login_id' => $id
						);
				$this->Login_model->delete('login',$where_data);
			}
			
			
			$this->load->view('includes/header');
			$this->load->view('home',$data);
			$this->load->view('includes/footer');

		}

		public function commonDashboard($page,$data)
		{
			$this->load->view('includes/header');
			$this->load->view($page,$data);
			$this->load->view('includes/footer');
		}

		public function login(){

			if(isset($_POST['login']))
			{

				$this->form_validation->set_rules('uname','UserName Required','required');
				$this->form_validation->set_rules('password','Password Required','required');

				if($this->form_validation->run() == true)
				{
					$uname = $this->input->post('uname');
					$password = $this->input->post('password');

					$res = $this->Login_model->check_login($uname,$password);

					

					if(!empty($res))
					{
						$data['fullname'] = $res[0]->login_fullname;
						$this->commonDashboard('main',$data);
						return ;
					}
					else
					{
						$data['message'] = 'Username or Password is wrong';
						$this->commonDashboard('login',$data);
						return ;
					}
				}
				

				
			}

			$this->commonDashboard('login','');

		}


	}

 ?>