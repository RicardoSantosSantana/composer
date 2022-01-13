<?php
namespace Alura\BuscadorDeCursos;
 
 
class Buscador {
  
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */    
    private $crawler;

    public function __construct($httpClient, $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function search(string $url){        

        $response = $this->httpClient->request('GET',$url);
        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos=[];
        foreach($elementosCursos as $elements){
            $cursos[] = $elements->textContent;
        }
        return $cursos;

    }
}