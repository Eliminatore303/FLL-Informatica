<?php

/*
 * 8 bit da aggiungere
 *
 * 4 bit rappresentanti lo spazio 0000
 *  - rappresenta il numero di vagoni di immissione: max 15 vagoni

 * 4 bit di flag
	0000 : non da gestire
	1XXX : vagone deve uscire
	X1XX : vagone prima deve uscire
	XX1X : vagone deve entrare
	XXX1 : quello prima deve entrare (nVagoni)
 */

	function gestioneVagoni($start, $end)
	{
		$uscenti= array();
		$startInvariato=$start;

		if(!empty($start) && !empty($end)) //se entrambi gli array hanno almeno 1 elemento
		{
			//elimina elementi in start che non sono presenti in end
			foreach($start as $codS)
			{
				if(!in_array($codS, $end))
				{
					array_push($uscenti, $codS);
					$elToDel = array_search($codS, $start);
					array_splice($start, $elToDel, 1); //qui si elimina vagone
				}
			}

			//inserisce in start gli elementi di end che gli mancano
			foreach($end as $codE)
			{
				if(!in_array($codE, $start))
				{
					$elToIns = array_search($codE, $end);
					array_splice($start, $elToIns , 0, $codE); //qui si inserisce vagone
				}
			}
		}

		$arrayAss=creaArrayAss($uscenti,$end,$startInvariato);

		return $arrayAss;
	}

	function creaArrayAss($uscenti,$end,$startInvariato)
	{
		$arrayAss=[];
		foreach($uscenti as $codU) //gestione $uscenti
		{
			if(strcmp($codU,$uscenti[0])==0)
				$arrayAss[$codU]= "00001000";
			else
				$arrayAss[$codU]= "00000000";
		}
		$cont=0;
		foreach($end as $codE) //gestione $end
		{
			if(!empty($uscenti) && strcmp($codE,$end[0])==0) //se $uscenti ha elementi e sto esaminando il primo elemento di $end (che quindi deve uscire)
				$arrayAss[$codE]= "01"; //quinto e sesto bit (sono gli unici sicuri)
			else
			{
				$arrayAss[$codE]= "00"; //o non ci sono uscenti o non sto esaminando il primo elemento di $end e quindi quello prima sicuramente non deve uscire
			}
			if(!in_array($codE, $startInvariato)) //se l'elemento in $end non c'era in $start (che quindi deve entrare)
			{
				$arrayAss[$codE] = "0000".$arrayAss[$codE];
				if($cont==0) //se sto esaminando il primo elemento che deve entrare
					$arrayAss[$codE] .= "10";
				else //se sto esaminando un elemento che deve entrare (che e' dopo un altro che deve entrare)
					$arrayAss[$codE] .= "00";
				$cont++;
			}
			else
			{
				if($cont!=0) //se l'elemento sta dopo a un elemento che deve entrare (e lui non deve entrare)
				{
					$arrayAss[$codE] = sprintf('%04d', decbin($cont)).$arrayAss[$codE]."01";
					$cont=0;
				}
				else
					$arrayAss[$codE] = "0000".$arrayAss[$codE]."00";
			}
		}
		return $arrayAss;
	}

	$ch = curl_init("127.0.0.1/php/test.json"); //pag web che devo collegare per leggere
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = json_decode(curl_exec($ch), true); //decodificazione dati
	//$outpu4t = curl_exec($ch);
	$output=$output['array'];

	$first=$output[0];
	$second=$output[1];

	curl_close($ch);

	$first_codes=[];
	$second_codes=[];

	foreach ($first as $key ) {
		$first_codes[]=$key["id"];
	}
	foreach ($second as $key ) {
		$second_codes[]=$key["id"];
	}
	
	$last=end($second_codes);
	if($last!=false)
		$int=filter_var($last, FILTER_SANITIZE_NUMBER_INT)+1;
	else
		$int=1;
	$first_codes[]="W$int";
	$second_codes[]="W$int";
	array_reverse($first_codes);
	array_reverse($second_codes);

	$table=gestioneVagoni($first_codes,$second_codes);

	//stampa finale
	$newArray = array_keys($table);
	$i=0;
	foreach($table as $n)
	{
			//$arrayAss[$codU]= "00000010";
		echo "#".$newArray[$i]."-".$n;
		$i++;
	}

?>
