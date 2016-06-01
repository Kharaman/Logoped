<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes_schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit;
        }
        $this->load->model('classes_schedule_model', 'classes_schedule');
        $this->load->model('children_groups_model', 'groups');
    }

    public function index()
    {
        $tmp = $this->classes_schedule->get_all();
        $data = [];
        foreach ($tmp as $row)
        {
            $data['classes'][$row->day][] = $row;
        }
        $view['title'] = 'Расписание занятий';
        $this->load->view('header', $view);
        $this->load->view('classes_schedule/index', $data);
        $this->load->view('footer');

    }

    public function create()
    {
        if ($this->form_validation->run('classes_schedule') == FALSE)
        {
            $data['children'] = $this->children->get_children_full_names();
            $data['groups'] = $this->groups->get_all();
            $view['title'] = 'Создание - Расписание занятий';
            $this->load->view('header', $view);
            $this->load->view('classes_schedule/add', $data);
            $this->load->view('footer');
        }
        else
        {
            if ($this->input->post('children_id'))
            {
                $data = $this->generic->get_post('day, time, children_id');
            }
            else
            {
                $data = $this->generic->get_post('day, time, group_number');
            }
            if ($this->classes_schedule->create($data))
            {
                header('Location: /classes_schedule');
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('classes_schedule') == FALSE)
        {
            $data['class'] = $this->classes_schedule->get_one($id);
            $data['children'] = $this->children->get_children_full_names();
            $data['groups'] = $this->groups->get_all();
            $view['title'] = 'Редактирование - Расписание занятий';
            $this->load->view('header', $view);
            $this->load->view('classes_schedule/edit', $data);
            $this->load->view('footer');

        }
        else
        {
            if ($this->input->post('children_id'))
            {
                $data = $this->generic->get_post('day, time, children_id');
            }
            else
            {
                $data = $this->generic->get_post('day, time, group_number');
            }
            if ($this->classes_schedule->edit($id, $data))
            {
                header('Location: /classes_schedule');
                exit;
            }
        }
    }

    public function delete($id)
    {
        if ($this->classes_schedule->delete($id))
        {
            header('Location: /classes_schedule');
            exit;
        }
    }

}