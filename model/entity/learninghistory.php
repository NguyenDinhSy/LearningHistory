<?php
class learninghistory{
    var $id;
    var $yearFrom;
    var $yearTo;
    var $schoolname;
    var $schoolAddress;
    var $idStudent;
    function __construct($id, $yeahFrom, $yearTo, $schoolname,$schoolAddress, $idStudent)
    {
        $this->id = $id;
        $this->yearFrom = $yeahFrom;
        $this->schoolname = $schoolname;
        $this->yearTo = $yearTo;
        $this->schoolAddress = $schoolAddress;
        $this->idStudent = $idStudent;
    }
        static function getList($idstudent){
            $rs = array();
            for ($i =0;$i<5;$i++) {


                array_push($rs, new learninghistory($i, 2001+$i, 2003+$i, "qq".$i, "hue", $idstudent));
            }
            return $rs;
        }
        static function  getListAdd($id, $yeahFrom, $yearTo, $schoolname,$schoolAddress, $idStudent){
            $rs = array();
            array_push($rs,new learninghistory($id, $yeahFrom, $yearTo, $schoolname,$schoolAddress, $idStudent));
            return $rs;
        }
        static function getListFromFile($idStudent){

        $lines = file("../resource/learninghistory.txt",FILE_IGNORE_NEW_LINES);
        $rs = array();
        foreach ($lines as $key =>$value){
            $arr = explode("#",$value);
            if ($arr[5] = $idStudent)
            array_push($rs, new learninghistory(
                $arr[0],
                $arr[1],
                $arr[2],
                $arr[3],
                $arr[4],
                $arr[5]
            ));

        }
        return $lines;
    }

}
?>

