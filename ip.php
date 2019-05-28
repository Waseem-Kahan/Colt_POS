<?PHP

$ipaddress = $_SERVER["REMOTE_ADDR"];

echo "Your IP is $ipaddress!";
echo "<br>";
echo "<br>";

echo "<br>";

echo "Pinging.... $ipaddress !";
echo "<br>";
echo "<br>";

exec("ping -c 4 " . $ipaddress, $output, $result);

print_r($output);

if ($result == 0)
{
echo "Ping  $ipaddress successful!";
echo "<br>";
echo "<br>";}

else
	
	{

echo "Ping  $ipaddress unsuccessful!";
echo "<br>";
	echo "<br>";}


 include("http://" . $ipaddress . ":8087/JavaBridge/java/Java.inc");



?>

