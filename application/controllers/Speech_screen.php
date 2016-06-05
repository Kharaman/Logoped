<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speech_screen extends CI_Controller
{

    public $limit = 2;

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
        $config = [
            'base_url'         => '/speech_screen/index/',
            'total_rows'       => $this->screen->count(),
            'per_page'         => $this->limit,
            'use_page_numbers' => TRUE
        ];
        $this->pagination->initialize($config);

        $tmp = $this->screen->get_all($this->limit);
        $data['screens'] = $this->screen->convert_data($tmp);
        $data['sounds'] = $this->sounds->get_screen_sounds();
        $data['pagination'] = $this->pagination->create_links();

        $view['title'] = 'Речевой экран';
        $this->load->view('header', $view);
        $this->load->view('speech_screen/index', $data);
        $this->load->view('footer');
    }


    public function report()
    {
        $tmp = $this->screen->get_all();
        $screens = $this->screen->convert_data($tmp);
        $sounds = $this->sounds->get_screen_sounds();


        $cols = count($screens);
        $range = $cols + 1;

        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Речевой экран');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Ф.И.О. ребенка');
        $this->excel->getActiveSheet()->setCellValue('B1', 'ФФ. восприятие');
        $this->excel->getActiveSheet()->setCellValue('C1', 'Год обучения');
        $this->excel->getActiveSheet()->setCellValue('D1', 'Диагноз');

        $col_letter = 'E';
        foreach ($sounds as $sound)
        {
            $this->excel->getActiveSheet()->setCellValue($col_letter . '1', $sound->name);
            $col_letter++;
        }
        $col_letter = chr(ord($col_letter) - 1);

        $this->excel->getActiveSheet()->getStyle('A1:' . $col_letter . '1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1:' . $col_letter . $range)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->getStyle('A1:' . $col_letter . '1')->applyFromArray(
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


        for ($i = 0; $i < count($screens); $i++)
        {
            $cell = $i + 2;
            $this->excel->getActiveSheet()->setCellValue('A' . $cell, $screens[$i]['full_name']);
            $this->excel->getActiveSheet()->setCellValue('B' . $cell, $screens[$i]['ff_perception']);
            $this->excel->getActiveSheet()->setCellValue('C' . $cell, $screens[$i]['study_year']);
            $this->excel->getActiveSheet()->setCellValue('D' . $cell, $screens[$i]['diagnosis']);
            $col_letter = 'E';
            foreach ($screens[$i]['sounds'] as $sound)
            {
                $this->excel->getActiveSheet()->setCellValue($col_letter++ . $cell, $sound['progress_symbol']);
            }
        }

        $filename='speech_screen_report.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function ajax_search()
    {
        $data['children'] = $this->screen->ajax_search($this->input->get('q'));
        $data['controller'] = 'speech_screen';
        $this->load->view('ajax_search', $data);
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