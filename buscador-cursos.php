<?php 
 require_once "vendor/autoload.php";
 //require "src/BuscadorDeCursos.php";
  
 use Alura\BuscadorDeCursos\Buscador ;

 use GuzzleHttp\Client;
 use Symfony\Component\DomCrawler\Crawler;

 $client = new Client(['base_uri'=>'https://www.alura.com.br/']); 
 
 $crawler = new Crawler();

 $buscador = new Buscador( $client , $crawler ); 

 $cursos  = $buscador->search('/cursos-online-programacao/php');
 $i=1;
 foreach ($cursos as $curso) {
    echo $i++." - ". $curso . PHP_EOL;
}  
 