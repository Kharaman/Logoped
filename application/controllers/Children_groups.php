<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children_groups extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('children_groups_model', 'children_groups');
    }

    public function index()
    {
        $data['groups'] = $this->children_groups->get_all();
        $view['title'] = 'Список групп';
        $this->load->view('header', $view);
        $this->load->view('children_groups/index', $data);
        $this->load->view('footer');
    }

    public function create()
    {
        if ($this->form_validation->run('children_groups') == FALSE)
        {
            $view['title'] = 'Добавить группу';
            $this->load->view('header', $view);
            $this->load->view('children_groups/add');
            $this->load->view('footer');
        }
        else
        {
            $data = $this->generic->get_post('name');
            if ($this->children_groups->create($data))
            {
                redirect('/children_groups');
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('children_groups') == FALSE)
        {
            $data['group'] = $this->children_groups->get_one($id);
            $view['title'] = 'Редактирование - Группы';
            $this->load->view('header', $view);
            $this->load->view('children_groups/edit', $data);
            $this->load->view('footer');
        }
        else
        {
            $data = $this->generic->get_post('name');
            if ($this->children_groups->edit($id, $data))
            {
                redirect('/children_groups');
                exit;
            }
        }
    }

    public function delete($id)
    {
        if ($this->children_groups->delete($id))
        {
            redirect('/children_groups');
            exit;
        }
    }


}