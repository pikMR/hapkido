<?php
namespace App\Http\Middleware;
use App\Http\Middleware\isType;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class IsAdmin extends isType{
    
    public function getType(){
        return 'admin';
    }
}
