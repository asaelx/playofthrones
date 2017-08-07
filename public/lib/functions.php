<?php
include('simple_html_dom.php');
$config_content = file_get_contents('json/config.json');
$config = json_decode($config_content, true);

$feed = new DOMDocument;

// Trailers
$feed->load('https://www.youtube.com/feeds/videos.xml?channel_id=UCQzdMyuz0Lf4zo4uGcEujFw');
$trailers = [];
$yt = 'http://www.youtube.com/xml/schemas/2015';
$media = 'http://search.yahoo.com/mrss/';

$i = 1;
foreach ($feed->getElementsByTagName('entry') as $video) {
    $trailers[] = [
        'title' => $video->getElementsByTagName('title')->item(0)->nodeValue,
        'id' => $video->getElementsByTagNameNS($yt, 'videoId')->item(0)->nodeValue,
        'thumbnail' => $video->getElementsByTagNameNS($media, 'group')->item(0)->getElementsByTagNameNS($media, 'thumbnail')->item(0)->getAttribute('url'),
        'url' => $video->getElementsByTagName('link')->item(0)->getAttribute('href')
    ];
    if($i++ == 3) break;
}

// News
// $html = file_get_contents('https://winteriscoming.net/');
$dom = new simple_html_dom();
$dom->load_file('https://winteriscoming.net/');
$articles = $dom->find('div.main div.feature div.article');

$news = [];
$limit = 1;

foreach ($articles as $article) {
    $news[] = [
        'thumbnail' => $article->find('a.article-image', 0)->attr['data-original'],
        'title' => $article->find('div.article-meta h3.title a', 0)->innertext,
        'url' => $article->find('div.article-meta h3.title a', 0)->attr['href'],
        'excerpt' => $article->find('div.article-meta a.excerpt', 0)->innertext
    ];
    if($limit++ == 4) break;
}

$episode = callApi('GET', 'http://api.tvmaze.com/shows/82/episodebynumber?season='. $config['season'] .'&number='. $config['episode']);
$next = callApi('GET', 'http://api.tvmaze.com/shows/82/episodebynumber?season='. $config['season'] .'&number=' . ($config['episode'] + 1));
$quote = callApi('GET', 'https://got-quotes.herokuapp.com/quotes');

$dom->load_file($episode->url);
$episode_trailer = $dom->find('article#episode-video iframe', 0)->attr['src'];

function callApi($method, $url, $data = false)
{
    $curl = curl_init($url);
    $headers = ['authorization: Bearer '];
    if($method == 'POST'){
        curl_setopt($curl, CURLOPT_POST, true);
        if($data){
            $data = http_build_query($data);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $decoded = json_decode($curl_response);
    return $decoded;
}
