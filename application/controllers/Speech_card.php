<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speech_card extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit;
        }
        $this->load->model('speech_card_model', 'speech_card');
    }

    public function index()
    {
        $data['cards'] = $this->speech_card->get_added_children();
        $this->load->view('speech_card/index', $data);
    }

    public function create()
    {
        if ($this->form_validation->run('speech_card') == FALSE)
        {
            $data['children'] = $this->speech_card->get_not_added_children();
            $this->load->view('speech_card/add', $data);
        }
        else
        {
            $data = $this->generic->get_post('children_id, peu_number, enrollment_date, parent_complaints, native_language, motility_state, hearing, general_development, attention, efficiency, memory, voice, timbre, breath, diction, vocal_cords, teeth, lips, tongue, movement, bite');
            if ($this->speech_card->create($data))
            {
                redirect('/speech_card');
                exit;
            }
        }
    }

    public function edit($id)
    {
        if ($this->form_validation->run('speech_card') == FALSE)
        {
            $tmp = $this->plan->get_one($id);
            $this->load->view('individual_plan/edit', $data);
        }
        else
        {
            $sounds = $this->plan->prepare_addition($this->input->post());
            $this->plan->edit($this->plan->plan_id, $this->plan->plan_data);

            if ($this->plan->edit_sounds($this->plan->plan_id, $sounds))
            {
                header('Location: /');
                exit;
            }
        }
    }


}