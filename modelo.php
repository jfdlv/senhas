<?php
header("Content-Type: text/html;charset=utf-8");
//$conn=conectar();
// $query="SELECT * FROM etiquetas";
// $result=mysqli_query($conn,$query);
// 				while($fila=mysqli_fetch_array($result)){
// 					echo $fila["palabra"]."<br>";
				// }
$arrEP = array('SUS','V','ART','SUS');//1 //listo
$arrAct = array('ART','SUS','V','ART','SUS');//2 
$arrNE = array('SUS','ADV','V','SUS'); //3 //listo
$arrE1 = array('SUS','V','SUS');//4
$arrE2 = array('ART', 'SUS', 'V','SUS');//5 //listo
$arrE3 = array('ART', 'SUS', 'V');//6
$arrNE1 = array('ART', 'SUS', 'ADV', 'V', 'SUS');//7 //listo 
$arrNE2 = array('PRN', 'SUS', 'ADV', 'V', 'SUS');//8 //listo
$arrNE3 = array('ART', 'SUS', 'ADV', 'V');//9 //listo
$arrNE4 = array('PRN', 'SUS', 'ADV', 'V');//10 //listo
// $a= new aut("jaime levantó la casa",null,null,null);
// $a->idenAut();

class automata{
	private $cadena;
	private $tiempo;
	private $arr;
	private $arret;

	public function __construct($cadena,$tiempo,$arr,$arret){
		$this->cadena=$cadena;
		$this->tiempo=$tiempo;
		$this->arr=$this->parsing();
		$this->arret=$arret;
	}

	public function idenAut(){
		//$arr=$this->parsing();
		$arret=array();
		global $arrEP, $arrAct, $arrNE, $arrE1, $arrE2, $arrE3, $arrNE1, $arrNE2, $arrNE3, $arrNE4;
		//echo sizeof($arrEP);
		// $arrEP = array('SUS','V','ART','SUS');//1
		// $arrAct = array('ART','SUS','V','ART','SUS');//2
		// $arrTrans = array('SUS','V','ART','SUS','PRP','ADP','SUS');//3
		// $arrInTrans = array('SUS','V','PRP','SUS','ART','SUS','CCT');//4
		for ($i=0; $i < sizeof($this->arr); $i++) { 
			$etiqueta=$this->idenEti($this->arr[$i]);
			if(!isset($etiqueta))
			{
				$etiqueta=$this->desGenero($this->arr[$i],$i);

				if(empty($etiqueta))
				{	
					$etiqueta=$this->desPlural($this->arr[$i],$i);

					if(empty($etiqueta)){

						$etiqueta=$this->desConj($this->arr[$i],$i);
						if(empty($etiqueta)){
							array_push($arret, 'SUS');
						}
						else
						{
							array_push($arret, $etiqueta);
						}
						
					}
					else
					{
						array_push($arret, $etiqueta);
					}
					
				}
				else
				{
					array_push($arret, $etiqueta);
				}
			}
			else
			{
				array_push($arret, $etiqueta);
			}
			
		}
		//print_r($arret);
		// echo sizeof($arret);
		// echo sizeof($arrEP);
		if(sizeof($arret)==3){
			$sum=0;
			$sum1=0;

			for ($i=0; $i < 3 ; $i++) { 
				if (strcmp ($arret[$i], $arrE1[$i]) == 0){
					$sum++;
				}
				if (strcmp ($arret[$i], $arrE3[$i]) == 0) {
					$sum1++;
					echo $sum1;
				}
			}

			if ($sum==sizeof($arrE1)) {
				echo "Automata Oraciones Enunciativas 1<br>";
				// print_r($arret);
				// print_r($this->arr);
				$this->arret=$arret;
				return 4;
			}
			elseif ($sum1==sizeof($arrE3)) {
				# code...
				echo "Automata Oraciones Enunciativas 3<br>";
				$this->arret=$arret;
				return 6;
			}
		}
		elseif(sizeof($arret)==4){
			echo "entra";
			$sum=0;
			$sum1=0;
			$sum2=0;
			$sum3=0;
			$sum4=0;

			for ($i=0; $i < 4; $i++) { 
				if (strcmp ($arret[$i], $arrEP[$i]) == 0){
					$sum++;
				}
				if (strcmp ($arret[$i], $arrNE[$i]) == 0) {
					$sum1++;
					echo $sum1;
				}
				if (strcmp ($arret[$i], $arrE2[$i]) == 0) {
					$sum2++;
					echo $sum2;
				}
				if (strcmp ($arret[$i], $arrNE3[$i]) == 0) {
					$sum3++;
					echo $sum3;
				}
				if (strcmp ($arret[$i], $arrNE4[$i]) == 0) {
					$sum4++;
					echo $sum4;
				}

			}
			if ($sum==sizeof($arrEP)) {
				echo "Automata Oraciones Enunciativas/Predicativas<br>";
				// print_r($arret);
				// print_r($this->arr);
				$this->arret=$arret;
				return 1;
			}
			elseif ($sum1==sizeof($arrNE)) {
				# code...
				echo "Automata Oraciones Enunciativas Negativa<br>";
				$this->arret=$arret;
				return 3;
			}
			elseif ($sum1==sizeof($arrE2)) {
				# code...
				echo "Automata Oraciones Enunciativas 2<br>";
				$this->arret=$arret;
				return 5;
			}
			elseif ($sum1==sizeof($arrNE3)) {
				# code...
				echo "Automata Oraciones Enunciativas Negativa 3<br>";
				$this->arret=$arret;
				return 9;
			}
			elseif ($sum1==sizeof($arrNE4)) {
				# code...
				echo "Automata Oraciones Enunciativas Negativa 4<br>";
				$this->arret=$arret;
				return 10;
			}
			else
			{
				echo "No cumple con ningún automáta";
				$this->arret=$arret;
				return 0;
				// print_r($this->arr);
			}
		}
		elseif (sizeof($arret)==5) {
			$sum=0;
			$sum1=0;
			$sum2=0;
			for ($i=0; $i < 5; $i++) { 
				if (strcmp ($arret[$i], $arrAct[$i]) == 0){
					$sum++;
				}
				if (strcmp ($arret[$i], $arrNE1[$i]) == 0){
					$sum1++;
				}
				if (strcmp ($arret[$i], $arrNE2[$i]) == 0){
					$sum2++;
				}
			}
			if ($sum==sizeof($arrAct)) {
				echo "Automata Oraciones Activas<br>";
				// print_r($arret);
				// print_r($this->arr);
				$this->arret=$arret;
				return 2;
			}
			elseif ($sum1==sizeof($arrNE1)) {
				echo "Automata Oraciones Enunciativas negativas 1<br>";
				// print_r($arret);
				// print_r($this->arr);
				$this->arret=$arret;
				return 7;
			}
			elseif ($sum2==sizeof($arrNE2)) {
				echo "Automata Oraciones Enunciativas negativas 2<br>";
				// print_r($arret);
				// print_r($this->arr);
				$this->arret=$arret;
				return 8;
			}
			else
			{
				echo "No cumple con ningún automáta";
				$this->arret=$arret;
				return 0;
				//print_r($arret);
				// print_r($this->arr);
			}
		}
		// elseif (sizeof($arret)==sizeof($arrInTrans)) {
		// 	$sum=0;
		// 	for ($i=0; $i < sizeof($arrInTrans); $i++) { 
		// 		if (strcmp ($arret[$i], $arrInTrans[$i]) == 0){
		// 			$sum++;
		// 		}
		// 	}
		// 	if ($sum==sizeof($arrInTrans)) {
		// 		echo "Automata Oraciones Intransitivas<br>";
		// 		//print_r($arret);
		// 		// print_r($this->arr);
		// 		$this->arret=$arret;
		// 		return 4;
		// 	}
		// 	else
		// 	{
		// 		echo "No cumple con ningún automáta";
		// 		$this->arret=$arret;
		// 		print_r($arret);
		// 		// print_r($this->arr);
		// 	}
		// }
		else
		{
			echo "No cumple con ningún automáta";
			//print_r($arret);
			// print_r($this->arr);
			$this->arret=$arret;
			return 0;
		}
		
	}

	public function parsing(){
		$arr = array();
		$cad="";
		for ($i=0; $i < strlen($this->cadena) ; $i++) { 
			
			if (strcmp (" " , $this->cadena[$i] ) !== 0){

				$cad.=$this->cadena[$i];
				if ($i==(strlen($this->cadena)-1)) {
					array_push($arr, $cad);
					break;
				}
			}
			else{
				array_push($arr, $cad);
				$cad="";
			}
		}
		return $arr;
	}
	public function idenEti($palabra){
		$conn=conectar();
		$query="SELECT etiqueta FROM etiquetas WHERE palabra='$palabra'";
		$result=mysqli_query($conn,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($conn);
		return $array['etiqueta'];
	}
	public function desGenero($palabra,$i){
		$cadena1='';
		$cadena3='';
		$cadena4='';
		if (strlen($palabra)>1) {
			$cadena1=$palabra[strlen($palabra)-1];
		}
		if (strlen($palabra)>3) {
			$cadena3=$palabra[strlen($palabra)-3].$palabra[strlen($palabra)-2].$palabra[strlen($palabra)-1];
		}
		if (strlen($palabra)>4) {
			$cadena4=$palabra[strlen($palabra)-4].$palabra[strlen($palabra)-3].$palabra[strlen($palabra)-2].$palabra[strlen($palabra)-1];
		}
		$etiqueta="";
		if (strcmp ("triz", $cadena4 ) == 0) {

			$etiqueta=$this->idenEti(substr($palabra, 0,-4)."tor");
			if (!empty($etiqueta)) {
				$this->arr[$i]=substr($palabra, 0,-4)."tor";
				return $etiqueta;
			}
		}
		elseif (strcmp ("esa", $cadena3 ) == 0) {
			
			$etiqueta=$this->idenEti(substr($palabra, 0,-3)."o");
			if (empty($etiqueta)) {
				$etiqueta=$this->idenEti(substr($palabra, 0,-3)."e");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($palabra, 0,-3));
					if (!empty($etiqueta)) {
						$this->arr[$i]=substr($palabra, 0,-3);
						return $etiqueta;
					}
				}
				else
				{
					$this->arr[$i]=substr($palabra, 0,-3)."e";
					return $etiqueta;
				}
			}
			else
			{
					$this->arr[$i]=substr($palabra, 0,-3)."o";
					return $etiqueta;
			}
		}
		elseif (strcmp ("ina", $cadena3 ) == 0) {
			$etiqueta=$this->idenEti(substr($palabra, 0,-3)."e");
			if (empty($etiqueta)) {
				$etiqueta=$this->idenEti(substr($palabra, 0,-3)."y");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($palabra, 0,-3));
					if (!empty($etiqueta)) {
						$this->arr[$i]=substr($palabra, 0,-3);
						return $etiqueta;
					}
				}
				else
				{
					$this->arr[$i]=substr($palabra, 0,-3)."y";
					return $etiqueta;
				}
			}
			else
			{
					$this->arr[$i]=substr($palabra, 0,-3)."e";
					return $etiqueta;
			}
		}
		elseif (strcmp ("a", $cadena1 ) == 0) {
			$etiqueta=$this->idenEti(substr($palabra, 0,-1)."o");
			if (empty($etiqueta)) {
				$etiqueta=$this->idenEti(substr($palabra, 0,-1)."e");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($palabra, 0,-1));
					if (!empty($etiqueta)) {
						$this->arr[$i]=substr($palabra, 0,-1);
						return $etiqueta;
					}
				}
				else
				{
					$this->arr[$i]=substr($palabra, 0,-1)."e";
					return $etiqueta;
				}
			}
			else
			{
					$this->arr[$i]=substr($palabra, 0,-1)."o";
					return $etiqueta;
			}
		}
		return $etiqueta;
	}
	public function desPlural($palabra,$i){
		$etiqueta="";
		if (strlen($palabra)>3) {
			$cadenaCES=$palabra[strlen($palabra)-3].$palabra[strlen($palabra)-2].$palabra[strlen($palabra)-1];
		}
		if (strlen($palabra)>2) {
			$cadenaES=$palabra[strlen($palabra)-2].$palabra[strlen($palabra)-1];
		}
		if (strlen($palabra)>1) {
			$cadenaS=$palabra[strlen($palabra)-1];
		}	

		if (strlen($palabra)>3) {
			if (strcmp ("ces", $cadenaCES ) == 0) {
				$etiqueta=$this->idenEti(substr($palabra, 0,-3)."z");
				if (empty($etiqueta)) {
					$etiqueta=$this->desGenero(substr($palabra, 0,-3)."z",$i);
					if(!empty($etiqueta)){
						return $etiqueta;
					}
				}
				else{
					$this->arr[$i]=substr($palabra, 0,-3)."z";
					return $etiqueta;
				}
			}
			elseif (strcmp ("es", $cadenaES ) == 0) {
				
				$etiqueta=$this->idenEti(substr($palabra, 0,-2));
				if (empty($etiqueta)) {
					$etiqueta=$this->desGenero(substr($palabra, 0,-2),$i);
					if(!empty($etiqueta)){
						return $etiqueta;
					}
				}
				else{

					$this->arr[$i]=substr($palabra, 0,-2);
					return $etiqueta;
				}
			}
			elseif (strcmp ("s", $cadenaS ) == 0) {
				$etiqueta=$this->idenEti(substr($palabra, 0,-1));
				if (empty($etiqueta)) {
					$etiqueta=$this->desGenero(substr($palabra, 0,-1),$i);
					if(!empty($etiqueta)){
						return $etiqueta;
					}
				}
				else{
					$this->arr[$i]=substr($palabra, 0,-1);
					return $etiqueta;
				}
			}
		}
		else
		{
			return null;
		}
		return $etiqueta;

	}
	public function desConj($verbo,$i){
		$etiqueta = "";
		$pr1crct = array("o","a","e");
		$pr2crct = array("as","es","en");
		$pr3crct = array("ís");
		$pr4crct = array("amos","áis","emos","éis","imos");
		$ps2crct = array("é","ó","í");
		$ps3crct = array("aba","ía","ió");
		$ps4crct = array("abas","aban","ías","ían","aste","imos","iste");
		$ps5crct = array("abais","íais","ieron");
		$ps6crct = array("asteis","isteis","íamos");
		$ps7crct = array("ábamos");
		$ft4crct = array("aré","ará","eré","erá","iré","irá");
		$ft5crct = array("arás","arán","erás","erán","irás","irán");
		$ft6crct = array("aremos","aréis","eremos","eréis","iremos","ireís");
		if (strlen($verbo)>7) {
			$crct7 = $verbo[strlen($verbo)-7].$verbo[strlen($verbo)-6].$verbo[strlen($verbo)-5].$verbo[strlen($verbo)-4].$verbo[strlen($verbo)-3].$verbo[strlen($verbo)-2].$verbo[strlen($verbo)-1];
			if (in_array($crct7, $ps7crct)) {
			
				$etiqueta=$this->idenEti(substr($verbo,0, -7)."ar");
				if (!empty($etiqueta)) {
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -7)."ar";
						return $etiqueta;
				}	
				
			}
		}
		if (strlen($verbo)>6) {
			$crct6 = $verbo[strlen($verbo)-6].$verbo[strlen($verbo)-5].$verbo[strlen($verbo)-4].$verbo[strlen($verbo)-3].$verbo[strlen($verbo)-2].$verbo[strlen($verbo)-1];
			if (in_array($crct6, $ps6crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -6)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -6)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -6)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -6)."ir";
						return $etiqueta;
						}	
					}
					else
					{
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -6)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="pasado";
					$this->arr[$i]=substr($verbo,0, -6)."ar";
					return $etiqueta;
				}
				
			}
			elseif (in_array($crct6, $ft6crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -6)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -6)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -6)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="futuro";
						$this->arr[$i]=substr($verbo,0, -6)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="futuro";
						$this->arr[$i]=substr($verbo,0, -6)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="futuro";
					$this->arr[$i]=substr($verbo,0, -6)."ar";
					return $etiqueta;
				}
			}
		}
		if (strlen($verbo)>5) {
			$crct5 = $verbo[strlen($verbo)-5].$verbo[strlen($verbo)-4].$verbo[strlen($verbo)-3].$verbo[strlen($verbo)-2].$verbo[strlen($verbo)-1];
			if (in_array($crct5, $ps5crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -5)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -5)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -5)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -5)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -5)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="pasado";
					$this->arr[$i]=substr($verbo,0, -5)."ar";
					return $etiqueta;
				}
				
			}
			elseif (in_array($crct5, $ft5crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -5)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -5)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -5)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="futuro";
						$this->arr[$i]=substr($verbo,0, -5)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="futuro";
						$this->arr[$i]=substr($verbo,0, -5)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="futuro";
					$this->arr[$i]=substr($verbo,0, -5)."ar";
					return $etiqueta;
				}
				
			}
		}
		if (strlen($verbo)>4) {
			$crct4 = $verbo[strlen($verbo)-4].$verbo[strlen($verbo)-3].$verbo[strlen($verbo)-2].$verbo[strlen($verbo)-1];
			if (in_array($crct4, $ps4crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -4)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -4)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -4)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -4)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -4)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="pasado";
					$this->arr[$i]=substr($verbo,0, -4)."ar";
					return $etiqueta;
				}
			}
			elseif (in_array($crct4, $pr4crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -4)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -4)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -4)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -4)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -4)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="presente";
					$this->arr[$i]=substr($verbo,0, -4)."ar";
					return $etiqueta;
				}
			}		
			elseif (in_array($crct4, $ft4crct)) {
				echo "entraaaa";
				$etiqueta=$this->idenEti(substr($verbo,0, -4)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -4)."er");
					if (empty($etiqueta)) {
						echo "entraaa1";
						$etiqueta=$this->idenEti(substr($verbo,0, -4)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="futuro";
						$this->arr[$i]=substr($verbo,0, -4)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="futuro";
						$this->arr[$i]=substr($verbo,0, -4)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="futuro";
					$this->arr[$i]=substr($verbo,0, -4)."ar";
					return $etiqueta;
				}
			}
		}
		if (strlen($verbo)>3) {
			$crct3 = $verbo[strlen($verbo)-3].$verbo[strlen($verbo)-2].$verbo[strlen($verbo)-1];
			if (in_array($crct3, $ps3crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -3)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -3)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -3)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -3)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -3)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="pasado";
					$this->arr[$i]=substr($verbo,0, -3)."ar";
					return $etiqueta;	
				}
				
			}
			elseif (in_array($crct3, $pr3crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -3)."ir");
				if (!empty($etiqueta)) {
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -3)."ir";
						return $etiqueta;
				}
			}
		}
		if (strlen($verbo)>2) {
			$crct2 = $verbo[strlen($verbo)-2].$verbo[strlen($verbo)-1];
			if (in_array($crct2, $pr2crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -2)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -2)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -2)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -2)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -2)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="presente";
					$this->arr[$i]=substr($verbo,0, -2)."ar";
					return $etiqueta;
				}
			}
			elseif (in_array($crct2, $ps2crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -2)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -2)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -2)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -2)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="pasado";
						$this->arr[$i]=substr($verbo,0, -2)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="pasado";
					$this->arr[$i]=substr($verbo,0, -2)."ar";
					return $etiqueta;
				}
			}
		}
		$crct1 = $verbo[strlen($verbo)-1];
		if (in_array($crct1, $pr1crct)) {
				$etiqueta=$this->idenEti(substr($verbo,0, -1)."ar");
				if (empty($etiqueta)) {
					$etiqueta=$this->idenEti(substr($verbo,0, -1)."er");
					if (empty($etiqueta)) {
						$etiqueta=$this->idenEti(substr($verbo,0, -1)."ir");
						if (!empty($etiqueta)) {
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -1)."ir";
						return $etiqueta;
						}
					}
					else
					{
						$this->tiempo="presente";
						$this->arr[$i]=substr($verbo,0, -1)."er";
						return $etiqueta;
					}
				}
				else
				{
					$this->tiempo="presente";
					$this->arr[$i]=substr($verbo,0, -1)."ar";
					return $etiqueta;
				}
		}
		return $etiqueta;
	}
	// public function desConji($verbo,$i){

	// }
	public function obTiempo(){
		return $this->tiempo;
	}
	public function obArr(){
		return $this->arr;
	}
	public function obArret(){
		return $this->arret;
	}
}
class senha{
	private $id;
	private $imagenr;
	private $cadena;
	private $ids;

	public function __construct($id,$imagenr,$cadena,$ids){
		$this->id=$id;
		$this->imagenr=$imagenr;
		$this->cadena=$cadena;
		$this->ids=$this->quitarComas();
		
	}

	public function insertImagen(){

		$link=conectar();
		$link=conectar();
		$query="INSERT INTO senhas VALUES(null,'$this->imagenr')";
		//echo $query;
		mysqli_query($link,$query);
		$this->id=mysqli_insert_id($link);
		for ($i=0; $i < sizeof($this->ids); $i++) { 
			$query1="INSERT INTO et_se VALUES(".$this->id.",".$this->ids[$i].")";
			mysqli_query($link,$query1);
		}
		mysqli_close($link);

	}
	public function quitarComas()
	{
		$ids = array();
		$cad="";
		for ($i=0; $i < strlen($this->cadena) ; $i++) { 
			
			if (strcmp ("," , $this->cadena[$i] ) !== 0){

				$cad.=$this->cadena[$i];
				if ($i==(strlen($this->cadena)-1)) {
					array_push($ids, $cad);
					break;
				}
			}
			else{
				array_push($ids, $cad);
				$cad="";
			}
		}
		return $ids;
	}
	public function obSus($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_sus where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obAdv($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_adv where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obV($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_v where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obArt($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_art where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obPrp($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_prp where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obAdp($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_adp where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obCct($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_cct where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obAdj($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_Adj where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obItg($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_itg where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obPrn($palabra){
		$link=conectar();
		$query="SELECT imagen FROM img_prn where palabra='$palabra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
	public function obLtr($letra){
		$link=conectar();
		$query="SELECT imagen FROM img_ltr where palabra='$letra'";
		$result=mysqli_query($link,$query);
		$array=mysqli_fetch_array($result);
		mysqli_close($link);
		return $array["imagen"];
	}
}
class traductor{
	private $aut;
	private $tiempo;
	private $arr;
	public function __construct($aut,$tiempo,$arr){
		$this->aut=$aut;
		$this->tiempo=$tiempo;
		$this->arr=$arr;
	}	

	public function obtenerSenhas(){
		global $arrEP, $arrAct, $arrNE, $arrE1, $arrE2, $arrE3, $arrNE1, $arrNE2, $arrNE3, $arrNE4;
		sizeof($arrEP);
		if ($this->tiempo == "presente") {
			$imagenes = array('tiempo' => 0);
		}
		elseif ($this->tiempo == "pasado") {
			$imagenes = array('tiempo' => 'imagenes/antes.png');
		}
		elseif ($this->tiempo == "futuro") {
			$imagenes = array('tiempo' => 'imagenes/futuro.png');
		}
		$sen = new senha(null,null,null,null);
		switch ($this->aut) {
			case 1:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrEP[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrEP[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
					elseif ($arrEP[$i]=="ART") {
						array_push($imagenes, $sen->obArt($this->arr[$i]));
					}
				}
			break;

			case 2:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrAct[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrAct[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
					elseif ($arrAct[$i]=="ART") {
						array_push($imagenes, $sen->obArt($this->arr[$i]));
					}
				}
			break;

			case 3:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrNE[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrNE[$i]=="ADV") {
						array_push($imagenes, $sen->obAdv($this->arr[$i]));
					}
					elseif ($arrNE[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 4:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE1[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrE1[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 5:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE2[$i]=="ART") {
						array_push($imagenes, $sen->obArt($this->arr[$i]));
					}
					elseif ($arrE2[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrE1[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 6:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE3[$i]=="ART") {
						array_push($imagenes, $sen->obArt($this->arr[$i]));
					}
					elseif ($arrE3[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrE3[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 7:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE2[$i]=="ART") {
						array_push($imagenes, $sen->obArt($this->arr[$i]));
					}
					elseif ($arrE2[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="ADV") {
						array_push($imagenes, $sen->obAdv($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 8:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE2[$i]=="PRN") {
						array_push($imagenes, $sen->obPrn($this->arr[$i]));
					}
					elseif ($arrE2[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="ADV") {
						array_push($imagenes, $sen->obAdv($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 9:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE2[$i]=="ART") {
						array_push($imagenes, $sen->obArt($this->arr[$i]));
					}
					elseif ($arrE2[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="ADV") {
						array_push($imagenes, $sen->obAdv($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

			case 10:
				for ($i=0; $i <sizeof($this->arr) ; $i++) { 
					if ($arrE2[$i]=="PRN") {
						array_push($imagenes, $sen->obPrn($this->arr[$i]));
					}
					elseif ($arrE2[$i]=="SUS") {
						array_push($imagenes, $sen->obSus($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="ADV") {
						array_push($imagenes, $sen->obAdv($this->arr[$i]));
					}
					elseif ($arrInE1[$i]=="V") {
						array_push($imagenes, $sen->obV($this->arr[$i]));
					}
				}
			break;

	
		}
		return $imagenes;
	}
	public function deletrear($palabra){
		$sen = new senha(null,null,null,null);
		for ($i=0; $i < strlen($palabra); $i++) { 
			$val=$sen->obLtr($palabra[$i]);
			echo "<div class='col-md-2'>";
			echo "<img class='img-responsive' src=$val>";
			echo "</div>";
			
		}
	}
}
class usuario{
	private $usuario;
	private $pass;
	private $nombre;
	private $apellido;

	public function __construct($usuario,$pass,$nombre,$apellido){
		$this->usuario=$usuario;
		$this->pass=$pass;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
	}
	// public function insertUsuario(){
	// }
}
function conectar()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lenguajes2";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);	
		$charesp = $conn->query("SET NAMES 'utf8'");
		return $conn;
	}
?>