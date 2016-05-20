<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speech_screen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit;
        }
        $this->load->model('speech_screen_model', 'screen');
        $this->load->model('progress_marks_model', 'progress');
        $this->load->model('sounds_model', 'sounds');
    }

    public function search()
    {
        $tmp = $this->screen->search($this->input->get('q'));
        $data['screens'] = $this->screen->convert_data($tmp);
        $data['sounds'] = $this->sounds->get_screen_sounds();
        $view['title'] = 'Результаты поиска - Речевой экран';
        $this->load->view('header', $view);
        $this->load->view('speech_screen/index', $data);
        $this->load->view('footer');
    }


    public function index()
    {
        $tmp = $this->screen->get_all();
        $data['screens'] = $this->screen->convert_data($tmp);
        $data['sounds'] = $this->sounds->get_screen_sounds();

        $view['title'] = 'Речевой экран';
        $this->load->view('header', $view);
        $this->load->view('speech_screen/index', $data);
        $this->load->view('footer');
    }

    public function create()
    {
        if ($this->form_validation->run('speech_screen') == FALSE)
        {
            $data['children'] = $this->screen->get_not_added_children();
            $data['sounds'] = $this->sounds->get_screen_sounds();
            $data['progress'] = $this->progress->get_all();
            $view['title'] = 'Создание - Речевой экран';
            $this->load->view('header', $view);
            $this->load->view('speech_screen/add', $data);
            $this->load->view('footer');

        }
        else
        {
            $sounds = $this->screen->prepare_addition($this->input->post());
            $insert_id = $this->screen->create($this->screen->screen_data);

            foreach ($sounds as &$item) {
                $item['speech_screen_id'] = $insert_id;
            }

            if ($this->screen->insert_sounds($sounds))
            {
                header('Location: /speech_screen');
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('speech_screen') == FALSE)
        {
            $tmp = $this->screen->get_one($id);
            $data['screen'] = $this->screen->convert_data_row($tmp);
            $data['sounds'] = $this->sounds->get_screen_sounds();
            $data['progress'] = $this->progress->get_all();
            $view['title'] = 'Редактирование - Речевой экран';
            $this->load->view('header', $view);
            $this->load->view('speech_screen/edit', $data);
            $this->load->view('footer');

        }
        else
        {
            $sounds = $this->screen->prepare_addition($this->input->post());
            $this->screen->edit($this->screen->screen_id, $this->screen->screen_data);

            if ($this->screen->edit_sounds($this->screen->screen_id, $sounds))
            {
                header('Location: /speech_screen');
                exit;
            }
        }
    }

    public function delete($id)
    {
        if ($this->screen->delete($id))
        {
            header('Location: /speech_screen/');
            exit;
        }
    }

}