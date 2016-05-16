<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_card extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit;
        }
        $this->load->model('individual_card_model', 'card');
    }

    public function index()
    {
        $data['children'] = $this->card->get_added_children();
        $view['title'] = 'Индивидуальные карты развития';
        $this->load->view('header', $view);
        $this->load->view('individual_card/index', $data);
        $this->load->view('footer');

    }

    public function view($children_id)
    {
        $data['cards'] = $this->card->get_child_cards($children_id);
        $data['child'] = $this->children->get_child_full_name($children_id);
        $view['title'] = 'Индивидуальная карта развития';
        $this->load->view('header', $view);
        $this->load->view('individual_card/view', $data);
        $this->load->view('footer');
    }

    public function edit($id)
    {
        if ($this->form_validation->run('individual_card') == FALSE)
        {
            $data['card'] = $this->card->get_one($id);
            $view['title'] = 'Редактирование - Индивидуальная карта развития';
            $this->load->view('header', $view);
            $this->load->view('individual_card/edit', $data);
            $this->load->view('footer');
        }
        else
        {
            $data = $this->generic->get_post('children_id, is_beginning, pronunciation, syllable_word_structure, motility, color_perception, spatial_perception, eyes_count_operations, items_compare');
            $children_id = $this->input->post('children_id');
            if ($this->card->edit($id, $data))
            {
                redirect('/individual_card/view/' . $children_id);
                exit;
            }
        }
    }

    public function create()
    {
        if ($this->form_validation->run('individual_card') == FALSE)
        {
            $data['children'] = $this->card->get_not_added_children();
            $view['title'] = 'Создание - Индивидуальная карта развития';
            $this->load->view('header', $view);
            $this->load->view('individual_card/add', $data);
            $this->load->view('footer');

        }
        else
        {
            $data = $this->generic->get_post('children_id, is_beginning, pronunciation, syllable_word_structure, motility, color_perception, spatial_perception, eyes_count_operations, items_compare');
            $card = $this->card->check_period($data['children_id']);
            if ($data['is_beginning'] === $card->is_beginning)
            {
                //exception
                echo 'На этот период, для этого ребенка запись уже есть, пожалуйста, выберите на другой';
                $data['children'] = $this->card->get_not_added_children();
                $view['title'] = 'Создание - Индивидуальная карта развития';
                $this->load->view('header', $view);
                $this->load->view('individual_card/add', $data);
                $this->load->view('footer');
            }
            else
            {
                if ($this->card->create($data))
                {
                    header('Location: /individual_card');
                    exit;
                }
            }

        }
    }

    public function delete($id)
    {
        if ($this->card->delete($id))
        {
            redirect('/individual_card/');die;
        }
    }

    public function delete_all($children_id)
    {
        if ($this->card->delete_all($children_id))
        {
            redirect('/individual_card/');
            exit;
        }
    }
}