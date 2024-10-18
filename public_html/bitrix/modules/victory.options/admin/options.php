<?php

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Config\Option;
use Bitrix\Main\Application,
    Bitrix\Main\Context,
    Bitrix\Main\Request,
    Bitrix\Main\Server;

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');

global $APPLICATION;
$moduleId = 'victory.options';
if (!$USER->IsAdmin()) {
    return;
}
Loc::loadMessages(__FILE__);
$APPLICATION->SetAdditionalCss('/bitrix/css/'.$moduleId.'/options.css');
CJSCore::Init(array("jquery2"));

$needUpdate = false;
$context = Application::getInstance()->getContext();
$request = $context->getRequest();
if($request->isPost() && check_bitrix_sessid()){
    $postValues = $request->getPostList()->toArray();
    if (strlen($postValues['Update'])) {
        $needUpdate = true;
    }
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $moduleId . '/config.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $moduleId . '/config.php';
} elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $moduleId . '/config.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $moduleId . '/config.php';
} elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $moduleId . '/demo.config.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $moduleId . '/demo.config.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $moduleId . '/demo.config.php';
}

if ($config) {
    $arAllOptions = $config;

    $rsSites = CSite::GetList(
        $by = "sort",
        $order = "desc",
        []
    );
    $arTabs = [];
    while ($arSite = $rsSites->Fetch()) {
        $arTab = [
            "DIV" => "edit" . $arSite['LID'],
            "TAB" => $arSite['SITE_NAME'],
            "ICON" => "ib_settings",
            "TITLE" => $arSite['SITE_NAME'] . Loc::getMessage("MAIN_TAB_TITLE_SET"),
            "SITE_ID" => $arSite['LID'],
            "SITE_DIR" => $arSite['DIR']
        ];
        $arTabs[] = $arTab;
    }
    $tabControl = new CAdminTabControl("tabControl", $arTabs);
    $tabControl->Begin();
    ?>
    <form method="post" class="victory-options--list"
          action="<? echo $APPLICATION->GetCurPage() ?>">
        <? foreach ($arTabs as $tabCounter => $tab): ?>
            <? $tabControl->BeginNextTab(); ?>
            <?
            if (count($arTabs) <= 1) {
                $optionPostfix = '';
            } else {
                $optionPostfix = '_' . $tab['SITE_ID'];
            }
            foreach ($arAllOptions as $optionSectionKey => $optionsSection) {
                if ($optionSectionKey) {
                    ?>
                  <tr><td colspan="2" class="end-section-line"></td></tr>
                    <?
                }
                ?>
                <tr>
                    <td colspan="2">
                        <h2><?= $optionsSection['section']['name'] ?></h2>
                    </td>
                </tr>
                <?
                foreach ($optionsSection['section']['fields'] as $optionCode => $arOption) {
                    $optionCode .= $optionPostfix;
                    $val = Option::get($moduleId, $optionCode);
                    $type = $arOption['type'];
                    if ($needUpdate && $postValues[$optionCode]) {
                        Option::set($moduleId, $optionCode, $postValues[$optionCode]);
                        $val = $postValues[$optionCode];
                    }
                    ?>
                    <tr>
                        <td width="40%" nowrap <? if ($type == "textarea") {
                            echo 'class="adm-detail-valign-top"';
                        } ?>>
                            <label for="<? echo htmlspecialcharsbx($optionCode) ?>"><? echo $arOption['label'] ?>:</label>
                        <td width="60%">
                            <? if ($type == "checkbox"): ?>
                                <input type="checkbox" id="<? echo htmlspecialcharsbx($optionCode) ?>"
                                       name="<? echo htmlspecialcharsbx($optionCode) ?>" value="Y"<? if ($val == "Y") {
                                    echo " checked";
                                } ?>>
                            <? elseif ($type == 'select'): ?>
                                <select name="<? echo htmlspecialcharsbx($optionCode) ?>">
                                    <? foreach ($arOption['value'] as $value => $label): ?>
                                        <option value="<?= $value ?>"
                                                <? if ($value == $val): ?>selected="selected"<? endif; ?>><?= $label ?></option>
                                    <? endforeach; ?>
                                </select>
                            <? elseif ($type == "text"): ?>
                                <input type="text" size="<? echo $arOption['size'] ? $arOption['size'] : '' ?>" maxlength="255"
                                       value="<? echo htmlspecialcharsbx($val) ?>"
                                       name="<? echo htmlspecialcharsbx($optionCode) ?>">
                            <? elseif ($type == "textarea"): ?>
                                <textarea cols="<?= $arOption['cols'] ? $arOption['cols'] : 20 ?>" rows="<?= $arOption['rows'] ? $arOption['rows'] : 2 ?>"
                                          name="<? echo htmlspecialcharsbx($optionCode) ?>"><? echo htmlspecialcharsbx($val) ?></textarea>
                            <? elseif ($type == 'file'): ?>
                                <?
                                if (strtoupper($arOption['multiple']) == 'Y') {
                                    $arOption['multiple'] = 'Y';
                                } else {
                                    $arOption['multiple'] = 'N';
                                }
                                $APPLICATION->IncludeComponent("bitrix:main.file.input", "drag_n_drop",
                                    array(
                                        "INPUT_NAME" => $optionCode,
                                        "MULTIPLE" => $arOption['multiple'],
                                        "MODULE_ID" => $moduleId,
                                        "MAX_FILE_SIZE" => "",
                                        "ALLOW_UPLOAD" => "A",
                                        "ALLOW_UPLOAD_EXT" => "",
                                        "INPUT_VALUE" => $_POST[$optionCode]
                                    ),
                                    false
                                );
                                ?>
                            <? elseif ($type == 'include_area'): ?>
                                <?
                                if (!$arOption['dir']) {
                                    $arOption['dir'] = '/include/';
                                }
                                $filePath = str_replace('//', '/', $tab['SITE_DIR'] . $arOption['dir'] . $optionCode . '.php');
                                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $filePath)) {
                                    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . $filePath, "w+");
                                    if ($fp) {
                                        fclose($fp);
                                    }
                                } ?>
                                <input type="hidden" name="<?= $optionCode ?>" value="<?= $filePath ?>">
                                <a class="adm-btn"
                                   href="javascript: new BX.CAdminDialog({'content_url':'/bitrix/admin/public_file_edit.php?site=<?= $tab['SITE_ID'] ?>&bxpublic=Y&from=includefile&noeditor=Y&templateID=4&path=<?= $filePath ?>&lang=ru&template=&subdialog=Y&siteTemplateId=4','width':'1009','height':'503'}).Show();"
                                   name="<?= $optionCode ?>"
                                   title="<?= Loc::getMessage("EDIT_TITLE")?>"><?= Loc::getMessage("EDIT_TITLE")?></a>
                            <? endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" class="victory-option--suggest-container">
                            <div class="victory-option--suggest"><?= $optionCode ?></div>
                        </td>
                        <td width="60%" class="victory-option--suggest-container">
                            <? if ($arOption['description']): ?>
                                <div class="victory-option--suggest victory-option--description"><?= $arOption['description'] ?></div>
                            <? endif; ?>
                        </td>
                    </tr>
                <?
                }
            }
        endforeach; ?>
        <? $tabControl->Buttons(); ?>
        <input type="submit" name="Update" value="<?= Loc::getMessage("MAIN_SAVE") ?>"
               title="<?= Loc::getMessage("MAIN_OPT_SAVE_TITLE") ?>" class="adm-btn-save">
        <?= bitrix_sessid_post(); ?>
        <? $tabControl->End(); ?>

    </form>
    <script>
        $(document).on('click', '#btn_popup_save', function (){
            $(document).find('#wait_window_div').remove(); //TODO: разобраться с шилдиком загрузки
        });
    </script>
    <?php
} else {
    ?>
    <div class="adm-info-message-wrap">
        <div class="adm-info-message">
            <span class="required"><?= Loc::getMessage("NOT_FOUND_CONFIG")?></span>
        </div>
    </div>
    <?php
}
