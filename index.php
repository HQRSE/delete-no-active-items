<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Товары без фото");
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

	$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 10, 'SITE_ID' => "s1", "ACTIVE" => 'N'), false, array("nTopCount" => 150, "nPageSize" => 150), false);
	while ($item = $res->GetNext()) {
		$idid[] = $item['ID'];
	}

/* *********** */

?>

<div class="container" style="margin-top: 180px;font-size: 14px;">

<?

if (count($idid) > 0) {

	foreach ($idid as $key => $id) {

	CIBlockElement::Delete($id);

}

header("refresh: 3; url=/12dev/del_noactive_item/index.php");

}

echo count($idid)."<br>";

echo "<pre>"; print_r($idid); echo "</pre>";

?>

</div>

<br>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
