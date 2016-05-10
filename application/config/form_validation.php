<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'children' => [
        [
            'field' => 'full_name',
            'label' => 'Ф.И.О.',
            'rules' => 'required'
        ],

        [
            'field' => 'date',
            'label' => 'Дата рождения',
            'rules' => 'required'
        ],

        [
            'field' => 'address',
            'label' => 'Адресс',
            'rules' => 'required'
        ],

        [
            'field' => 'date_PMPC',
            'label' => 'Дата обследования ПМПК',
            'rules' => 'required'
        ],

        [
            'field' => 'protocol_number',
            'label' => 'Номер протокола',
            'rules' => 'required'
        ],

        [
            'field' => 'group_number',
            'label' => 'Номер группы',
            'rules' => 'required'
        ],

    ],

    'speech_screen' => [
        [
            'field' => 'children_id',
            'label' => 'Ф.И.О.',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'ff_perception',
            'label' => 'ФФ. восприятие',
            'rules' => 'required'
        ],
        [
            'field' => 'study_year',
            'label' => 'Год обучения',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'diagnosis',
            'label' => 'Диагноз',
            'rules' => 'required'
        ],
    ],

    'individual_plan' => [
        [
            'field' => 'children_id',
            'label' => 'Ф.И.О.',
            'rules' => 'required|numeric'
        ],
    ],

    'classes_schedule' => [
        [
            'field' => 'day',
            'label' => 'День недели',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'time',
            'label' => 'Время',
            'rules' => 'required'
        ],
        [
            'field' => 'children_id',
            'label' => 'Ф.И.О.',
            'rules' => 'numeric'
        ],
        [
            'field' => 'group_number',
            'label' => '№ группы',
            'rules' => 'numeric'
        ],
    ]


];