<?php
    $result["success"] = false;
    require_once  __DIR__ . "/proccessExcel.inc.php";
    $file_addr = __DIR__ . "/../../excel-data/address.xlsx";
    chmod( $file_addr, 0777 );
    $address = readXslx( $file_addr );
    $countAdr = count($address);

    for ( $i = 1; $i <= $countAdr; $i++ ) {
        if ( in_array( $_POST["post_no"], $address[$i] ) ) {
            $result["success"]  = true;
            $result["pref_cd"]  = $address[$i][0];
            $result["post_no"]  = $address[$i][2];
            $result["adr_city"] = $address[$i][3];
            $result["adr_area"] = $address[$i][4];
            break;
        }
    }
    chmod( $file_addr, 0644 );
    echo json_encode($result);
?>
