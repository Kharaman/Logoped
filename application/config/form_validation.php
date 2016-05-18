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
    ],

    'speech_card' => [
        [
            'field' => 'children_id',
            'label' => 'Ф.И.О.',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'peu_number',
            'label' => '№ ДОУ',
            'rules' => 'required|numeric'
        ],
    ],

    'analysis' => [
        [
            'field' => 'children_id',
            'label' => 'Ф.И.О.',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'description',
            'label' => 'Описание',
            'rules' => 'required'
        ],
    ],

    'individual_card' => [
        [
            'field' => 'children_id',
            'label' => 'Ф.И.О.',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'is_beginning',
            'label' => 'Период',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'eyes_count_operations',
            'label' => 'Счетные операции глазами',
            'rules' => 'required|numeric'
        ],
    ],

    'work_schedule' => [
        [
            'field' => 'day',
            'label' => 'День недели',
            'rules' => 'required|numeric'
        ],
        [
            'field' => 'start_time',
            'label' => 'Время начала',
            'rules' => 'required'
        ],
        [
            'field' => 'end_time',
            'label' => 'Время конца',
            'rules' => 'required'
        ],
    ],

    'children_groups' => [
        [
            'field' => 'name',
            'label' => 'Имя группы',
            'rules' => 'required'
        ]
    ]


];