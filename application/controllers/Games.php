<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Games extends CI_Controller {

    public function index()
    {
        $view['title'] = 'Развивающие игры';
        $this->load->view('header', $view);
        $this->load->view('games/index');
        $this->load->view('footer');
    }

    public function first_letter()
    {
        $view['title'] = 'Первая буква';
        $this->load->view('header', $view);
        $this->load->view('games/first_letter');
        $this->load->view('footer');
    }
    
    public function vowels()
    {
        $view['title'] = 'Гласные буквы';
        $this->load->view('header', $view);
        $this->load->view('games/vowels');
        $this->load->view('footer');
    }

    public function consonants()
    {
        $view['title'] = 'Согласные буквы';
        $this->load->view('header', $view);
        $this->load->view('games/consonants');
        $this->load->view('footer');
    }

    public function alphabet()
    {
        $view['title'] = 'Алфавит';
        $this->load->view('header', $view);
        $this->load->view('games/alphabet');
        $this->load->view('footer');
    }

    public function object()
    {
        $view['title'] = 'На какую букву начинается слово?';
        $this->load->view('header', $view);
        $this->load->view('games/object');
        $this->load->view('footer');
    }

}

/* End of file Games.php */
/* Location: ./application/controllers/Games.php */