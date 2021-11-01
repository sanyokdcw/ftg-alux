<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Category,
    Subcategory,
    Product,
};
use App\Blog;

class SlugController extends Controller
{

    function strToSlug($collection){
        // Массив со всеми slug`ами
        $slugs = [];
        foreach ($collection as $item) {
        // Перевод символов в нижний регистр
        $string = mb_strtolower($item->name);
        // Разделение строки на массив
        $string = preg_split("//u", $string , -1, PREG_SPLIT_NO_EMPTY);
        $slug = '';
        foreach ($string as $char) {
            switch($char) {
                // русские символы заменяются на английские
                case 'а':
                    $slug = $slug.'a';
                    break;
                case 'б':
                    $slug = $slug.'b';
                    break;
                case 'в':
                    $slug = $slug.'v';
                    break;
                case 'г':
                    $slug = $slug.'g';
                    break;
                case 'д':
                    $slug = $slug.'d';
                    break;
                case 'е':
                    $slug = $slug.'e';
                    break;
                case 'ё':
                    $slug = $slug.'e';
                    break;
                case 'ж':
                    $slug = $slug.'zh';
                    break;
                case 'з':
                    $slug = $slug.'z';
                    break;
                case 'и':
                    $slug = $slug.'i';
                    break;
                case 'к':
                    $slug = $slug.'k';
                    break;
                case 'л':
                    $slug = $slug.'l';
                    break;
                case 'м':
                    $slug = $slug.'m';
                    break;
                case 'н':
                    $slug = $slug.'n';
                    break;
                case 'о':
                    $slug = $slug.'o';
                    break;
                case 'п':
                    $slug = $slug.'p';
                    break;
                case 'р':
                    $slug = $slug.'r';
                    break;
                case 'с':
                    $slug = $slug.'s';
                    break;
                case 'т':
                    $slug = $slug.'t';
                    break;
                case 'у':
                    $slug = $slug.'u';
                    break;
                case 'ф':
                    $slug = $slug.'f';
                    break;
                case 'х':
                    $slug = $slug.'h';
                    break;
                case 'ц':
                    $slug = $slug.'c';
                    break;
                case 'ч':
                    $slug = $slug.'ch';
                    break;
                case 'ш':
                    $slug = $slug.'sh';
                    break;
                case 'щ':
                    $slug = $slug.'sh';
                    break;
                case 'э':
                    $slug = $slug.'a';
                    break;
                case 'ю':
                    $slug = $slug.'u';
                    break;
                case 'я':
                    $slug = $slug.'ya';
                    break;
                case 'ы':
                    $slug = $slug.'i';
                    break;
                // Проелы на нижний прочерк
                case ' ':
                    $slug = $slug.'_';
                    break;
                // Английский алфавит остаётся
                case 'a':
                    $slug = $slug.'a';
                    break;
                case 'b':
                    $slug = $slug.'b';
                    break;
                case 'c':
                    $slug = $slug.'c';
                    break;
                case 'd':
                    $slug = $slug.'d';
                    break;
                case 'e':
                    $slug = $slug.'e';
                    break;
                case 'f':
                    $slug = $slug.'f';
                    break;
                case 'g':
                    $slug = $slug.'g';
                    break;
                case 'h':
                    $slug = $slug.'h';
                    break;
                case 'i':
                    $slug = $slug.'i';
                    break;
                case 'j':
                    $slug = $slug.'j';
                    break;
                case 'k':
                    $slug = $slug.'k';
                    break;
                case 'l':
                    $slug = $slug.'l';
                    break;
                case 'm':
                    $slug = $slug.'m';
                    break;
                case 'n':
                    $slug = $slug.'n';
                    break;
                case 'o':
                    $slug = $slug.'o';
                    break;
                case 'p':
                    $slug = $slug.'p';
                    break;
                case 'q':
                    $slug = $slug.'q';
                    break;
                case 'r':
                    $slug = $slug.'r';
                    break;
                case 's':
                    $slug = $slug.'s';
                    break;
                case 't':
                    $slug = $slug.'t';
                    break;
                case 'u':
                    $slug = $slug.'u';
                    break;
                case 'v':
                    $slug = $slug.'v';
                    break;
                case 'w':
                    $slug = $slug.'w';
                    break;
                case 'x':
                    $slug = $slug.'x';
                    break;
                case 'y':
                    $slug = $slug.'y';
                    break;
                case 'z':
                    $slug = $slug.'z';
                    break;
                // Числа остаются
                case '0':
                    $slug = $slug.'0';
                    break;
                case '1':
                    $slug = $slug.'1';
                    break;
                case '2':
                    $slug = $slug.'2';
                    break;
                case '3':
                    $slug = $slug.'3';
                    break;
                case '4':
                    $slug = $slug.'4';
                    break;
                case '5':
                    $slug = $slug.'5';
                    break;
                case '6':
                    $slug = $slug.'6';
                    break;
                case '7':
                    $slug = $slug.'7';
                    break;
                case '8':
                    $slug = $slug.'8';
                    break;
                case '9':
                    $slug = $slug.'9';
                    break;
            }
        }
        // Дубликат
        $count = 1;
        // Если данный slug является дубликатом, то добавляется '_1'
        while(in_array($slug, $slugs)){
            // Если дубликатов больше 1, удаляются 2 последних символа, т.е. '_1'
            if($count > 1) {
                $slug = substr($slug,0,-2);
            }
            // К строке добавляется номер дубликата
            $slug = $slug.'_'.$count;
            $count++;
        }
        $item->update(['slug' => $slug]);
        array_push($slugs, $slug);
    }
        return $collection.'done';
    }

    public function categories(){
        // опустошение slug`ов в таблице
        // Category::where('id', '>', 0)->update(['slug'=>NULL]);
        slugController::strToSlug(Category::all());
        slugController::strToSlug(Subcategory::all());
        slugController::strToSlug(Product::all());
        slugController::strToSlug(Blog::all());

        return 'done';
    }
}
