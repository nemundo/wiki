<?php


namespace Nemundo\Wiki\Setup;

use Nemundo\Content\Setup\ApplicationContentTypeSetup;
use Nemundo\Wiki\Application\WikiApplication;

class WikiSetup extends ApplicationContentTypeSetup
{

    public function __construct()
    {
        parent::__construct(new WikiApplication());
    }

}