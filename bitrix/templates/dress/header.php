<?

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
$blsMainPage = $APPLICATION->GetCurPage(false) == SITE_DIR;
/*теперь эту переменную можно использовать, чтобы отображать его на главной странице, например хлебные крошки*/
?>
<!DOCTYPE html>
<html>
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <link href="<?=SITE_TEMPLATE_PATH?>/img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/owl.carousel.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jquery.fancybox.min.css'); ?>
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,400i,700,700i" rel="stylesheet">
</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>
<span id="top"></span>
<header>
    <section class="top-header">
        <div class="header-telefon clearfix">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/tel-header.png" alt="Наш телефон">
            <a class="number-tel" href="callto:<?$APPLICATION->IncludeFile(
                SITE_DIR."include/telefon.php",
                array(),
                array(
                    "MORE" => "text"
                )
            );?>">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/telefon.php",
                    array(),
                    array(
                        "MORE" => "text"
                    )
                );?>
            </a>
        </div>
        <nav class="header-menu" id="header-menu">
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
        </nav>
    </section>
    <section class="bottom-header">
        <?if($blsMainPage):?>
        <div class="logo-slogan">
            <div class="header-logo">
                <?$APPLICATION->IncludeFile(
                    SITE_DIR."include/logo.php",
                    array(),
                    array(
                        "MORE" => "html"
                    )
                );?>
                <?else:?>
                <div class="logo-slogan">
                    <a  class="header-logo" href="/">
                        <div>
                            <?$APPLICATION->IncludeFile(
                                SITE_DIR."include/logo.php",
                                array(),
                                array(
                                    "MORE" => "html"
                                )
                            );?>
                        </div>
                        <?endif;?>
                        <?if($blsMainPage):?>
                </div>
            <?else:?>
                    </a>
            <?endif;?>
                <div class="header-slogan">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/slogan.php",
                        array(),
                        array(
                            "MORE" => "html"
                        )
                    );?>
                </div>
            </div>
        </div>
        <div class="social-wrapper">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/social.php",
                array(),
                array(
                    "MORE" => "html"
                )
            );?>
        </div>
    </section>
</header>
