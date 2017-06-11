<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 4/28/2017
 * Time: 10:14 PM
 */

 // SMS POST URL
 /*$postUrl = "http://api2.gmtsms.com/api/sendsms/xml";
 // XML-formatted data
 $xmlString =
         "<SMS>
             <authentification>
                 <username>sinvuthy</username>
                 <password>sinvuthy5284!123!@#</password>
             </authentification>
             <message>
                 <sender>Vital</sender>
                 <text>Please join company party together all staffs.</text>
             </message>
             <recipients>
                 <gsm messageId='1000'>85592892224</gsm>
                 <gsm messageId='1001'>85593730707</gsm> 
                 <gsm messageId='1002'>85512797008</gsm> 
                 <gsm messageId='1003'>85577225551</gsm> 
             </recipients>
         </SMS>";
 // previously formatted XML data becomes value of “XML” POST variable
 $fields = "XML=" . urlencode($xmlString);
 // in this example, POST request was made using PHP’s CURL
 $ch =curl_init();
 curl_setopt($ch, CURLOPT_URL, $postUrl);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
 // response of the POST request
 $response = curl_exec($ch);
 curl_close($ch);
 // write out the response
 echo $response;*/
?>
