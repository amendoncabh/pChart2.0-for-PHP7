<?php

/* Include all the classes */ 
require_once("bootstrap.php");

use QRCode\{
	QRCode,
	QRException
};

use pChart\{
	pDraw,
	pColor
};

/* Create the pChart object */
$myPicture = new pDraw(600,310,TRUE);

/* Draw the rounded box */
$myPicture->setShadow(TRUE,["X"=>2,"Y"=>2,"Color" => new pColor(0,0,0,30)]);
$myPicture->drawRoundedFilledRectangle(10,10,590,300,10,["Color"=> new pColor(255), "BorderColor" => new pColor(0)]);

/* Draw the cell divisions */
$myPicture->setShadow(FALSE);
$Settings = ["Color" => new pColor(0)];
$myPicture->drawLine(10,110,590,110,$Settings);
$myPicture->drawLine(200,10,200,110,$Settings);
$myPicture->drawLine(400,10,400,110,$Settings);
$myPicture->drawLine(10,160,590,160,$Settings);
$myPicture->drawLine(220,160,220,200,$Settings);
$myPicture->drawLine(320,160,320,200,$Settings);
$myPicture->drawLine(10,200,590,200,$Settings);
$myPicture->drawLine(400,220,400,300,$Settings);

/* Write the fields labels */
$myPicture->setFontProperties(["FontName"=>"fonts/Cairo-Regular.ttf","FontSize"=>8]);
$Settings = ["Color" => new pColor(0),"Align"=>TEXT_ALIGN_TOPLEFT];
$myPicture->drawText(20,20,"FROM",$Settings);
$myPicture->drawText(210,20,"TO",$Settings);
$myPicture->drawText(20,120,"ACCT.\r\nNUMBER",$Settings);
$myPicture->drawText(20,166,"QUANTITY",$Settings);
$myPicture->drawText(230,166,"SHIPMENT CODE",$Settings);
$myPicture->drawText(330,166,"SENDER CODE",$Settings);
$myPicture->drawText(410,220,"MFG DATE",$Settings);
$myPicture->drawText(410,260,"NET WEIGTH",$Settings);

/* Filling the fields values */
$myPicture->setFontProperties(["FontSize"=>9]);
$myPicture->drawText(70,20,"BEBEER INC\r\n342, MAIN STREET\r\n33000 BORDEAUX\r\nFRANCE",$Settings);
$myPicture->drawText(250,20,"MUSTAFA'S BAR\r\n18, CAPITOL STREET\r\n31000 TOULOUSE\r\nFRANCE",$Settings);

$myPicture->setFontProperties(["FontSize"=>35]);
$myPicture->drawText(100,120,"2342355552340",$Settings);

$myPicture->setFontProperties(["FontSize"=>20]);
$Settings = ["Color" => new pColor(0),"Align"=>TEXT_ALIGN_TOPRIGHT];
$myPicture->drawText(180,170,"75 CANS",$Settings);
$myPicture->setFontProperties(["FontSize"=>16]);
$myPicture->drawText(290,180,"TLSE",$Settings);
$myPicture->drawText(570,180,"WAREHOUSE#SLOT#B15",$Settings);

$Settings = ["Color" => new pColor(0),"Align" => TEXT_ALIGN_TOPLEFT];
$myPicture->drawText(410,236,"06/06/2010",$Settings);
$myPicture->drawText(410,276,"12.340 Kg",$Settings);

$QRCode = new QRcode();
$QRCode->config(['level' => 1, 'size' => 3, 'margin' => 4]);
$QRCode->encode('momchil@bojinov.info');
$QRCode->forPChart($myPicture, $X = 445, $Y = 11);

/* Render the picture (choose the best way) */
$myPicture->autoOutput("temp/example.qrcode.png");

