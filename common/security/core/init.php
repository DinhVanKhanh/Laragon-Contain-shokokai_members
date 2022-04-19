<?php
    require_once __DIR__ . '/../../security.php';

    /**
        Get key encrypt, decrypt
        @return mixed $data
    **/
    function GetKey() {
        $tokenSecret = trim( file_get_contents(__DIR__ . '/../../salt.txt') );
        return hash_hmac('sha256', $tokenSecret, 'A really strong static key goes here!');
    }

    /**
        Encrypt Data
        @param mixed $data
        @return mixed $encryptData
    **/
    function EncryptData( $data ) {
        $key = GetKey();
        $crypt = new RijndaelOpenSSL;
        if ( in_array( gettype($data), ['object', 'array']) ) {
            foreach ( $data as $key => $value ) {
                $data[$key] = in_array( gettype($value), ['object', 'array']) ? EncryptData($value) : $crypt->encrypt( $value, $key );
            }
        }
        else {
            $data = $crypt->encrypt( $data, $key );
        }
        return $data;
    }

    /**
        Dencrypt Data
        @param mixed $data
        @return mixed $decryptData
    **/
    function DecryptData( $data ) {
        $key = GetKey();
        $crypt = new RijndaelOpenSSL;
        if ( in_array( gettype($data), ['object', 'array']) ) {
            foreach ( $data as $key => $value ) {
                $data[$key] = in_array( gettype($value), ['object', 'array']) ? DecryptData($value) : $crypt->decrypt( $value, $key );
                // $data[$key] = gettype($value);
            }
        }
        else {
            $data = $crypt->decrypt( $data, $key );
        }
        return $data;
    }
?>