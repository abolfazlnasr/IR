<?php


namespace App\Infrastructure\Enums;


final class SelectorEnum
{
    const TITLE_SELECTOR = ".css-1536cui > article > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > h2:nth-child(1) > a:nth-child(1) > span:nth-child(1)";
    const COMPANY_SELECTOR = ".css-1536cui > article > div:nth-child(1) > div:nth-child(2) > div:nth-child(2) > div:nth-child(1) > p:nth-child(2)";
    const LEVEL_SELECTOR = ".css-1536cui > article > div:nth-child(1) > div:nth-child(2) > div:nth-child(3) > span:nth-child(1)";
    const CONTRACT_TYPE_SELECTOR = ".css-1536cui > article > div:nth-child(1) > div:nth-child(2) > div:nth-child(3) > span:nth-child(3)";
    const DESCRIPTION_SELECTOR = ".css-1scut3b > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > .css-xcnl2a > p";
    const LINK_SELECTOR = ".css-1536cui > article > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > h2:nth-child(1) > a:nth-child(1)";
}
