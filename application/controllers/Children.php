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

    public function report()
    {
        $data = $this->children->get_report_data();
        $cols = count($data);
        $range = $cols + 1;

        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Список детей');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Ф.И.О. ребенка');
        $this->excel->getActiveSheet()->setCellValue('B1', 'Дата рождения');
        $this->excel->getActiveSheet()->setCellValue('C1', 'Адрес');
        $this->excel->getActiveSheet()->setCellValue('D1', 'Дата ПМПК');
        $this->excel->getActiveSheet()->setCellValue('E1', '№ протокола');
        $this->excel->getActiveSheet()->setCellValue('F1', '№ группы');

        $this->excel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1:F' . $range)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->getStyle('A1:F1')->applyFromArray(
            [
                'fill' => [
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => ['rgb' => 'D1D1D1']
                ]
            ]
        );

        foreach (range(0, $cols) as $col) {
            $this->excel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
        }

        for ($i = 0; $i < count($data); $i++)
        {
            $cell = $i + 2;
            $this->excel->getActiveSheet()->setCellValue('A' . $cell, $data[$i]->full_name);
            $this->excel->getActiveSheet()->setCellValue('B' . $cell, $data[$i]->date);
            $this->excel->getActiveSheet()->setCellValue('C' . $cell, $data[$i]->address);
            $this->excel->getActiveSheet()->setCellValue('D' . $cell, $data[$i]->date_PMPC);
            $this->excel->getActiveSheet()->setCellValue('E' . $cell, $data[$i]->protocol_number);
            $this->excel->getActiveSheet()->setCellValue('F' . $cell, $data[$i]->group_number);
        }

        $filename='children_report.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
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
        $child_old = $this->children->get_photo($id);
        if ($child_old->photo)
        {
            unlink('./uploads/' . $child_old->photo);
            unlink('./uploads/40x40/' . $child_old->photo);
            if ($this->children->delete($id))
            {
                header('Location: /children/');
                exit;
            }
        }
        else
        {
            if ($this->children->delete($id))
            {
                header('Location: /children/');
                exit;
            }
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
                else {
                    if ($id = $this->children->create($data)) {
                        header('Location: /children/edit/' . $id);
                        exit;
                    }
                }
            }
        }
    }
}