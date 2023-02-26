<?php

return [
    '__name' => 'api-user-address',
    '__version' => '0.1.0',
    '__git' => 'git@github.com:getmim/api-user-address.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/api-user-address' => ['install','update','remove'],
        'app/api-user-address' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'api' => NULL
            ],
            [
                'user-address' => NULL
            ],
            [
                'lib-form' => NULL
            ],
            [
                'lib-formatter' => NULL
            ],
            [
                'lib-address' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ApiUserAddress\\Controller' => [
                'type' => 'file',
                'base' => 'app/api-user-address/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'api' => [
            'apiMeAddress' => [
                'path' => [
                    'value' => '/me/address'
                ],
                'method' => 'GET',
                'handler' => 'ApiUserAddress\\Controller\\Address::index'
            ],
            'apiMeAddressUpdate' => [
                'path' => [
                    'value' => '/me/address'
                ],
                'method' => 'PUT',
                'handler' => 'ApiUserAddress\\Controller\\Address::update'
            ]
        ]
    ],
    'libForm' => [
        'forms' => [
            'api.me.address' => [
                'country' => [
                    'label' => 'Country',
                    'type' => 'select',
                    'rules' => [
                        'exists' => [
                            'model' => 'LibAddress\\Model\\AddrCountry',
                            'field' => 'id'
                        ]
                    ]
                ],
                'state' => [
                    'label' => 'State',
                    'type' => 'select',
                    'rules' => [
                        'exists' => [
                            'model' => 'LibAddress\\Model\\AddrState',
                            'field' => 'id'
                        ]
                    ]
                ],
                'city' => [
                    'label' => 'City',
                    'type' => 'select',
                    'rules' => [
                        'exists' => [
                            'model' => 'LibAddress\\Model\\AddrCity',
                            'field' => 'id'
                        ]
                    ]
                ],
                'district' => [
                    'label' => 'District',
                    'type' => 'select',
                    'rules' => [
                        'exists' => [
                            'model' => 'LibAddress\\Model\\AddrDistrict',
                            'field' => 'id'
                        ]
                    ]
                ],
                'village' => [
                    'label' => 'Village',
                    'type' => 'select',
                    'rules' => [
                        'exists' => [
                            'model' => 'LibAddress\\Model\\AddrVillage',
                            'field' => 'id'
                        ]
                    ]
                ],
                'zipcode' => [
                    'label' => 'Zip Code',
                    'type' => 'select',
                    'rules' => [
                        'exists' => [
                            'model' => 'LibAddress\\Model\\AddrZipcode',
                            'field' => 'id'
                        ]
                    ]
                ],
                'street' => [
                    'type' => 'textarea',
                    'label' => 'Street',
                    'rules' => []
                ],
                'location' => [
                    'type' => 'text',
                    'label' => 'Location',
                    'rules' => []
                ]
            ]
        ]
    ]
];
