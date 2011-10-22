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

        // Dataset ... database connection to come :)
        $author = new Author('John Doe', 'johnd@theodo.fr');

        $snippets = array(
            0 => new Snippet('One', 'text one', $author),
            1 => new Snippet('Two', 'text two', $author),
            2 => new Snippet('Three', 'text three', $author),
        );

        // List of Snippets.
        $controllers->get('/', function() use ($app, $snippets) {

            return $app['twig']->render('index.html.twig', array(
                'snippets' => $snippets,
            ));
        })
        ->bind('snippet_index');

        // Show a Snippet.
        $controllers->get('/{id}', function($id) use ($app, $snippets) {
            $ids = array_keys($snippets);
            if (!in_array($id, $ids)) {
                throw new \Exception(sprintf('Snippet id "%s" not found.', $id));
            }

            $snippet = $snippets[$id];

            return $app['twig']->render('show.html.twig', array(
                'snippet' => $snippet,
            ));
        })
        ->bind('snippet_show')
        ->assert('id', '\d+');

        return $controllers;
    }
}
