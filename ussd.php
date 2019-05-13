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
}
//echo response

header('Content-type: text/plain');
echo $response


?>
