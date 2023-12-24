<?php
$site_settings=[
    'title'=>[
                'value'=>'Название сайта',
                '_postscr'=>false, 
                '_postscr_value'=>' - ООО ТЕСТ',
                ],
    'description'=>'Описание сайта ',
    'keywords'=>[
                    '_active'=>false,
                    'value'=>'Сайт',
                ],
    'canonical'=>[
                    '_active'=>false,
                    'value'=>'http://site.com',
                ],
    'robots'=>'',
    'og_image'=>'upload/image/image.jpg',
    'h1'=>'Заголовок страницы',
    '_file_ext'=>false, //.hmtl, .php, / ...
    404=>[
        'title'=>'404',
        'h1'=>'404 not found',
    ],
    'load_content'=>'dir',//dir, file
];
?>
