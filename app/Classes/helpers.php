<?php
    if (!function_exists('encode')) {
        function encode($param) {
            $encoded = \Illuminate\Support\Facades\Crypt::encryptString($param);

            return $encoded;
        }
    }

    if (!function_exists('decode')) {
        function decode($param) {
            $decoded = \Illuminate\Support\Facades\Crypt::decryptString($param);

            return $decoded;
        }
    }

    if (!function_exists('generateId')) {
        function generateId($prefix, $table, $field) {
            $id = \Illuminate\Support\Facades\DB::select("SELECT concat(concat('".$prefix."',date_format(curdate(),'%Y%m%d')),right(concat('00000',cast((right(IFNULL(max(".$field."),0),5) + 1) as char)),5)) as 'ID'
                                FROM `".$table."`
                                WHERE substring(".$field.", 3 ,8) = date_format(curdate(),'%Y%m%d')
                                AND ".$field." != '';");

            return $id[0]->ID;
        }
    }
?>