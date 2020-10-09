<?php


namespace Nemundo\Wiki\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Process\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Wiki\Content\TitleChange\TitleChangeContentType;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\WikiCollection;
use Nemundo\Wiki\Group\Type\WikiGroupType;
use Nemundo\Wiki\Group\WikiEditorGroup;
use Nemundo\Wiki\Script\WikiCleanScript;
use Nemundo\Process\Cms\Setup\CmsSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Process\Group\Setup\GroupSetup;
use Nemundo\Process\Template\Content\Image\ImageContentType;
use Nemundo\Process\Template\Content\Text\TextContentType;
use Nemundo\Project\Install\AbstractInstall;

class WikiInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WikiCollection());

        $setup = new ContentTypeSetup();
        $setup->addContentType(new WikiPageContentType());
        //$setup->addContentType(new LargeTextContentType());

        //(new ContentTypeSetup())
        //    ->addContentType(new TitleChangeContentType());


        /*
        $setup = new CmsSetup(new WikiPageContentType());
        $setup->addContentType(new YouTubeContentType());
        $setup
            ->addContentType(new TextContentType())
            ->addContentType(new ImageContentType());*/


        (new ScriptSetup())
            ->addScript(new WikiCleanScript());


        //$setup = new WikiSetup();
        //$setup->addContentType(new HtmlContentType());
        //$setup->addContentType(new EventAddContentType());


        /*$setup = new WikiSetup();
        $setup->addContentType(new LargeTextContentType());
        //$setup->addContentType(new EventContentType());
        $setup->addContentType(new TextContentType());


        $setup->addContentType(new FileContentType());
        $setup->addContentType(new YouTubeContentType());


        $setup->addContentType(new ImageContentType());
        $setup->addContentType(new VideoContentType());*/


        /*
        (new WikiSetup())
            ->addContentType(new BookmarkContentType())
           // ->addContentType(new FeedContentType())
            ->addContentType(new AudioContentType())
            ->addContentType(new TextContentType())
            ->addContentType(new ImageListContentType())
            ->addContentType(new FileListContentType())
            ->addContentType(new ImageListContentType());*/


        /*
        $setup->addContentType(new YoutubeContentType());
        $setup->addContentType(new WebImageContentType());
        $setup->addContentType(new NewsContentType());*/

        //(new GroupSetup())
        //    ->addGroupType(new WikiGroupType());

        //(new WikiEditorGroup())->saveType();


    }

}