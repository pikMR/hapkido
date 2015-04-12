<?php
namespace App\Http\Middleware;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class IsUser extends IsType{
    public function getType(){
        return 'user';
    }
}
