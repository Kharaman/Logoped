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
    ]


];