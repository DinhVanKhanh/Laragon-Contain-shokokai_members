<?php
class M_content extends Database
{
    protected $table = 'skkstaff_member';

    public function getList(): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE `ID` = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT, 11);
        $stmt->execute();
        $result['content'] = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function add(array $data)
    {
        try {
            extract($data);
            if($this->dataExists($data) !== false){
                $rs['errMsg'] = '「ログインID」が重複されています。';
                return $rs;
            }
            $memberPw = EncryptData($memberPw);
            $query = "INSERT INTO {$this->table}
                                    (`member-id`, `member-pw`,`member-status`,`member-comment`)
                                VALUES (:memberId, :memberPw, :memberStatus, :memberComment)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':memberId', $memberId, PDO::PARAM_STR);
            $stmt->bindParam(':memberPw', $memberPw, PDO::PARAM_STR);
            $stmt->bindParam(':memberStatus', $memberStatus, PDO::PARAM_STR);
            $stmt->bindParam(':memberComment', $memberComment, PDO::PARAM_STR);
            // $stmt->bindParam(':notifyContent', $notifyContent, PDO::PARAM_STR);

            // $stmt->bindParam(':alertContent', $alertContent, PDO::PARAM_STR);
            $stmt->execute();
            $rs['success'] = true;
        } catch (PDOException $e) {
            $rs['errMsg'] = '更新失敗';
            return $rs;
        } catch (Exception $e) {
            $rs['errMsg'] = $e->getMessage();
            return $rs;
        }
        return $rs;
    }

    public function edit(array $data): array
    {
        try {
            extract($data);

            $selectNo = $this->getById($id);
            // check  did 「カテゴリーNo.」 change ?
            // if($selectNo['content']['カテゴリーNo.'] != $cateContent)
            // $image2Content = $this->getMaxImg2($cateContent);
            
            if(empty($memberPw)){
                $query = "UPDATE {$this->table} SET 
                                `member-status` = :memberStatus 
                                ,`member-comment` = :memberComment
                            WHERE `ID` = :id";

                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':memberStatus', $memberStatus, PDO::PARAM_STR);
                $stmt->bindParam(':memberComment', $memberComment, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT, 11);
                
            }else{
                $memberPw = EncryptData($memberPw);
                $query = "UPDATE {$this->table} SET 
                                    `member-pw` = :memberPw 
                                    ,`member-status` = :memberStatus 
                                    ,`member-comment` = :memberComment
                                WHERE `ID` = :id";
    
                $stmt = $this->conn->prepare($query);
                // $stmt->bindParam(':memberId', $memberId, PDO::PARAM_STR);
                $stmt->bindParam(':memberPw', $memberPw, PDO::PARAM_STR);
                $stmt->bindParam(':memberStatus', $memberStatus, PDO::PARAM_STR);
                $stmt->bindParam(':memberComment', $memberComment, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT, 11);
            }
            $stmt->execute();
            // $rs['edit'] = true;
            $rs['success'] = true;

        } catch (PDOException $e) {
            $rs['errMsg'] = '更新失敗' . $e->getMessage();
            return $rs;
        } catch (Exception $e) {
            $rs['errMsg'] = $e->getMessage();
            return $rs;
        }

        return $rs;
    }

    public function delete($id)
    {
        try {
            $query = "DELETE FROM {$this->table} WHERE `ID` = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT, 11);
            $stmt->execute();
            return "削除しました";
        } catch (PDOException $e) {
            return "削除失敗";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }





    private function dataExists(array $data, $flag = self::FLAG_ADD)
    {
        try {
            extract($data);
            $query = "SELECT `member-id` FROM $this->table WHERE `member-id` = :memberId";

            $stmt = $this->conn->prepare($query);            
            $stmt->bindParam(':memberId', $memberId, PDO::PARAM_STR, 30);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return false;
    }

    public function uploadData($inputFileName)
    {
        $result["inputFileName"] = $inputFileName;

        
        // Check empty
        $checkEmpty = function ($value) {
            if (preg_match('/^\s*$/', $value)) {
                return true;
            }
            return false;
        };
        
        try {
            $countErr = $countSuc = 0;
            $nameErr = [];
            $errMsg = "";

            $inputFileType = PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
            $objReader     = PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $objPHPExcel   = $objReader->load($inputFileName);

            $sheet = $objPHPExcel->getSheet(0);
            $result["sheet"] = $sheet;
            $file['highEstRow'] = $sheet->getHighestDataRow();
            $result["highEstRow"] = $file['highEstRow'];
            if ($file['highEstRow'] < 3) {
                throw new Exception('無効なファイル'); // throw under catch
            }

            $memberId = $sheet->getCell('B2')->getValue();
            $memberPass = $sheet->getCell('C2')->getValue();
            $memberStatus = $sheet->getCell('D2')->getValue();
            $memberComment = $sheet->getCell('E2')->getValue();
            $arrList = [$memberId, $memberPass, $memberStatus, $memberComment];
            foreach ($arrList as $key => $value) {
                if(strpos($value,"member") === false){
                    throw new Exception('無効なファイル'); // throw under catch
                }
            }

            for ($row = 3; $row <= $file['highEstRow']; $row++) {
                $result["memberId"] = $sheet->getCell('B' . $row)->getValue();
                $result["memberPw"] = $sheet->getCell('C' . $row)->getValue();
                $result["memberPw"] = EncryptData($result["memberPw"]);
                $result["memberStatus"] = $sheet->getCell('D' . $row)->getValue();
                $result["memberComment"] = $sheet->getCell('E' . $row)->getValue();

                if ($checkEmpty($errMsg)) {

                    if ($this->dataExists($result) === true
                        || preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]|^\s*$/', $result["memberId"])) {
                        $countErr++;
                        $nameErr[$countErr] = $result["memberId"];
                    } else {
                        $query = "INSERT INTO {$this->table}(`member-id`, `member-pw`, `member-status`, `member-comment`)
                                    VALUE ( :memberId, :memberPw, :memberStatus, :memberComment);";

                        // $Description = htmlspecialchars(strip_tags($data['Description']));
                        $stmt = $this->conn->prepare($query);
                        $stmt->bindParam(':memberId', $result["memberId"], PDO::PARAM_STR,30);
                        $stmt->bindParam(':memberPw', $result["memberPw"], PDO::PARAM_STR, 100);
                        $stmt->bindParam(':memberStatus', $result["memberStatus"], PDO::PARAM_STR,20);
                        $stmt->bindParam(':memberComment', $result["memberComment"], PDO::PARAM_STR, 200);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            $countSuc++;
                        } else {
                            $errMsg .= '挿入に失敗しました';
                        }
                    }
                }

                // if (!$checkEmpty($errMsg)) {
                //     $data['errMsg'] = $errMsg;
                //     $data['MeetingPlaceId'] = $mtCode;
                //     $data['ShopId'] = $shopCode;
                //     $data["TimeTo"] = $timeTo;
                //     $data["TimeFrom"] = $timeFrom;
                //     $errArg[$countErr] = $data;
                //     $countErr++;
                // }
            }
        } catch (PDOException $e) {
            $result['errMsg'] = "エラー " . $e->getMessage();
        } catch (Exception $e) {
            $result['errMsg'] = "エラー " . $e->getMessage();
        }

        // if ($countErr > 0) {
        //     // $result['errFile'] = $this->exportError($errArg);
        // }

        $result['numFailRows'] = $countErr;
        $result['numSuccess'] = $countSuc;
        $result['nameErr'] = $nameErr;
        return $result;
    }
}
