<?php

return [

    'driver' => 'gd',

    'images_path' => 'images',

    'presets' => [
        'hq' => [
            'widen' => '720',
            'watermark' => 'default'
        ],

        'sd' => [
            'resize' => ['120', '120'],
            'quality' => '85'
        ]
    ],

    'watermarks' => [
        'default' => [
            'path' => 'img/copy.png',
            'size' => '10',
            'position' => 'bottom-right',
            'opacity' => '90'
        ]
    ]

];
