<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://kyc-api.aadhaarkyc.io/api/v1/bank-verification',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	 "id_number": "047101512696",
     "ifsc": "ICIC0000471"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MTczNTgyMDYsIm5iZiI6MTYxNzM1ODIwNiwianRpIjoiMTJhOTRiYzMtZTk3Yi00YjRjLTliYzMtMWU3MmZkMDk1MzZhIiwiZXhwIjoxOTMyNzE4MjA2LCJpZGVudGl0eSI6ImRldi5hYmhpY29sbGVnZTFAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwidHlwZSI6ImFjY2VzcyIsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19fQ.rtKqZ1OqFTncXzp5CHKgCMBwUgojqsfxGyGTLHJrCFg'
  ),
));


           $response = curl_exec($curl);
        
           curl_close($curl);
          
           $result = json_decode($response);
           
           echo $result['data']['full_name'];
          // echo $result[3]->full_name;
           
           /*
           Or want this result
           
           echo $result["full_name"];
           
           We dont want to print it using 'foreach Loop'

?>