<?php
$rota[] = ['/', 'HomeController@index'];
$rota[] = ['/posts', 'PostsController@index'];
$rota[] = ['/posts/{id}/show', 'PostsController@index'];









return $rota;