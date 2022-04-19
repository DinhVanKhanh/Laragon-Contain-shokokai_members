<?php
    class Japanese {
        /**
         @ Converts wide (double-byte) characters in a string to narrow (single-byte) characters. 
        **/
        public static function narrow($str) {
            return preg_replace_callback(
                "/[\x{ff01}-\x{ff5e}]/u",
                function($c) {
                    // convert UTF-8 sequence to ordinal value
                    $code = ((ord($c[0][0])&0xf)<<12)|((ord($c[0][1])&0x3f)<<6)|(ord($c[0][2])&0x3f);
                    return chr($code-0xffe0);
                },
                $str
            );
        }

        /**
        @ Converts narrow (single-byte) characters in a string to wide (double-byte) characters.
        **/
        public static function wide($str) {
            return mb_convert_kana($str, "R", 'UTF-8');
        }

        /**
        @ Converts narrow (single-byte) characters in a string to wide (double-byte) characters.
        **/
        public static function hiragana($str) {
            return mb_convert_kana($str, "c", 'UTF-8');
        }

        /**
        @ Converts narrow (single-byte) characters in a string to wide (double-byte) characters.
        **/
        public static function katakana($str) {
            return mb_convert_kana($str, "C", 'UTF-8');
        }

        public static function strConv($str, $conversion) {
            switch ($conversion) {
                case 4:
                    return self::wide($str);
                    break;

                case 8:
                    return self::narrow($str);
                    break;

                case 16:
                    return self::katakana($str);
                    break;

                case 32:
                    return self::hiragana($str);
                    break;
            }
        }
    }
?>
