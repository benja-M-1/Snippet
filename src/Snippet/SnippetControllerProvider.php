<?php
/**
 * SnippetControllerProvider class
 *
 * @author Benjamin Grandfond <benjaming@theodo.fr>
 * @since 22/10/11
 */

namespace Snippet;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Snippet\Model\Author;
use Snippet\Model\Snippet;

class SnippetControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = new ControllerCollection();

        // List of Snippets.
        $controllers->get('/', function() use ($app) {
            $author = new Author('John Doe', 'johnd@theodo.fr');

            $snippets = array(
                new Snippet('One', 'text one', $author),
                new Snippet('Two', 'text two', $author),
                new Snippet('Three', 'text three', $author),
            );

            return $app['twig']->render('index.html.twig', array(
                'snippets' => $snippets,
            ));
        })
        ->bind('snippet_index');

        return $controllers;
    }
}
