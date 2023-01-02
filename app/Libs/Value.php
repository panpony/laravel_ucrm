<?php
namespace App\Libs;

class Value
{
    use HasFactory;

    /*--------------------------------------------------
    /* 商品情報
    /*------------------------------------------------*/
    /**
     *  ユーザー入力のValue値を表示する（過去の入力データ > DBに保存されているデータ）
     *
     * @param int $is_sailing カラム「is_sailing」の登録値
     * @return string 「販売中」もしくは「品切れ」
     */

    public static function is_sailingValue($is_sailing)
    {
        return $is_sailing ? '販売中' : '品切れ';
    }
}
