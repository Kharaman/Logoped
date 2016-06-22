<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis extends CI_Controller
{
    public $limit = 7;

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
            exit;
        }
        $this->load->model('analysis_model', 'analysis');
    }

    public function search()
    {
        $data['children'] = $this->analysis->search($this->input->get('q'));
        $data['pagination'] = '';

        $view['title'] = 'Анализ результативности';
        $this->load->view('header', $view);
        $this->load->view('analysis/index', $data);
        $this->load->view('footer');
    }

    public function ajax_search()
    {
        $data['children'] = $this->analysis->search($this->input->get('q'));
        $data['controller'] = 'analysis';
        $this->load->view('ajax_search', $data);
    }

    public function index()
    {
        $config = [
            'base_url'         => '/analysis/index/',
            'total_rows'       => $this->analysis->count(),
            'per_page'         => $this->limit,
            'use_page_numbers' => TRUE
        ];
        $this->pagination->initialize($config);

        $data['children'] = $this->analysis->get_added_children($this->limit);
        $data['pagination'] = $this->pagination->create_links();

        $view['title'] = 'Анализ результативности';
        $this->load->view('header', $view);
        $this->load->view('analysis/index', $data);
        $this->load->view('footer');

    }

    public function view($children_id)
    {
        $data['analysis'] = $this->analysis->get_children_analysis($children_id);
        $data['child'] = $this->children->get_child_full_name($children_id);
        $view['title'] = 'Анализ результативности';
        $this->load->view('header', $view);
        $this->load->view('analysis/view', $data);
        $this->load->view('footer');
    }

    public function create()
    {
        if ($this->form_validation->run('analysis') == FALSE)
        {
            $data['children'] = $this->children->get_children_full_names();
            $view['title'] = 'Создание - Анализ результативности';
            $this->load->view('header', $view);
            $this->load->view('analysis/add', $data);
            $this->load->view('footer');
        }
        else
        {
            $data = $this->generic->get_post('children_id, description');
            $data['date'] = date('Y-m-h');
            $children_id = $data['children_id'];
            if ($this->analysis->create($data))
            {
                redirect('/analysis/view/' . $children_id);
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('analysis') == FALSE)
        {
            $data['analysis'] = $this->analysis->get_one($id);
            $view['title'] = 'Редактирование - Анализ результативности';
            $this->load->view('header', $view);
            $this->load->view('analysis/edit', $data);
            $this->load->view('footer');

        }
        else
        {
            $data = $this->generic->get_post('description');
            $children_id = $this->input->post('children_id');
            if ($this->analysis->edit($id, $data))
            {
                header('Location: /analysis/view/' . $children_id);
                exit;
            }
        }
    }

    public function delete($children_id, $id)
    {
        if ($this->analysis->delete($id))
        {
            redirect('/analysis/view/' . $children_id);
            exit;
        }
    }

    public function delete_all($children_id)
    {
        if ($this->analysis->delete_all($children_id))
        {
            redirect('/analysis');
            exit;
        }
    }

}