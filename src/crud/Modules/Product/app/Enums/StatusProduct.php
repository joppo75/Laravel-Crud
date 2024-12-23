<?php

namespace Modules\Product\Enums;

enum StatusProduct: int
{
    case EM_ESTOQUE = 1;
    case EM_REPOSICAO = 2;
    case EM_FALTA = 3;

    public static function fromLabel(string $status): StatusProduct
    {
        return match (strtolower($status)) {
            'em estoque' => self::EM_ESTOQUE,
            'em reposição' => self::EM_REPOSICAO,
            'em falta' => self::EM_FALTA,
        };
    }
}