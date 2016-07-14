<?php

$people = '{"data":
		[
				{"first_name":"matt","last_name":"stauffer","age":31,"email":"matt@stauffer.com","secret":"VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM="},
				{"first_name":"dan","last_name":"sheetz","age":99,"email": "dan@sheetz.com","secret":"YWxidXF1ZXJxdWUuIHNub3JrZWwu"},]}';
 

/**
 * Instructions:
 *
 * Given the above JSON, build a simple PHP script to import it.
 *
 * Your script should create two variables:
 *
 * - a comma-separated list of email addresses
 * - the original data, sorted by age descending, with a new field on each record
 *   called "name" which is the first and last name joined.
 * 
 * Please deliver your code in either a GitHub Gist or some other sort of web-hosted code snippet platform.
 */

function fixJson($json)
{
	return str_replace(',]',']',$json);
}
function breakJson($array)
{
	$json =  json_encode($array);
	return str_replace(']',',]',$json);
}

function arr_people($people )
{
	$correct_json = fixJson($people);

	return json_decode($correct_json,true) ; 
}


$email_list = "";
$arr_people =  arr_people($people ) ; 
$rcount 	= count($arr_people['data'] ) ;

for($i=0;$i<$rcount;$i++)
{
	$email_list 					.= (strlen($email_list)>0?", ". $arr_people['data'][$i]['email']:$arr_people['data'][$i]['email']);
	$age[$i] 	 					= $arr_people['data'][$i]['age']; 
	$arr_people['data'][$i]['name'] = $arr_people['data'][$i]['first_name'] . " ".$arr_people['data'][$i]['last_name'] ; 
}
array_multisort($age, SORT_DESC,$arr_people['data'] ); 


echo $email_list ."<br><br>" ; 
echo breakJson($arr_people);

