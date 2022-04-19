<?php
// 指定されたファイルのファイルサイズを返します。
// 【注意】同時に必ず[/lib/common.php]もインクルードしてください。
// input  :   filename
//        :   WEB上のディレクトリを\で区切ってください。
//        :   [例：「会計王10」のPDFカタログ]
//        :   GetFileSize("\files_pdf\brochure\acc_apr10.pdf")
// output :   GetFileSize
//        :   ファイルサイズを返します。
function GetFileSize($filename) {
    /*global $SORIZOWEB_DIRECTORY;
    $strFileName = $SORIZOWEB_DIRECTORY.$filename;
    if (file_exists($strFileName)) {
        // ファイルが存在する場合
        $size = filesize($strFileName);
        if ($size >= 1024) {
            return number_format($size / 1024, 1)."MB";
        }
        elseif ($size < 1) {
            return ($size * 1024)."Byte";
        }
        return $size."KB";
    }
    return "err";*/
    $strFileName = str_replace('\\', '/', $filename);
    $ch = curl_init("http://192.168.8.21:81$strFileName");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE);

    $data = curl_exec($ch);
    $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    curl_close($ch);

    if ($size >= 1024 * 1024) {
        return intval($size / (1024 * 1024))."MB";
    }
    elseif ($size >= 1024) {
        return intval($size / 1024)."KB";
    }
    return ($size < 0) ? 'err' : $size."Bytes";
}

// 指定されたファイルのダウンロード時間を返します。
// input1 : filename
//        : WEB上のディレクトリを\で区切ってください。
// input2 : kbps
//        : ダウンロード時の帯域（○kbps）を数値で指定します。
//        : 必ずkbpsで指定してください（1Mbps→1024kbps）。
//        : [例：「会計王10」のPDFカタログ]
//        : GetFileDltime("\files_pdf\brochure\acc_apr10.pdf", 56)
// output : GetFileDltime
//        : ダウンロードした際の時間を返します。
function GetFileDltime($filename, $kbps) {
    global $SORIZOWEB_DIRECTORY;
    $strFileName = $SORIZOWEB_DIRECTORY.$filename;
    if (file_exists($strFileName)) {
        // ファイルが存在する場合
        $DLFileSizeBit = filesize($strFileName) * 1024 * 8;
        // 秒数（四捨五入）
        $DLTimeSec = $DLFileSizeBit / (1024 * $kbps);
        // 分数（四捨五入）
        $DLTimeMin = $DLFileSizeBit / (1024 * $kbps * 60);
        // 時間（切り捨て）
        $DLTimeHour = $DLFileSizeBit / (1024 * $kbps * 60 * 60);
        
        // 1分未満
        if ($DLTimeMin < 1) {
            return round($DLTimeSec)."秒";
        }
        // 1分以上
        elseif ($DLTimeHour < 1) {
            return "約".round($DLTimeMin)."分";
        }
        // 1時間以上
        return "約".(int)$DLTimeHour."時間".(int)($DLTimeMin % 60)."分";
    }
    // ファイルが存在しない場合
    return "t_err";
}
?>
