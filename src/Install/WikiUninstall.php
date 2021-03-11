<?php


namespace Nemundo\Wiki\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Wiki\Data\WikiCollection;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class WikiUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new WikiCollection());
    }

}