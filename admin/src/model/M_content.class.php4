<?php
    class M_content extends Database {
		protected $table = 'SoriContents_List';

        public function getList(): array
        {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

		public function getById( int $id ) : array {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE `画像1` = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT, 11);
            $stmt->execute();
            $result['content'] = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

        public function getImg1($cateContent)
        {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE `カテゴリーNo.` = :cateContent ORDER BY  `画像2`");
            $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getImg2($img2)
        {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE `画像2` = :img2 ORDER BY  `画像2`");
            $stmt->bindParam(':img2', $img2, PDO::PARAM_INT, 11);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getImgforCate($cateContent)
        {
            $query = "SELECT DISTINCT `画像2` FROM SoriContents_List WHERE `カテゴリーNo.` = :cateContent ORDER BY  `画像2`";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);

            $stmt->execute();
            $resultTest = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr1 = [];
            // $arr1['resultTest'] = $resultTest;
            foreach ($resultTest as $key => $value) {
                foreach ($value as $key1 => $value1) {
                //     // print_r($value1 . "-");
                //     // $arr1[] = $key1;
                    // $arr1[$key] = $value;
                //     // $arr1[$key][] = $value1[$key]['画像1'];
                    // $arr1[$value['画像1']] = $value['画像2'];
                    $arr1[] = $value1;
                }
                // $arr1[] = $value[$key];
            }


            return $arr1;
        }
        public function getArrImg2($cateContent,$image2Content)
        {
            $query = "SELECT DISTINCT `画像2`  FROM SoriContents_List WHERE `カテゴリーNo.` = :cateContent ORDER BY  `画像2`";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);

            $stmt->execute();
            $resultTest = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr1 = [];
            foreach ($resultTest as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    // print_r($value1 . "-");
                    $arr1[] = $value1;
                }
            }

            if(empty( $image2Content )){ // if don't input $image2Content
                $image2Content = $this->checkImgSerial($cateContent);
                return $image2Content;


                //insert img2 in arr queue empty
                // for ($i = 0; $i < count($arr1) - 1; $i++) {
                //     if ($arr1[$i] != $arr1[$i + 1] - 1) {  // [1,3,4,5]
                //         $image2Content =  $arr1[$i] + 1;
                //         return $image2Content;
                //     }
                // }
            }else{
                // for ($i=0; $i < count($arr1) - 1; $i++) { 
                    
                //     if($arr1[$i] == $image2Content){  // if input $image2Content but same in db
                //         // for ($j=0; $j < count($arr1[$i]); $j++) { 
                //         //     $arr1[$j] = $arr1[$j] + 1;
                //         // }
                //     }else{
                //         return $image2Content;
                //     }
                // }

                if(in_array($image2Content,$arr1)){  // if input $image2Content but same in db
                    for ($i = 0; $i < count($arr1) - 1; $i++) {
                        if ($image2Content <= $arr1[$i] && $arr1[$i] == $arr1[$i + 1] - 1) {  // [1,3,5,6,7] chon chon 5 =>[1,3,5,6,7,8]
                            $arr1[$i] = $arr1[$i] + 1;
                            continue;
                        }elseif($image2Content <= $arr1[$i] && $arr1[$i] < $arr1[$i + 1] - 1){ //[1,2,4] chon 2 => [1,2,3,4]
                            $arr1[$i] = (Int)$arr1[$i] + 1;
                            return $arr1;
                        }
                        
                        
                    }
                    $arr1[count($arr1) - 1] =  $arr1[count($arr1) - 1] + 1; // plus 1 for arr final of if
                    return $arr1;
                }else{
                    return $image2Content;
                }

            }
            return $image2Content;
        }
        

        public function getImgSerial($cateContent)
        {
            $stmt = $this->conn->prepare("SELECT `カテゴリーNo.` FROM {$this->table} 
                                                                WHERE `カテゴリーNo.` = :cateContent");
            $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);
            $stmt->execute();
            $result = $stmt->rowCount();
            $row = $result + 1;
            $NumberOfcateContent = $cateContent . sprintf('%02d', $row);
            return $NumberOfcateContent;
        }

        public function checkImgSerial($cateContent)
        {
            $stmt = $this->conn->prepare("SELECT MAX(`画像2`) AS maxium FROM {$this->table} 
                                                                        WHERE `カテゴリーNo.` = :cateContent" );
            $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // $ImgSerialfinally = !empty($result['maxium']) ? $result['maxium'] : 1;            
            // $ImgSerialfinally = sprintf('%02d', $ImgSerialfinally);
            // $ImgSerialfinally = !empty($result['maxium']) ? ((int)$ImgSerialfinally + 1) : ( $cateContent . $ImgSerialfinally );

            if(!empty($result['maxium'])){
                $ImgSerialfinally = $result['maxium'];
                $ImgSerialfinally = (int)$ImgSerialfinally + 1;
            } else{
                $ImgSerialfinally = 1;
                $ImgSerialfinally = sprintf('%02d', $ImgSerialfinally);
                $ImgSerialfinally = $cateContent . $ImgSerialfinally;
            }

            return $ImgSerialfinally;
        }


    public function add(array $data)
    {
        try {
            extract($data);

            $image2Content = $this->getArrImg2($cateContent, $image2Content);
            $getImgforCate = $this->getImgforCate($cateContent);
            $compareArr['image2Content'] = $image2Content;
            $compareArr['getImgforCate'] = $getImgforCate;
            $compareArr['getlist'] = $this->getImg1($cateContent);

            // foreach ($compareArr['getlist'] as $key => $val) {
            //     $compareArr['getlist'][$key] = $val['画像1'];

            // }
            
            $this->conn->beginTransaction();
            if (is_array($image2Content)) {
                $compareArr['result'] = array_diff_assoc($getImgforCate, $image2Content); // đúng theo thứ tự biến để tìm diff arr đầu

                // foreach ($compareArr['result'] as $key => $value) {
                //     $a = $this->getImg2($compareArr['result'][$key]);

                // }

                // $aa = $this->getList();
                foreach ($compareArr['getlist'] as $key => $value) {
                    $compareArr['aa'][$value['画像1']] = $value['画像2'];
                }

                $compareArr['update'] = array_intersect($compareArr['aa'], $compareArr['result']);

                foreach ($compareArr['update'] as $key => $val) {
                    $query[$key] = "UPDATE {$this->table} 
                                        SET  `画像2` = $val + 1
                                        WHERE `画像1` = " . $key;

                    $stmt = $this->conn->prepare($query[$key]);
                    // $stmt->bindParam(":val", $val, PDO::PARAM_INT,11);
                    $stmt->execute();
                    // $compareArr[$key] = $val;
                    $compareArr['query'] = $query;
                }
            }
            $compareArr['data'] = $data;
            $this->insert($data);

            $this->conn->commit();
        } catch (PDOException $e) {
            $rs['errMsg'] = '更新失敗';
            $this->conn->rollback();
            return;
        } catch (Exception $e) {
            $rs['errMsg'] = $e->getMessage();
            $this->conn->rollback();
            return;
        }
            
               

            // foreach ($compareArr['result'] as $key => $val) {
            //     $compareArr[$key] = $val;
            // }


            return $compareArr;
    }
    public function insert(array $data)
    {
        extract($data);
        $query = "INSERT INTO {$this->table}
                                    (`公開フラグ`, `カテゴリーNo.`,`短縮タイトル`,`正式タイトル`,`解説`
                                    ,`アラートメッセージ`,`コメント`,`リンク先URL`,`別ウィンドウ区分`,`画像2`
                                    ,`TOP非表示`,`FREE`,`簿記9`,`簿記10`,`簿記11`
                                    ,`JA9`,`JA10`,`JA11`,`JA接続キット`,`日誌6`,`日誌6P`)
                                VALUES ( :flagContent, :cateContent, :shortTittleContent, :longTittleContent,:notifyContent
                                        ,:alertContent,:commentContent,:linkContent,:seperateContent,:image2Content
                                        ,:topContent,:freeContent,:account9Content,:account10Content,:account11Content
                                        ,:JA9Content,:JA10Content,:JA11Content,:JAContent,:diary6Content,:diary6PContent)";



        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':flagContent', $flagContent, PDO::PARAM_INT, 11);
        $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);
        $stmt->bindParam(':shortTittleContent', $shortTittleContent, PDO::PARAM_STR);
        $stmt->bindParam(':longTittleContent', $longTittleContent, PDO::PARAM_STR);
        $stmt->bindParam(':notifyContent', $notifyContent, PDO::PARAM_STR);

        $stmt->bindParam(':alertContent', $alertContent, PDO::PARAM_STR);
        $stmt->bindParam(':commentContent', $commentContent, PDO::PARAM_STR);
        $stmt->bindParam(':linkContent', $linkContent, PDO::PARAM_STR);
        $stmt->bindParam(':seperateContent', $seperateContent, PDO::PARAM_INT, 1);
        $stmt->bindParam(':image2Content', $image2Content, PDO::PARAM_STR);

        $stmt->bindParam(':topContent', $topContent, PDO::PARAM_INT, 1);
        $stmt->bindParam(':freeContent', $freeContent, PDO::PARAM_STR);
        $stmt->bindParam(':account9Content', $account9Content, PDO::PARAM_STR);
        $stmt->bindParam(':account10Content', $account10Content, PDO::PARAM_STR);
        $stmt->bindParam(':account11Content', $account11Content, PDO::PARAM_STR);

        $stmt->bindParam(':JA9Content', $JA9Content, PDO::PARAM_STR);
        $stmt->bindParam(':JA10Content', $JA10Content, PDO::PARAM_STR);
        $stmt->bindParam(':JA11Content', $JA11Content, PDO::PARAM_STR);
        $stmt->bindParam(':JAContent', $JAContent, PDO::PARAM_STR);
        $stmt->bindParam(':diary6Content', $diary6Content, PDO::PARAM_STR);
        $stmt->bindParam(':diary6PContent', $diary6PContent, PDO::PARAM_STR);

        $stmt->execute();
    }

		public function add1( Array $data ) : array  {
            try {
                $rs["success"] = false;

                // Check record exists
                // if ( $this->dataExists($data) ) {
                //     throw new Exception( "本スケジュールは既に存在しています。" );
                // }

                extract($data);

                //insert 画像2
                // $image2Content = $this->getImgSerial($cateContent);
                // $image2Content = getArrImg2($cateContent,$image2Content);
                $image2Content = $this->checkImgSerial($cateContent);
                // $rs["image2Content"] = $image2Content;
                // $rs["checkImgSerial"] = $checkImgSerial;
                // $image2Content = ($image2Content == $checkImgSerial) ? ($checkImgSerial + 1) : $image2Content;
                // $rs["image2Content"] = $image2Content;

                // $rs['success'] = true;
                $query = "INSERT INTO {$this->table}
                                    (`公開フラグ`, `カテゴリーNo.`,`短縮タイトル`,`正式タイトル`,`解説`
                                    ,`アラートメッセージ`,`コメント`,`リンク先URL`,`別ウィンドウ区分`,`画像2`
                                    ,`TOP非表示`,`FREE`,`簿記9`,`簿記10`,`簿記11`
                                    ,`JA9`,`JA10`,`JA11`,`JA接続キット`,`日誌6`,`日誌6P`)
                                VALUES ( :flagContent, :cateContent, :shortTittleContent, :longTittleContent,:notifyContent
                                        ,:alertContent,:commentContent,:linkContent,:seperateContent,:image2Content
                                        ,:topContent,:freeContent,:account9Content,:account10Content,:account11Content
                                        ,:JA9Content,:JA10Content,:JA11Content,:JAContent,:diary6Content,:diary6PContent)";

                

                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(':flagContent', $flagContent, PDO::PARAM_INT, 11);
                $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);
                $stmt->bindParam(':shortTittleContent', $shortTittleContent, PDO::PARAM_STR);
                $stmt->bindParam(':longTittleContent', $longTittleContent, PDO::PARAM_STR);
                $stmt->bindParam(':notifyContent', $notifyContent, PDO::PARAM_STR);

                $stmt->bindParam(':alertContent', $alertContent, PDO::PARAM_STR);
                $stmt->bindParam(':commentContent', $commentContent, PDO::PARAM_STR);
                $stmt->bindParam(':linkContent', $linkContent, PDO::PARAM_STR);
                $stmt->bindParam(':seperateContent', $seperateContent, PDO::PARAM_INT,1);
                $stmt->bindParam(':image2Content', $image2Content, PDO::PARAM_STR);

                $stmt->bindParam(':topContent', $topContent, PDO::PARAM_INT,1);
                $stmt->bindParam(':freeContent', $freeContent, PDO::PARAM_STR);
                $stmt->bindParam(':account9Content', $account9Content, PDO::PARAM_STR);
                $stmt->bindParam(':account10Content', $account10Content, PDO::PARAM_STR);
                $stmt->bindParam(':account11Content', $account11Content, PDO::PARAM_STR);

                $stmt->bindParam(':JA9Content', $JA9Content, PDO::PARAM_STR);
                $stmt->bindParam(':JA10Content', $JA10Content, PDO::PARAM_STR);
                $stmt->bindParam(':JA11Content', $JA11Content, PDO::PARAM_STR);
                $stmt->bindParam(':JAContent', $JAContent, PDO::PARAM_STR);
                $stmt->bindParam(':diary6Content', $diary6Content, PDO::PARAM_STR);
                $stmt->bindParam(':diary6PContent', $diary6PContent, PDO::PARAM_STR);

                // $stmt->execute();
                $rs['success'] = true;
                $rs['data'] = $data;
            }
            catch (PDOException $e) {
                $rs['errMsg'] = '更新失敗';
                goto Result;
            }
            catch (Exception $e) {
                $rs['errMsg'] = $e->getMessage();
                goto Result;
            }

  			Result:
  			return $rs;
		}

		public function edit( Array $data ) : array {
            try {
                $rs["success"] = false;

                // Check record exists
                // if ( $this->dataExists($data, self::FLAG_EDIT) ) {
                //     throw new Exception( "本スケジュールは既に存在しています。" );
                // }

                extract($data);
                
                $selectNo = $this->getById($id);
                // check  did 「カテゴリーNo.」 change ?
                if($selectNo['content']['カテゴリーNo.'] != $cateContent)
                    $image2Content = $this->checkImgSerial($cateContent);

                $query = "UPDATE {$this->table} SET 
                                `公開フラグ` = :flagContent 
                                ,`カテゴリーNo.` = :cateContent 
                                ,`短縮タイトル` = :shortTittleContent
                                ,`正式タイトル` = :longTittleContent
                                ,`解説` = :notifyContent

                                ,`アラートメッセージ` = :alertContent
                                ,`コメント` = :commentContent
                                ,`リンク先URL` = :linkContent
                                ,`別ウィンドウ区分` = :seperateContent
                                ,`画像2` = :image2Content

                                ,`TOP非表示` = :topContent
                                ,`FREE` = :freeContent
                                ,`簿記9` = :account9Content
                                ,`簿記10` = :account10Content
                                ,`簿記11` = :account11Content
                                
                                ,`JA9` =  :JA9Content
                                ,`JA10`=  :JA10Content
                                ,`JA11` = :JA11Content
                                ,`JA接続キット` = :JAContent
                                ,`日誌6` = :diary6Content
                                ,`日誌6P` = :diary6PContent
                            WHERE `画像1` = :id";


                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':flagContent', $flagContent, PDO::PARAM_INT, 11);
                $stmt->bindParam(':cateContent', $cateContent, PDO::PARAM_INT, 11);
                $stmt->bindParam(':shortTittleContent', $shortTittleContent, PDO::PARAM_STR);
                $stmt->bindParam(':longTittleContent', $longTittleContent, PDO::PARAM_STR);
                $stmt->bindParam(':notifyContent', $notifyContent, PDO::PARAM_STR);

                $stmt->bindParam(':alertContent', $alertContent, PDO::PARAM_STR);
                $stmt->bindParam(':commentContent', $commentContent, PDO::PARAM_STR);
                $stmt->bindParam(':linkContent', $linkContent, PDO::PARAM_STR);
                $stmt->bindParam(':seperateContent', $seperateContent, PDO::PARAM_INT, 1);
                $stmt->bindParam(':image2Content', $image2Content, PDO::PARAM_STR);

                $stmt->bindParam(':topContent', $topContent, PDO::PARAM_INT, 1);
                $stmt->bindParam(':freeContent', $freeContent, PDO::PARAM_STR);
                $stmt->bindParam(':account9Content', $account9Content, PDO::PARAM_STR);
                $stmt->bindParam(':account10Content', $account10Content, PDO::PARAM_STR);
                $stmt->bindParam(':account11Content', $account11Content, PDO::PARAM_STR);

                $stmt->bindParam(':JA9Content', $JA9Content, PDO::PARAM_STR);
                $stmt->bindParam(':JA10Content', $JA10Content, PDO::PARAM_STR);
                $stmt->bindParam(':JA11Content', $JA11Content, PDO::PARAM_STR);
                $stmt->bindParam(':JAContent', $JAContent, PDO::PARAM_STR);
                $stmt->bindParam(':diary6Content', $diary6Content, PDO::PARAM_STR);
                $stmt->bindParam(':diary6PContent', $diary6PContent, PDO::PARAM_STR);

                $stmt->bindParam(':id', $id, PDO::PARAM_INT,11);
                $stmt->execute();
                
                $rs['success'] = true;
            }
            catch (PDOException $e) {
                $rs['errMsg'] = '更新失敗' . $e->getMessage();
                goto Result;
            }
            catch (Exception $e) {
                $rs['errMsg'] = $e->getMessage();
                goto Result;
            }

			Result:
			return $rs;
		}

		public function delete( $id ){
            try {
                $query = "DELETE FROM {$this->table} WHERE 画像1 = :id";
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(':id', $id, PDO::PARAM_STR, 11);
                $stmt->execute();
                return "削除しました";
            }
            catch (PDOException $e) {
              return "削除失敗";
            }
            catch (Exception $e) {
              return $e->getMessage();
            }
        }
        




        private function dataExists( Array $data, $flag = self::FLAG_ADD ) {
        }
    }
?>
