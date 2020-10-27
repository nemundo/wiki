<?php


namespace Nemundo\Wiki\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Base\Collection\ContentAppContentTypeCollection;
use Nemundo\Content\App\Base\Install\ContentAppInstall;
use Nemundo\Content\Install\ContentInstall;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\WikiCollection;
use Nemundo\Wiki\Script\WikiCleanScript;
use Nemundo\Wiki\Setup\WikiSetup;
use Nemundo\Wiki\Usergroup\WikiEditorUsergroup;


class WikiInstall extends AbstractInstall
{

    public function install()
    {

        (new ContentInstall())
            ->install();

        (new ModelCollectionSetup())
            ->addCollection(new WikiCollection());

        (new ContentTypeSetup())
            ->addContentType(new WikiPageContentType());

        (new ScriptSetup())
            ->addScript(new WikiCleanScript());

        (new UsergroupSetup())
            ->addUsergroup(new WikiEditorUsergroup());

        /*
        (new ContentAppInstall())
            ->install();*/

        (new WikiSetup())
            ->addContentTypeCollection(new ContentAppContentTypeCollection());

    }

}