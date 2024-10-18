<?php
$config = [
    [
        'section' => [
            'name' => 'Название раздела',
            'fields' => [
                'any_checkbox' => [
                    'label' => 'Пример чекбокса',
                    'type' => 'checkbox',
                    'value' => 'Y',
                    'description' => 'Пример описания свойства',
                ],
                'any_string' => [
                    'label' => 'Пример строки',
                    'type' => 'text',
                    'value' => '',
                    'size' => 60
                ],
                'any_select' => [
                    'label' => 'Пример списка',
                    'type' => 'select',
                    'value' => [
                        'value1' => 'значение1',
                        'value2' => 'значение2',
                        'value3' => 'значение3',
                        'value4' => 'значение5',
                    ],
                    'description' => 'Пример описания свойства',
                ],
                'any_textarea' => [
                    'label' => 'Пример поля ввода текста',
                    'type' => 'textarea',
                    'cols' => 40,
                    'rows' => 5
                ],
                'any_file' => [
                    'label' => 'Пример файла',
                    'type' => 'file',
                    'multiple' => 'N'
                ],
                'any_include_area' => [
                    'label' => 'Пример редактируемой области',
                    'type' => 'include_area',
                    'dir' => '/include/'
                ]
            ]
        ]
    ],
    [
        'section' => [
            'name' => 'Название раздела 2',
            'fields' => [
                'any_checkbox2' => [
                    'label' => 'Пример чекбокса 2',
                    'type' => 'checkbox',
                    'value' => 'Y',
                ],
                'any_string2' => [
                    'label' => 'Пример строки 2',
                    'type' => 'text',
                    'value' => '',
                    'size' => 60
                ]
            ]
        ]
    ]
];