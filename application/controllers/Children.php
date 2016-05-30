<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit;
        }
        $this->load->model('children_groups_model', 'children_groups');
    }

    public function index()
    {
        $data['children'] = $this->children->get_all();
        $view['title'] = 'Список детей';
        $this->load->view('header', $view);
        $this->load->view('children/index', $data);
        $this->load->view('footer');

    }

    public function search()
    {
        $data['children'] = $this->children->search($this->input->get('q'));
        $view['title'] = 'Результат поиска - Список детей';
        $this->load->view('header', $view);
        $this->load->view('children/index', $data);
        $this->load->view('footer');

    }

    public function edit($id)
    {
        if ($this->form_validation->run('children') == FALSE)
        {
            $data['error'] = '';
            $data['groups'] = $this->children_groups->get_all();
            $data['child'] = $this->children->get_one($id);
            $view['title'] = 'Редактирование - Список детей';
            $this->load->view('header', $view);
            $this->load->view('children/edit', $data);
            $this->load->view('footer');

        }
        else
        {
            $config = [
                'upload_path'   => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => 4000
            ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('photo'))
            {
                if ( ! empty($_FILES['photo']['name']))
                {
                    $data['error'] = $this->upload->display_errors();
                    $data['groups'] = $this->children_groups->get_all();
                    $data['child'] = $this->children->get_one($id);
                    $view['title'] = 'Редактирование - Список детей';
                    $this->load->view('header', $view);
                    $this->load->view('children/edit', $data);
                    $this->load->view('footer');
                }
                else
                {
                    $data = $this->generic->get_post('full_name, date, address, date_PMPC, protocol_number, group_number');
                    $this->children->edit($id, $data);
                    header('Location: /children/');
                    exit;
                }
            }
            else {
                $data = $this->generic->get_post('full_name, date, address, date_PMPC, protocol_number, group_number');
                $data['photo'] = $this->upload->data('file_name');

                copy('./uploads/' . $data['photo'], './uploads/40x40/' . $data['photo']);

                $config = [
                    'image_library'  => 'gd2',
                    'source_image'   => './uploads/40x40/' . $data['photo'],
                    'maintain_ratio' => FALSE,
                    'width'          => 40,
                    'height'         => 40,
                ];
                $this->load->library('image_lib', $config);
                if ( ! $this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                }
                else
                {
                    $child_old = $this->children->get_photo($id);
                    if ($child_old->photo)
                    {
                        unlink('./uploads/' . $child_old->photo);
                        unlink('./uploads/40x40/' . $child_old->photo);
                    }
                    $this->children->edit($id, $data);
                    header('Location: /children/');
                    exit;
                }
            }
        }
    }

    public function delete($id)
    {
        if ($this->children->delete($id))
        {
            header('Location: /children/');
            exit;
        }
        else
        {
            // Exception
            echo 'error';
        }
    }

    public function create()
    {
        //var_dump($_POST);die;
        if ($this->form_validation->run('children') == FALSE)
        {
            $data['error'] = '';
            $data['groups'] = $this->children_groups->get_all();
            $view['title'] = 'Создание - Список детей';
            $this->load->view('header', $view);
            $this->load->view('children/add', $data);
            $this->load->view('footer');
        }
        else
        {
            $config = [
                'upload_path'   => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => 4000
            ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('photo'))
            {
                if ( ! empty($_FILES['photo']['name']))
                {
                    $data['error'] = $this->upload->display_errors();
                    $data['groups'] = $this->children_groups->get_all();
                    $view['title'] = 'Создание - Список детей';
                    $this->load->view('header', $view);
                    $this->load->view('children/add', $data);
                    $this->load->view('footer');
                }
                else
                {
                    $data = $this->generic->get_post('full_name, date, address, date_PMPC, protocol_number, group_number');
                    if ($id = $this->children->create($data))
                    {
                        header('Location: /children/edit/' . $id);
                        exit;
                    }
                }
            }
            else
            {
                $data = $this->generic->get_post('full_name, date, address, date_PMPC, protocol_number, group_number');
                $data['photo'] = '/uploads/' . $this->upload->data('file_name');
                if ($id = $this->children->create($data))
                {
                    header('Location: /children/edit/' . $id);
                    exit;
                }
            }
        }
    }
}