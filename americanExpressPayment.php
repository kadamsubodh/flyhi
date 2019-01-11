<?php
$order=(object)['amount' => $_POST['amount'], "currency" => $_POST['currency']];
$expiry=(object)["month"=> $_POST['expiry-month'],"year" => $_POST['expiry-year'] ];
$card=(object)["number" =>$_POST['card-number'],"expiry" =>$expiry];
$provided=(object)["card"=>$card];
$sourceOfFunds=(object)['provided' => $provided];
$responseUrl=(object)["responseUrl" => "https://flyhi.in"];
$secure=(object)["authenticationRedirect"=>$responseUrl ];

$abc=(object)["apiOperation" => "CHECK_3DS_ENROLLMENT","3DSecure" =>$secure, "sourceOfFunds" => $sourceOfFunds,"order" => $order];
// print_r(json_encode($abc,true));
// exit;
function callAPI($method, $url, $data){
	$username = "merchant.test8110291580";
	$password = "3e368a4c8e0b6735370161d24dd561dc";
   $curl = curl_init();

   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization:Basic bWVyY2hhbnQudGVzdDgxMTAyOTE1ODA6M2UzNjhhNGM4ZTBiNjczNTM3MDE2MWQyNGRkNTYxZGM=',
      'Content-Type: application/x-www-form-urlencoded',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
   curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
$firstRequest = callAPI('PUT', 'https://gateway-japa.americanexpress.com/api/rest/version/48/merchant/test8110291580/3DSecureId/5934466841276', json_encode($abc));
$content=json_decode($firstRequest,true);
$html = $content['3DSecure']['authenticationRedirect']['simple']['htmlBodyContent'];

$doc = DOMDocument::loadHTML($html);
$xpath = new DOMXPath($doc);
//$query = "//input[@id='t2']";
$query = "//input[@type='hidden' and @name = 'PaReq']/@value"; 

$entries = $xpath->query($query);
foreach ($entries as $entry) {
echo "<pre>";
echo $entry->textContent;
//echo "Found: " . $entry->getAttribute("value");
}

?>

