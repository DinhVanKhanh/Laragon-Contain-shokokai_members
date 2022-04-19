<?php
    $result["success"] = false;
    require_once  __DIR__."/proccessExcel.php";
    $address = readXslx( __DIR__."/../data/address.xlsx");
    $countAdr = count($address);

    for ( $i = 1; $i <= $countAdr; $i++ ) {
        if ( in_array( $_POST["post_no"], $address[$i] ) ) {
            $result["success"]  = true;
            $result["post_no"]  = $address[$i][2];
            $result["adr_city"] = $address[$i][3];
            $result["adr_area"] = $address[$i][4];
            break;
        }
    }
    echo json_encode($result);
?>
