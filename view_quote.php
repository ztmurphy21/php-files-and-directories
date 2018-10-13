<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View A Quotation</title>
</head>
<body>
<h1>Random Quotation</h1>
<?php
/*This script displays and handles an HTML form. This script reads a file and prints a random line from it*/

//read the files contents into an arrya:
$data = file("quotes.txt");

//count the number of items in the array:
$n = count($data);

//pick a random item:
$rand = rand(0, ($n-1));

//print the quotation
print '<p>' . trim($data[$rand]) . '</p>';

?>
</body>
</html>
