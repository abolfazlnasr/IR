<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Infrastructure\Enums\SelectorEnum;

class CrawlController extends Controller
{
    const PAGES_COUNT = 33;

    private $client;
    private $url = "https://quera.ir/careers/jobs?page=1";


    public function crawlPage(Request $request)
    {
        $this->client = new Client();
        $crawler = $this->client->request('GET', $this->url);

        $titles = $this->getData(SelectorEnum::TITLE_SELECTOR, $crawler);
        $companies = $this->getData(SelectorEnum::COMPANY_SELECTOR, $crawler);
        $levels = $this->getData(SelectorEnum::LEVEL_SELECTOR, $crawler);
        $contractTypes = $this->getData(SelectorEnum::CONTRACT_TYPE_SELECTOR, $crawler);
        $links = $this->getLinks(SelectorEnum::LINK_SELECTOR, $crawler);
        $descriptions = $this->getDescriptions($links);

    }

    private function getData($selector, $crawler): array
    {
        return $crawler->filter($selector)->extract(['_text']);
    }

    private function getLinks($selector, $crawler): array
    {
        $links = [];
        $rawLinks = $crawler->filter($selector)->extract(['href']);

        foreach ($rawLinks as $rawLink) {
            $links [] = "https://quera.ir" . $rawLink;
        }

        return $links;
    }

    private function getDescriptions($links): array
    {
        $descriptions = [];

        foreach ($links as $link) {
            $crawler = $this->client->request('GET', $link);
            $temp = $this->getData(SelectorEnum::DESCRIPTION_SELECTOR, $crawler);
            $description = "";

            foreach ($temp as $paragraph) {
                $description .= $paragraph . " ";
            }

            $descriptions [] = $description;
        }

        return $descriptions;
    }

}
