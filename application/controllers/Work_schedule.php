<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            exit;
        }
        $this->load->model('work_schedule_model', 'work_schedule');
    }

    public function index()
    {
        $data['schedule'] = $this->work_schedule->get_all();
        $view['title'] = 'График работы';
        $this->load->view('header', $view);
        $this->load->view('work_schedule/index', $data);
        $this->load->view('footer');

    }

    public function edit($id)
    {
        if ($this->ion_auth->in_group('teacher'))
        {
            $view['title'] = 'У вас нет доступа';
            $this->load->view('header', $view);
            $this->load->view('errors/forbid');
            $this->load->view('footer');
        }
        else 
        {
            if ($this->form_validation->run('work_schedule') == FALSE)
            {
                $data['schedule'] = $this->work_schedule->get_one($id);
                $view['title'] = 'Редактирование - График работы';
                $this->load->view('header', $view);
                $this->load->view('work_schedule/edit', $data);
                $this->load->view('footer');

            }
            else
            {
                $data = $this->generic->get_post('day, start_time, end_time');
                if ($this->work_schedule->edit($id, $data))
                {
                    redirect('/work_schedule');
                    exit;
                }
            }
        }
            
    }

    public function delete($id)
    {
        if ($this->ion_auth->in_group('teacher'))
        {
            $view['title'] = 'У вас нет доступа';
            $this->load->view('header', $view);
            $this->load->view('errors/forbid');
            $this->load->view('footer');
        }
        else {
            if ($this->work_schedule->delete($id))
            {
                redirect('/work_schedule');
                exit;
            }
        }
        
    }

    public function create()
    {
        if ( ! $this->ion_auth->in_group('teacher')) {
            if ($this->form_validation->run('work_schedule') == FALSE)
            {
                $view['title'] = 'Добавление - График работы';

                $this->load->view('header', $view);
                $this->load->view('work_schedule/add');
                $this->load->view('footer');

            }
            else
            {
                $days = $this->work_schedule->get_days();
                foreach ($days as $value)
                {
                    if ($value->day == $this->input->post('day'))
                    {
                        $data['error'] = 'Такой день уже есть, пожалуйста отредактируйте или выберите другой день';
                        $view['title'] = 'Добавление - График работы';
                        $this->load->view('header', $view);
                        $this->load->view('work_schedule/add', $data);
                        $this->load->view('footer');

                        break;
                    }
                    else
                    {
                        $data = $this->generic->get_post('day, start_time, end_time');
                        if ($this->work_schedule->create($data))
                        {
                            redirect('/work_schedule');
                            exit;
                        }
                    }
                }

            }
    }
    else 
    {
        $view['title'] = 'У вас нет доступа';
            $this->load->view('header', $view);
            $this->load->view('errors/forbid');
            $this->load->view('footer');
    } 



}
}