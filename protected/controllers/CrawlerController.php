<?php

class CrawlerController extends AdminController {

    public function actionIndex() {
        /* $websites = Website::model()->findAllByAttributes(array('active' => 1));
          if ($websites) {
         * $visited=array();
          foreach ($websites as $site) {
          Crawl::model()->deleteAllByAttributes(array('website_id' => $site->id));
          $visited = Helper::CrawlUrl($site->url, 0, $site->id, $visited);
          }
          } */
        $websites = Website::model()->findAllByAttributes(array('active' => 1));
        $this->render('index', array('websites' => $websites));
    }

    public function actionTest() {
        if (!isset($_POST['websites']) || empty($_POST['websites'])) {
            $websites = Website::model()->findAllByAttributes(array('active' => 1));
        } else {
            $websites = Website::model()->findAll(array('condition' => 'id in(' . implode(',', $_POST['websites']) . ') and active=1'));
        }

        //depth
        $depth = 2;
        if (!isset($_POST['depth']) || empty($_POST['depth']))
            $depth = $_POST['depth'];

        if ($websites) {
            foreach ($websites as $site) {
                Crawl::model()->deleteAllByAttributes(array('website_id' => $site->id));
                $crawler = new MyCrawler();
                $crawler->setURL($site->url);
                $crawler->addContentTypeReceiveRule("#text/html#");
                $crawler->addURLFilterRule("#\.(jpg|gif|png|pdf|jpeg|css|js)$# i");
                //$crawler->setPageLimit(50); // Set the page-limit to 50 for testing
                // Important for resumable scripts/processes!
                $crawler->enableResumption();
                $crawler->obeyRobotsTxt(true);
                $crawler->setCrawlingDepthLimit($depth);

                // At the firts start of the script retreive the crawler-ID and store it
                // (in a temporary file in this example)
                if (!file_exists(Yii::app()->basePath . "/../media/" . $site->id . '.txt')) {
                    Crawl::model()->deleteAll(array('condition' => 'website_id=' . $site->id . ' and DATE_FORMAT(date_created,"%Y-%m-%d") < "' . date('Y-m-d', strtotime("-1 week")) . '"'));
                    $crawler_ID = $crawler->getCrawlerId();
                    file_put_contents(Yii::app()->basePath . "/../media/" . $site->id . '.txt', $crawler_ID);
                }
                // If the script was restarted again (after it was aborted), read the crawler-ID
                // and pass it to the resume() method.
                else {
                    $crawler_ID = file_get_contents(Yii::app()->basePath . "/../media/" . $site->id . '.txt');
                    $crawler->resume($crawler_ID);
                }

                $crawler->setUrlCacheType(PHPCrawlerUrlCacheTypes::URLCACHE_SQLITE);

                // Start crawling
                //$crawler->goMultiProcessed(5);
                $crawler->go();

                // Delete the stored crawler-ID after the process is finished completely and successfully.
                unlink(Yii::app()->basePath . "/../media/" . $site->id . '.txt');

                $report = $crawler->getProcessReport();

                echo "Summary:" . $lb;
                echo "Links followed: " . $report->links_followed . $lb;
                echo "Documents received: " . $report->files_received . $lb;
                echo "Bytes received: " . $report->bytes_received . " bytes" . $lb;
                echo "Process runtime: " . $report->process_runtime . " sec" . $lb;
            }
        }
    }

}
