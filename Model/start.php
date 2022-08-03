<?php

class Start {
    var $proid=null;
    var $user=null;
    var $rating=null;
    function __construct()
    {
        
    }
    //phuong thuc
    public function avg()
    {
        $db=new connect();
        $select="select proid,round(avg(rating),2) avg from start_rating group by proid" ;
        $result=$db->getList($select);
        $average=[];
        while($set=$result->fetch())
        {
            $average[$set['proid']]=$set['avg'];
        }
        return $average;
    }
    function getRating($uid,$id){
        $db=new connect();
        $select="select rating from start_rating where user='$uid' and proid='$id'";
        $result=$db->getInstance($select);
        return $result[0] ?? 'default value';
    }
    
    function updateRating($pid,$uid,$rating){
        $db=new connect();
        $query="REPLACE INTO start_rating(proid,user,rating) values(?,?,?)";
        $stm=$db->execP($query);
        $stm->execute([$pid,$uid,$rating]);
    }
}

?>