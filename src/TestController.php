<?php namespace Anomaly\FizlModule;

use Anomaly\PagesModule\Page\Contract\PageRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Robbo\Presenter\Decorator;

class TestController extends AdminController
{
    public function test(PageRepositoryInterface $pages, Decorator $decorator)
    {
        $page = $decorator->decorate($pages->find(2));
        //$page = $pages->find(2);

        dd($page->entry->test);
    }
}
