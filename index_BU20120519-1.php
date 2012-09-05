<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>De Doofpot - weg ermee! - Z O D A N oº° | Creative, solid thinking</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0;">
<meta name="keywords" content="zodan, doofpot, versnipperaar, minnaressen, schaduwboekhouding, bewijsmateriaal , conceptontwikkeling, animatie, vormgeving, webdesign, multimedia, huisstijl, logo, presentaties, promotiemateriaal, commercials, infomercials, drukwerk, foldermateriaal, video, av, hoedan, Marten, Henry, " />
<meta name="description" content="De Doofpot - Foto's van minnaressen, een verlopen schaduwboekhouding, bewijsmateriaal van je betrokkenheid bij een fraudezaak, obscure homevideo's - sommige zaken kunnen maar beter in de doofpot gestopt worden. Op deze unieke plek kan je alle documenten die je liever ziet verdwijnen naar de eeuwige digitale jachtvelden zenden.." />
<meta name="robots" content="none" />
<link href="css/doofpot.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div id="wrapper">
		<div id="header">
			<img src="img/doofpot-logo.gif" width="283" height="131" alt="plaatje van oude doofpot (hm, eigenlijk een kwispedoor) met de tekst 'de doofpot' ernaast." title="De Doofpot" />
		</div>
		<div id="content"> 
			<p>Foto's van minnaressen, een verlopen schaduwboekhouding, bewijsmateriaal 
			van je betrokkenheid bij een fraudezaak, obscure homevideo's - sommige 
			zaken kunnen maar beter in de doofpot gestopt worden. Op deze unieke plek kan 
			je alle documenten die je liever ziet verdwijnen naar de eeuwige digitale jachtvelden 
			zenden.</p>
  
<?	if($_POST) {
		if($_POST && $_FILES && (strlen($_FILES['doofpot']['name'])>1) ) { ?>
			<p class="message">Het bestand <strong><?=$_FILES['doofpot']['name']?></strong> is in de doofpot gestopt</p>
			<p>&raquo; <a href="index.php">stop nog een bestand in de doofpot</a>.</p>
<?		} else { ?>
			<p>Er is niets om in de doofpot te stoppen.</p>
			<p>&raquo; <a href="index.php">stop een bestand in de doofpot</a>.</p>
<?		}
	} else { ?>
			<form action="index.php" method="post" encType="multipart/form-data">
            	<fieldset>
					<p>Selecteer een bestand:<br /><input type="file" size="30" name="doofpot" /></p>
					<p><input class="button" type="submit" value="Weg ermee !" name="indedoofpot" /></p>
                </fieldset>
			</form>
<?	} ?>
		</div>
	</div>
</body>
</html>