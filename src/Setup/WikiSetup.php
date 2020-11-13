<?php


namespace Nemundo\Wiki\Setup;

use Nemundo\Content\Setup\ApplicationContentTypeSetup;
use Nemundo\Wiki\Application\WikiApplication;

class WikiSetupOld extends ApplicationContentTypeSetup
{

    public function __construct()
    {
        parent::__construct(new WikiApplication());
    }

}