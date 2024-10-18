<?php
namespace Victory\Options;

use Bitrix\Main\Config\Option,
    CFile;

class CVictoryOptions
{
    const MODULE_ID = 'victory.options';

    public static function getOptionValue($optionCode) {
        return Option::get(self::MODULE_ID, $optionCode);
    }

    public static function showImage($optionCode, $alt = '', $className = '') {
        $imageID = Option::get(self::MODULE_ID, $optionCode);
        $arImage = CFile::GetFileArray($imageID);
        if ($arImage['SRC'] && stristr($arImage['CONTENT_TYPE'], 'image/')) {
            if ($className) {
                $className = ' class="' . $className . '"';
            }
            return '<img src="' . $arImage['SRC'] . '"' . $className . ' alt="' . $alt . '">';
        }
        return false;
    }

    public static function getFileArray($optionCode) {
        $fileID = Option::get(self::MODULE_ID, $optionCode);
        return CFile::GetFileArray($fileID);
    }

    public static function getIncludeAreaData($optionCode) {
        $includeAreaPath = Option::get(self::MODULE_ID, $optionCode);
        ob_start();
        global $APPLICATION;
        $APPLICATION->IncludeFile(
            $includeAreaPath,
            [],
            [
                "MODE" => "php",
                "NAME" => $optionCode,
            ]
        );
        $str = ob_get_contents();
        ob_end_clean();
        return $str;
    }
}