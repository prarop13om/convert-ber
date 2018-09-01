<?php
// if ($_POST->isMethod('post')){    
            // return response()->json(['response' => 'This is post method']); 
        // }
        // return response()->json(['response' => 'This is get method']);
		
		
		//trim off excess whitespace off the whole
		$text = trim($_POST["ber_input"]);
		
		//explode all separate lines into an array
		$textAr = explode("\n", $text);

		//trim all lines contained in the array.
		$textAr = array_filter($textAr, 'trim');
		
		//Get Bot Name
		$textArBot = explode(" ", $text);
		$bot_name=trim($textArBot[1]);
		
		$res="";
		//loop through the lines
		foreach($textAr as $line){
			$chk_timeout=strpos($line,"Time out");
			$chk_error=strpos($line,"คุณใส่เบอร์โทรศัพท์ไม่ถูกต้องค่ะ");
			//if($chk_timeout=="Time out")continue;
			if($chk_timeout<>""){
				$res.= "Time out\n";
				continue;
			}else if($chk_error<>""){
				
				$res.= "คุณใส่เบอร์โทรศัพท์ไม่ถูกต้องค่ะ\n";
				continue;
			}

			$str_ex=explode($bot_name,$line);
			$temp=explode("อยู่ใน",$str_ex[1]);
			
			$ber=trim($temp[0]);
			$full_area="อยู่ใน ".trim($temp[1]);
			
			switch ($full_area) {
				case "อยู่ใน เอไอเอส 3G กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="AIS";$area="ภาคกลาง";break;
				case "อยู่ใน เอไอเอส 3G ภาคเหนือตอนบนค่ะ": $icon="AIS";$area="ภาคเหนือตอนบน";break;
				case "อยู่ใน เอไอเอส 3G ภาคใต้ตอนบนค่ะ": $icon="AIS";$area="ภาคใต้ตอนบน";break;
				case "อยู่ใน เอไอเอส 3G ภาคอีสานตอนบนค่ะ": $icon="AIS";$area="ภาคอีสานตอนบน";break;
				case "อยู่ใน เอไอเอส กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="AIS";$area="ภาคกลาง";break;
				case "อยู่ใน เอไอเอส ภาคเหนือตอนบนค่ะ": $icon="AIS";$area="ภาคเหนือตอนบน";break;
				case "อยู่ใน เอไอเอส ภาคใต้ตอนบนค่ะ": $icon="AIS";$area="ภาคใต้ตอนบน";break;
				case "อยู่ใน เอไอเอส ภาคใต้ตอนล่างค่ะ": $icon="AIS";$area="ภาคใต้ตอนล่าง";break;
				case "อยู่ใน เอไอเอส ภาคอีสานตอนบนค่ะ": $icon="AIS";$area="ภาคอีสานตอนบน";break;
				case "อยู่ใน เอไอเอส ภาคอีสานตอนล่างค่ะ": $icon="AIS";$area="ภาคอีสานตอนล่าง";break;
				case "อยู่ใน แคท/ฮัช กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="TRUE";$area="ภาคกลาง";break;
				case "อยู่ใน แคท/ฮัช ภาคเหนือตอนบนค่ะ": $icon="TRUE";$area="ภาคเหนือตอนบน";break;
				case "อยู่ใน แคท/ฮัช ภาคเหนือตอนล่างค่ะ": $icon="TRUE";$area="ภาคเหนือตอนล่าง";break;
				case "อยู่ใน แคท/ฮัช ภาคใต้ตอนบนค่ะ": $icon="TRUE";$area="ภาคใต้ตอนบน";break;
				case "อยู่ใน แคท/ฮัช ภาคใต้ตอนล่างค่ะ": $icon="TRUE";$area="ภาคใต้ตอนล่าง";break;
				case "อยู่ใน แคท/ฮัช ภาคอีสานตอนบนค่ะ": $icon="TRUE";$area="ภาคอีสานตอนบน";break;
				case "อยู่ใน แคท/ฮัช ภาคอีสานตอนล่างค่ะ": $icon="TRUE";$area="ภาคอีสานตอนล่าง";break;
				case "อยู่ใน ดีแทค ไตรเน็ต กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="DTAC";$area="ภาคกลาง";break;
				case "อยู่ใน ดีแทค ไตรเน็ต ภาคเหนือตอนบนค่ะ": $icon="DTAC";$area="ภาคเหนือตอนบน";break;
				case "อยู่ใน ดีแทค ไตรเน็ต ภาคเหนือตอนล่างค่ะ": $icon="DTAC";$area="ภาคเหนือตอนล่าง";break;
				case "อยู่ใน ดีแทค ไตรเน็ต ภาคใต้ตอนบนค่ะ": $icon="DTAC";$area="ภาคใต้ตอนบน";break;
				case "อยู่ใน ดีแทค ไตรเน็ต ภาคใต้ตอนล่างค่ะ": $icon="DTAC";$area="ภาคใต้ตอนล่าง";break;
				case "อยู่ใน ดีแทค ไตรเน็ต ภาคอีสานตอนบนค่ะ": $icon="DTAC";$area="ภาคอีสานตอนบน";break;
				case "อยู่ใน ดีแทค ไตรเน็ต ภาคอีสานตอนล่างค่ะ": $icon="DTAC";$area="ภาคอีสานตอนล่าง";break;
				case "อยู่ใน ดีแทค กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="DTAC";$area="ภาคกลาง";break;
				case "อยู่ใน ดีแทค ภาคเหนือตอนบนค่ะ": $icon="DTAC";$area="ภาคเหนือตอนบน";break;
				case "อยู่ใน ดีแทค ภาคเหนือตอนล่างค่ะ": $icon="DTAC";$area="ภาคเหนือตอนล่าง";break;
				case "อยู่ใน ดีแทค ภาคใต้ตอนบนค่ะ": $icon="DTAC";$area="ภาคใต้ตอนบน";break;
				case "อยู่ใน ดีแทค ภาคใต้ตอนล่างค่ะ": $icon="DTAC";$area="ภาคใต้ตอนล่าง";break;
				case "อยู่ใน ดีแทค ภาคอีสานตอนบนค่ะ": $icon="DTAC";$area="ภาคอีสานตอนบน";break;
				case "อยู่ใน ดีแทค ภาคอีสานตอนล่างค่ะ": $icon="DTAC";$area="ภาคอีสานตอนล่าง";break;
				case "อยู่ใน ทรูมูฟ กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="TRUE";$area="ภาคกลาง";break;
				case "อยู่ใน ทรูมูฟ ภาคเหนือตอนบนค่ะ": $icon="TRUE";$area="ภาคเหนือตอนบน";break;
				case "อยู่ใน ทรูมูฟ ภาคเหนือตอนล่างค่ะ": $icon="TRUE";$area="ภาคเหนือตอนล่าง";break;
				case "อยู่ใน ทรูมูฟ ภาคใต้ตอนบนค่ะ": $icon="TRUE";$area="ภาคใต้ตอนบน";break;
				case "อยู่ใน ทรูมูฟ ภาคใต้ตอนล่างค่ะ": $icon="TRUE";$area="ภาคใต้ตอนล่าง";break;
				case "อยู่ใน ทรูมูฟ ภาคอีสานตอนบนค่ะ": $icon="TRUE";$area="ภาคอีสานตอนบน";break;
				case "อยู่ใน ทรูมูฟเอช%A03G%2B ไม่ทราบพื้นที่ค่ะ": $icon="TRUE";$area="ไม่ทราบพื้นที่";break;
				case "อยู่ใน ทีโอที3G กทม,ภาคกลาง,ตะวันออกและตะวันตกค่ะ": $icon="TOT";$area="ภาคกลาง";break;
				case "อยู่ใน ทีโอที3G ภาคอีสานตอนบนค่ะ": $icon="TOT";$area="ภาคอีสานตอนบน";break;
				default:
					$icon="";
					$area="";
			}
			//echo $full_area."\n";
			$res.= $ber."\t".$icon."\t".$area."\tCorporation\t".$ber."\n";
			
			 
		}
	//echo $ber."\t".$icon."\t".$area."\tCorporation\t".$ber."\n";
	echo $res;
?>