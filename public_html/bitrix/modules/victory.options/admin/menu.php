<?
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

AddEventHandler('main', 'OnBuildGlobalMenu', 'OnBuildGlobalMenuHandlerVictory');
function OnBuildGlobalMenuHandlerVictory(&$arGlobalMenu, &$arModuleMenu){
    if(!defined('VICTORY_MENU_INCLUDED')){
        define('VICTORY_MENU_INCLUDED', true);

        IncludeModuleLangFile(__FILE__);
        $moduleID = 'victory.options';

        $GLOBALS['APPLICATION']->SetAdditionalCss('/bitrix/css/'.$moduleID.'/menu.css');

        if($GLOBALS['APPLICATION']->GetGroupRight($moduleID) >= 'R'){
            $arMenu = array(
                'text' => Loc::getMessage('VICTORY_OPTIONS_MAIN_MENU_TEXT'),
                'title' => Loc::getMessage('VICTORY_OPTIONS_MAIN_MENU_TITLE'),
                'sort' => 20,
                'icon' => 'victory_menu_item_options_main',
                'page_icon' => 'pi_control_center',
                'items_id' => 'control_center',
                'items' => array(
                    array(
                        'text' => Loc::getMessage('VICTORY_OPTIONS_MENU_OPTIONS_TEXT'),
                        'title' => Loc::getMessage('VICTORY_OPTIONS_MENU_OPTIONS_TITLE'),
                        'sort' => 20,
                        'icon' => 'victory_menu_item_options',
                        'page_icon' => 'pi_options',
                        'items_id' => 'options',
                        'url' => '/bitrix/admin/'.$moduleID.'_options.php?mid=main',
                    )
                )
            );
            /*$arMenu = array(
                'text' => Loc::getMessage('VICTORY_OPTIONS_TEST_1'),
                'title' => Loc::getMessage('VICTORY_OPTIONS_TEST_1_TITLE'),
                'sort' => 20,
                'icon' => 'seo_menu_icon',
                'page_icon' => 'pi_typography',
                'items_id' => 'gfiles',
                'items' => array(
                    array(
                        'text' => Loc::getMessage('VICTORY_OPTIONS_TEST_2'),
                        'title' => Loc::getMessage('VICTORY_OPTIONS_TEST_2_TITLE'),
                        'sort' => 20,
                        'url' => '/bitrix/admin/'.$moduleID.'_generate_robots.php?mid=main&lang='.LANGUAGE_ID,
                        'icon' => '',
                        'page_icon' => 'pi_typography',
                        'items_id' => 'grobots',
                    )
                )
            );*/

            if(!isset($arGlobalMenu['global_menu_victory'])){
                $arGlobalMenu['global_menu_victory'] = array(
                    'menu_id' => 'global_menu_victory',
                    'text' => Loc::getMessage('VICTORY_OPTIONS_GLOBAL_MENU_TEXT'),
                    'title' => Loc::getMessage('VICTORY_OPTIONS_GLOBAL_MENU_TITLE'),
                    'sort' => 1000,
                    'items_id' => 'global_menu_victory_items',
                );
            }

            $arGlobalMenu['global_menu_victory']['items'][$moduleID] = $arMenu;
        }
    }
}
?>