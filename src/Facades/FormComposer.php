<?php
namespace Agent306\FormComposer\Facades;

use Illuminate\Support\Facades\Facade;

class FormComposer extends Facade
{
     protected static function getFacadeAccessor()
     {
          return 'form-composer';
     }
}
