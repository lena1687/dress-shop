<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<?if (0 < $arResult["SECTIONS_COUNT"]):?>
    <div class="catalog-list">
        <h1>Каталог</h1>
        <ul class="product-sections">
            <?foreach ($arResult['SECTIONS'] as &$arSection):
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                ?>
                <li class="product-section" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                    <a
                            href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                            class="product-section-img"
                            style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
                            title="<? echo $arSection['PICTURE']['TITLE']; ?>">
                        <span class="bottom-img"></span>
                    </a>
                    <h2 class="product-section-title">
                        <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
                            <? echo $arSection['NAME']; ?>
                        </a>
                    </h2>
                </li>
            <?endforeach;?>
        </ul>
    </div>
<?endif;?>