<?php
$a=12;
$b=0;
$c="";
$a="1,2,3,4,5,6,7,8,9,10,11,12";
$b=substr($a,0,-1);
echo $b;



function nl()
{
    echo "<br>";
}
nl();
$x=1;
$txt="";
while($x<=102)
{
    $txt=$txt.' '.$x.' ,';
    if($x%10==0)
    {
        $txt=substr($txt,0,-1);
        $txt=$txt.'<br>';
    }
}
if(substr($txt,-1)==',')
    $txt=substr($txt,0,-1);
echo $txt;

nl();
$b=5;
$a=4;
$c=$a+$b;
echo $c;

nl();
$b="5";
$a="4";
$c=$a+$b;
echo $c;



?>