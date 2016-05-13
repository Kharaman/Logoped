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
        $this->load->view('individual_card/index');
    }

    public function create()
    {
        if ($this->form_validation->run('individual_card') == FALSE)
        {
            $data['children'] = $this->card->get_not_added_children();
            $this->load->view('individual_card/add', $data);
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
                $this->load->view('individual_card/add', $data);
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

}