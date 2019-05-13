<?php
// Reads the variables sent via POST
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
//This is the first menu 
if ( $text == "" ) {
    $response  = "CON Welcome to Mombasa Maji Orders, what would you want to do \n";
    $response .= "1. Make an Order \n";
    $response .= "2. Check Order Status";
}
// Menu for a user who selects '1'
else if ($text == "1") {
    $response  = "CON Choose your sub-county: \n";
    $response .= "1. Changamwe \n";
    $response .= "2. Jomvu \n";
    $response .= "3. Kisauni \n";
    $response .= "4. Nyali \n";
    $response .= "5. Likoni \n";
    $response .= "6. Mvita \n";
}
//Menu for a user who selects '2' 
else if ($text == "2") {
    //note that we are using the $phoneNumber variable we got form the HTTP POST data.
    $response = "END Call 0712 345 678 to confirm your order\n";
}
//Menu for a user who selects '1' from second menu
else if ($text == "1*1") {
    $response  = "CON Choose your ward: \n";
    $response .= "1. Port Reitz KES 120\n";
    $response .= "2. Kipevu KES 50\n";
    $response .= "3. Airport KES 160\n";
    $response .= "4. Changamwe KES 60\n";
    $response .= "5. Chaani KES 90\n";
}
//Menu for a user who selects '2' from second menu
else if ($text == "1*2") {
    $response  = "CON Choose your ward: \n";
    $response .= "1. Jomvu Kuu KES 100\n";
    $response .= "2. Miritini KES 70\n";
    $response .= "3. Mikindani KES 160\n";
}
else if ($text == "1*1*1") {
    //note that we are using the $phoneNumber variable we got form the HTTP POST data.
    $response = "END You'll pay KES 120 for water delivery to Port Reitz. Call 0712 345 678 to confirm your order\n";

//echo response
header('Content-type: text/plain');
echo $response


//import SDK
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
// Set your app credentials
$username   = "sandbox";
$apikey     = "cfbc4b79dc3fa771b945d6bea37b776115a5916fc20674450470529559c670ec";
// Initialize the SDK
$AT         = new AfricasTalking($username, $apikey);
// Get the payments service
$payments   = $AT->payments();
// Set the name of your Africa's Talking payment product
$productName  = "MajiOrder";
// Set the phone number you want to send to in international format
$phoneNumber  = "+254716298000";
// Set The 3-Letter ISO currency code and the checkout amount
$currencyCode = "KES";
$amount       = 100.50;
// Set any metadata that you would like to send along with this request.
// This metadata will be included when we send back the final payment notification
$metadata = [
    "agentId"   => "654",
    "productId" => "321"
];
// Thats it, hit send and we'll take care of the rest.
try {
    $result = $payments->mobileCheckout([
        "productName"  => $productName,
        "phoneNumber"  => $phoneNumber,
        "currencyCode" => $currencyCode,
        "amount"       => $amount,
        "metadata"     => $metadata
    ]);
    print_r($result);
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
}

?>
