<?
	require_once('utils.inc.php');
	header("Content-Type: text/plain; charset=UTF-8");

	if (isset($_GET['UF'])) $uf = $_GET['UF'];
	else $uf = null;
	
	if ($uf != NULL)
	{
		$resMunicipios = query(sprintf($sqlGetMunicipiosByCodUf,$uf));

    $jsonOutput .= '    [' . "\r\n";

		while ($myMunicipio = mysql_fetch_array($resMunicipios))
		{
      $jsonOutput .= '      {' . "\r\n";
      $jsonOutput .= '        "cod": "' . utf8_encode($myMunicipio['codigo']) . '",' . "\r\n";
      $jsonOutput .= '        "nome": "' . utf8_encode($myMunicipio['nome']) . '"' . "\r\n";
      $jsonOutput .= '      },' . "\r\n";
		}
		
		$jsonOutput = substr($jsonOutput, 0, -3);
		$jsonOutput .= "\r\n";

    $jsonOutput .= '    ]' . "\r\n";

    echo($jsonOutput);

	}
?>
