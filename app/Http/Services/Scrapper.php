<?php namespace App\Http\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Scrapper
{
    protected string $url;
    protected $content;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->content = null;
    }

    public function getContentByXpath($titleXpath, $contentXpath, $imageXpath, $authorXpath): array
    {
        $html = $this->getContent();
        if (empty($html)) {
            return [];
        }

        $dom = new DOMDocument();
        $internalErrors = libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_use_internal_errors($internalErrors);
        $rootDom = new DOMXpath($dom);

        return [
            "title"   => $this->getTitleByXpath($rootDom, $titleXpath),
            "content" => $this->getContentTextByXpath($rootDom, $contentXpath),
            "author"  => $this->getAuthorByXpath($rootDom, $authorXpath),
            "image"   => $this->getImageByXpath($rootDom, $imageXpath)
        ];
    }

    public function getContent(): string
    {
        $scriptPath = app_path("Scripts/fetch.py");
        $process = new Process(["python3", $scriptPath, $this->url]);
        $process->run();

        if (!$process->isSuccessful()) {
            Log::error("Running fetching script failed", compact("process"));
        }

        return $process->getOutput();
    }

    protected function getTitleByXpath($rootDom, ?string $xpath): string
    {
        $node = $rootDom->query($xpath ?? "//h1");

        return isset($node->item(0)->textContent) ? $node->item(0)->textContent : "";
    }

    protected function getContentTextByXpath($rootDom, ?string $xpath): string
    {
        $node = $rootDom->query($xpath ?? "//*[@id='articleContent']");

        $contentText = "";

        if (isset($node->item(0)->textContent)) {
            foreach ($node as $childNode) {
                $contentText = $contentText . '</br>' . $childNode->textContent;
            }
        }

        return $contentText;
    }

    protected function getAuthorByXpath($rootDom, ?string $xpath): string
    {
        $node = $rootDom->query($xpath ?? "//*[@id='author']");

        return isset($node->item(0)->textContent) ? $node->item(0)->textContent : "";
    }

    protected function getImageByXpath(DOMXPath $rootDom, ?string $xpath): ?UploadedFile
    {
        $node = $rootDom->query($xpath ?? "meta[property='og:image']");

        $imageUrl = optional($node->item(0))->getAttribute('content');
        $imageUrl = empty($imageUrl) ? optional($node->item(0))->getAttribute('src') : $imageUrl;

        return !empty($imageUrl) ? $this->fetchImage($imageUrl) : null;
    }

    protected function fetchImage(string $imageUrl): ?UploadedFile
    {
        $url = Str::before($imageUrl, '?');
        $info = pathinfo($url);
        $contents = file_get_contents($url);
        $file = '/tmp/' . $info['basename'];

        return file_put_contents($file, $contents) ? new UploadedFile($file, $info['basename']) : null;
    }
}

