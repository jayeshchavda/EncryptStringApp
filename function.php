<?php

if($_POST['todo'] == 'encrypt')
{
	encryptMyString($_POST['string']);
}
elseif($_POST['todo'] == 'decrypt')
{
	decryptMyString($_POST['string']);
}
else
{
	echo json_encode("Please input correcting");
}


function encryptMyString($string)
{
	$prefix = "Domsit-";
	$suffix = "-Solutions";

	$encryptedString = base64_encode($prefix).base64_encode($string).base64_encode($suffix);

	echo json_encode($encryptedString);
}

function decryptMyString($string)
{
	$prefix = "Domsit-";
	$suffix = "-Solutions";

	$RemovedPrefixSuffix = str_replace(array(base64_encode($prefix),base64_encode($suffix)),'',$string);

	$decryptedString = base64_decode($RemovedPrefixSuffix);

	echo json_encode($decryptedString);
}

?>