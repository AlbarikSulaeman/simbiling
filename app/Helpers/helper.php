<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Route;

class Helper {

    public static function makeRoute($controller, $controller_class){

    //        Route::get('/'.$controller.'/list/{filter?}', $controller_class.'@getList');
            Route::get('/'.$controller, $controller_class.'@index');
            // Route::post('/'.$controller, $controller_class.'@postIndex');
            Route::get('/'.$controller.'/add', $controller_class.'@getAdd');
            Route::post('/'.$controller.'/commit', $controller_class.'@postAdd');
        }


    public static function randomstring($length = 5, $type = 'numeric'){
        $a = '';
        if($type == 'numeric') {
            for ($i = 0; $i < $length; $i++) {
                $a .= mt_rand(0, 9);
            }
        }elseif($type == 'alpha'){
            $a = self::alphaRandom($length);
        }elseif($type == 'alphanumeric'){
            $a = self::alphaNumericRandom($length);
        }else{
            $a = Str::random($length);
        }

        return $a;
    }

    public static function alphaRandom($length = 16)
    {
        $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public static function alphaNumericRandom($length = 16)
    {
        $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public static function currency($number, $dec = 2, $dsep =',', $tsep = '.')
    {
        if(is_null($number)){
            return '';
        }
        $number = doubleval($number);

        return number_format($number, $dec, $dsep, $tsep);

    }
    public static function percent($number, $dec = 0, $dsep =',', $tsep = '.')
    {
        if(is_null($number)){
            return '';
        }

        $number = doubleval($number * 100);

        return number_format($number, $dec, $dsep, $tsep);

    }

    public static function decimal($number, $dec = 0, $dsep ='.', $tsep = '.')
    {
        if(is_null($number)){
            return '';
        }

        $number = doubleval($number);

        return number_format($number, $dec, $dsep, $tsep);

    }
}