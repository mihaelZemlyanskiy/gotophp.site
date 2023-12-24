
system/data.php - главные настройки и настройки главной

	title,desccriprion,keywords,og:image,h1 - у главной страницы

приписка на конце тайтла:
		title[_postscr] – активация на всем сайте
		title[_postscr_value] - значение

		_file_ext — формат файла который будет выводиться в url
			false - отключить
			.html – любое значение начинающиеся с точки
	title,h1 – страницы 404.php

	режим загрузки контента	
		dir – режим вывода контента из index.php в опредленных папках
		file - режим вывода контента из файла data_content.php
	
system/redirect.php – php редиректы
system/function.php – функции

template/meta/ – хранилище meta (title, description, keywords, robots. canonical, og и h1)
template/scripts/ – js 
template/style/ – css 

template/page.php – создание страниц, категорий с подкатегориями 
	_active – включена ли страница

content/ - хранилище контента
