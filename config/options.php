<?php

// acceso con config('options.types')
return array(
  'types' => [
      '' => 'Seleccione un tipo',
      'admin' => 'Administrador',
      'editor' => 'Editor',
      'contributor' => 'Instructor',
      'subscriber' => 'Subscriptor',
      'user' => 'Usuario'],
    'references' => [
       'admin/users'=>'admin',
        'admin/avanzado'=>['contributor','admin'],
        'admin/users/create'=>'admin',
        'profile'=>['auth','user','admin','contributor','editor'],
        'appeals'=>['editor','contributor'],
        'appeals/remove'=>['editor','contributor'],
        'help'=>'user',
    ]
);
