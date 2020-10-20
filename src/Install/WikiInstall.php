<?php


namespace Nemundo\Wiki\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\App\Install\ContentAppInstall;
use Nemundo\Content\App\Bookmark\Content\UrlContentType;
use Nemundo\Content\App\Contact\Content\Contact\ContactContentType;
use Nemundo\Content\App\Document\Content\File\FileContentType;
use Nemundo\Content\App\Map\Content\SwissMap\SwissMapContentType;
use Nemundo\Content\App\Text\Content\Html\HtmlContentType;
use Nemundo\Content\App\Text\Content\LargeText\LargeTextContentType;
use Nemundo\Content\App\Text\Content\Text\TextContentType;
use Nemundo\Content\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
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

        (new ContentAppInstall())
            ->install();

        (new WikiSetup())
            ->addContentType(new TextContentType())
            ->addContentType(new LargeTextContentType())
            ->addContentType(new HtmlContentType())
            ->addContentType(new FileContentType())
            ->addContentType(new UrlContentType())
            ->addContentType(new SwissMapContentType())
            ->addContentType(new YouTubeContentType())
            ->addContentType(new WebcamContentType())
            ->addContentType(new ContactContentType())
            ;


    }

}