<?php

namespace Snippet\Controller;

use Silex\Application;
use Silex\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SnippetController extends Controller
{
   public function index(Application $app)
   {
       $author = new Snippet\Model\Author('John Doe', 'johnd@theodo.fr');

    $snippets = array(
        new Snippet\Model\Snippet('Premier', 'blablablabla', $author),
        new Snippet\Model\Snippet('Deuxième', 'totototototot', $author),
        new Snippet\Model\Snippet('Troisième', 'azaaazazazaz', $author),
    );

    $content = '';

    foreach ($snippets as $snippet)
    {
        $content .= '<li>'.(string) $snippet.'</li>';
    }

    return new Response('<ul>'.$content.'</ul>');
   }
}
