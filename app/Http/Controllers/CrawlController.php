<?php

namespace App\Http\Controllers;

use App\Page;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Infrastructure\Enums\SelectorEnum;

class CrawlController extends Controller
{
    const PAGES_COUNT = 33;

    private $client;
    private $url = "https://quera.ir/careers/jobs?page=:number";


    public function crawlPage(Request $request)
    {
        $this->client = new Client();

        for ($j = 1; $j <= self::PAGES_COUNT; $j++) {

            $crawler = $this->client->request('GET', __($this->url, ['number' => $j]));

            $titles = $this->getData(SelectorEnum::TITLE_SELECTOR, $crawler);
            $companies = $this->getData(SelectorEnum::COMPANY_SELECTOR, $crawler);
            $levels = $this->getData(SelectorEnum::LEVEL_SELECTOR, $crawler);
            $contractTypes = $this->getData(SelectorEnum::CONTRACT_TYPE_SELECTOR, $crawler);
            $links = $this->getLinks(SelectorEnum::LINK_SELECTOR, $crawler);
            $descriptions = $this->getDescriptions($links);


            for ($i = 0; $i <= 13; $i++) {

                if (!isset($titles[$i])) {
                    continue;
                }

                $record = new Page();
                $record->{Page::TITLE} = $titles[$i] ?? null;
                $record->{Page::COMPANY} = $companies[$i] ?? null;
                $record->{Page::LEVEL} = $levels[$i] ?? null;
                $record->{Page::CONTRACT_TYPE} = $contractTypes[$i] ?? null;
                $record->{Page::LINK} = $links[$i] ?? null;
                $record->{Page::DESCRIPTION} = $descriptions[$i] ?? null;

                $record->saveOrFail();
            }

            echo "page $j has been crawled.<br>";
        }


        echo "all data has been crawled successfully.<br>";
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
