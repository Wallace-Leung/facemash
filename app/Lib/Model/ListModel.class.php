<?php

class ListModel extends Model{
	
	public function getPK(){
		$Model=new Model();

        $rand=rand(1,6);
        if($rand>2){
            $condition="id<((select MAX(id) from list)-(select MIN(id) from list))/$rand";
        }
        else{
            $condition="id>((select MAX(id) from list)-(select MIN(id) from list))/2";
        }

        $sql="select * from list where isShow=1 and $condition order by rand() limit 2";
        $data=$Model->query($sql);

        if(!$data){
            $sql="select * from list where isShow=1 order by rand() limit 2";
            $data=$Model->query($sql);
        }

		return $data;
	}

	public function rank($aId,$bId,$win)
 	{
	    $K=32;

	    if($win=='a'){
	    	$a=1;
	    	$b=0;
	    }else{
	    	$a=0;
	    	$b=1;
	    }

	    $List=M("List");
	    $data=$List->find($aId);
	    $Ra=$data['score'];
	    $data=$List->find($bId);
	    $Rb=$data['score'];

		$Ea = (float)1 / (1 + (float)pow(10, (float)($Rb - $Ra) / 400));
	    $Eb = (float)1 / (1 + (float)pow(10, (float)($Ra - $Rb) / 400));
		//echo "Ea:".$Ea." Eb:".$Eb."<br>";
		
		$deltaRa = (int)($K * ((int)$a - $Ea));
	    $deltaRb = (int)($K * ((int)$b - $Eb));
		//echo 'deltaRa:'.$deltaRa.' deltaRb:'.$deltaRb."<br>";

	    $List->find($aId);
	    $List->score+=$deltaRa;
	    $List->times+=1;
		$List->save();

		$List->find($bId);
	    $List->score+=$deltaRb;
	    $List->times+=1;
		$List->save();
	}

}