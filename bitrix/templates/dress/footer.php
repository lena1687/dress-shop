<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<footer>
    <div class="top-footer">
        <div class="footer-contacts">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/adress-info.php",
                array(),
                array(
                    "MORE" => "html"
                )
            );?> <?$APPLICATION->IncludeFile(
                SITE_DIR."include/telefon.php",
                array(),
                array(
                    "MORE" => "html"
                )
            );?>
        </div>
        <div class="footer-menu-social">
            <div class="footer-menu" id="footer-menu">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "header-menu", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "1",	// Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                        0 => "",
                    ),
                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                    "ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                    false
                );?>
            </div>
            <div class="footer-social">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/social.php",
                    array(),
                    array(
                        "MORE" => "html"
                    )
                );?>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <?$APPLICATION->IncludeFile(
            SITE_DIR."include/copyright.php",
            array(),
            array(
                "MORE" => "html"
            )
        );?>
    </div>
</footer>
<?
CJSCore::Init(array("jquery"));
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/tether.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/owl.carousel.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/autoplay.js');
?>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</body>
</html>
