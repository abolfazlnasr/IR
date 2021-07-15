<?php


namespace App\Infrastructure\Enums;


final class QueryEnum
{
    public const jobs = [
        'index' => 'jobs',
        'body' => [
//            'settings' => [
//                'analysis' => [
//                    'char_filter' => [
//                        'zero_width_spaces' => [
//                            'type' => 'mapping',
//                            'mappings' => ["\\u200c" => "u0020"]
//                        ]
//                    ],
//                    /*'filter' => [
//                        'persian_stops' => [
//                            'type' => 'stops',
//                            'stopwords' => 'persian'
//                        ]
//                    ],
//                    'analyzer' => [
//                        'rebuilt_persian' => [
//                            'tokenizer' => 'standard',
//                            'char_filter' => ['zero_width_spaces'],
//                            'filter' => [
//                                'lowercase',
//                                'decimal_digit',
//                                'arabic_normalization',
//                                'persian_normalization',
//                                'persian_stop'
//                            ]
//                        ]
//                    ]*/
//                ]
//            ],
            'mappings' => [
                'properties' => [
                    'suggest' => [
                        'type' => 'completion'
                    ],
                    'title' => [
                        'type' => 'text'
                    ],
                    'description' => [
                        'type' => 'text'
                    ],
                    'company' => [
                        'type' => 'text'
                    ],
                    'level' => [
                        'type' => 'text'
                    ],
                    'contract_type' => [
                        'type' => 'text'
                    ],
                    'link' => [
                        'type' => 'text'
                    ],
                ]
            ]
        ]
    ];
}
