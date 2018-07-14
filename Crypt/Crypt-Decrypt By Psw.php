<?php
/**
 * Desencriptación simple con psw
 *
 * @param string $password
 * @param string $time
 * @return string
 */
function DecryptStr($password, $time){
	$b64decoded = base64_decode($password);

   	//applying XOR
   	$newSeed = md5(SEED . $time);
    $passLength = strlen($b64decoded);
    while (strlen($newSeed) < $passLength) $newSeed.= $newSeed;
    $original_password = (substr($b64decoded,0,$passLength) ^ substr($newSeed,0,$passLength));

    //removing padding
    $c = 1;
    while($c < 15 && (int)substr($original_password,$c-1,1) + 1 != (int)substr($original_password,$c,1)){
        $c++;
    }
    return substr($original_password,$c+1);
}

/**
 * Encriptación simple con psw
 *
 * @param string $password
 * @param string $time
 * @return string
 */
function CryptStr($password, $time)
{
    //appending padding characters
    $newPass = rand(0,9) . rand(0,9);
    $c = 1;
    while ($c < 15 && (int)substr($newPass,$c-1,1) + 1 != (int)substr($newPass,$c,1)){
        $newPass .= rand(0,9);
        $c++;
    }
    $newPass .= $password;

    //applying XOR
    $newSeed = md5(SEED . $time);
    $passLength = strlen($newPass);
    while (strlen($newSeed) < $passLength) $newSeed.= $newSeed;
    $result = (substr($newPass,0,$passLength) ^ substr($newSeed,0,$passLength));

    return base64_encode($result);
}

$a = CryptStr("abcdef 12345", "usa la fueza luke!!" ); // $a = (string:36) BV9XAQINAFBRAQoPUgJVBlNdVkUHUwQEUw==
$b=  DecryptStr($a,"usa la fueza luke!!" );	// $b = (string:12) abcdef 12345
$b = DecryptStr($a,"usa la fueza luke!" );	// $b = (boolean) false

$a = CryptStr("  abcdefghjklm123456\\7890\"'¿=)(&%$!!{}M#OK", "1234" );
// $a = (string:80) AAcHBAQMA1VXWFQFBwENCxAUBFNbAARTBVEJWQlVBgoCBQQGaw4MWFZDQYsMGhEVFRBEEEMZLBYtcg==

$b=  DecryptStr($a, "1234");
// $b = (string:42)   abcdefghjklm123456\7890"'¿=)(&%$!!{}M#OK
