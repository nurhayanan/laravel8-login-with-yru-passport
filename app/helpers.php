<?php
namespace App;

class helpers {
    public static function academic_position_s2l($short): ?string
    {
        $arr = [
            'ศ.'  => 'ศาสตราจารย์',
            'ผศ.' => 'ผู้ช่วยศาสตราจารย์',
            'รศ.' => 'รองศาสตราจารย์',
        ];

        return $arr[$short] ?? null;
    }
}
