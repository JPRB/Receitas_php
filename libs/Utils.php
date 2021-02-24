<?php

class Utils
{

    public static function create_key($num_digits = 10){
        $pass_digits = 'ABCDEFGHIJLMNOPQRSTUVXZKWY'.
            'abcdefghijlmnopqrstuvxzkwy'.
            '0123456789';
        //'!#';
        $pass = '';
        for($i=0;$i<$num_digits;$i++){
            $pass.= $pass_digits[mt_rand(0,  strlen($pass_digits)-1)];
        }

        return $pass;
    }



}