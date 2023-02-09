<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Route;
use App\Models\ContentFor;

class Helper {

    public static function makeRoute($controller, $controller_class){

        Route::get($controller, $controller_class .'@index');
        Route::get($controller.'/add', $controller_class .'@create');
        Route::post($controller.'/add', $controller_class .'@store');
        Route::get($controller.'/edit/{id}', $controller_class .'@edit');
        Route::post($controller.'/edit/{id}', $controller_class .'@update');
        Route::get($controller.'/delete/{id}', $controller_class .'@destroy');
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

    public static function toOptions($data, $text, $value, $all = true)
    {
        $opt = [];

        if ($all) {
            $opt[] = ['text' => 'None', 'value' => ''];
        }

        foreach ($data as $d) {
            $label = '';
            if (is_array($text)) {
                $lbl = [];
                foreach ($text as $f) {
                    $lbl[] = $d[$f] ?? '';
                }
                $label = implode(' ', $lbl);
            } else {
                if (!is_null($text)) {
                    $label = $d[$text] ?? '';
                }
            }

            // debug('label ' . $label);
            if (strlen($label) > 50) {
                $label = substr($label, 0, 50) . ' ...';
            }

            if ($value == '_object') {
                $opt[] = ['text' => $label, 'value' => $d];
            } else {
                $opt[] = ['id' => ($d[$value] ?? ''), 'text' => $label, 'value' => ($d[$value] ?? '')];
            }
        }

        return $opt;
    }

    public static function getContentFor()
    {
        $contentFor = ContentFor::orderBy('seq', 'asc')->get();
        return $contentFor->toArray();
    }
}