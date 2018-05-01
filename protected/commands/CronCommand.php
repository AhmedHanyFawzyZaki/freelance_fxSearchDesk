<?php

/* * *Cron job command on godaddy
 * php /home/fxsearchdesk/public_html/cron.php Cron
 * php -d register_argc_argv=on /home/fxsearchdesk/public_html/cron.php cron
 * /usr/bin/php -q /home/fxsear5/public_html/cron.php
 * ** */

class CronCommand extends CConsoleCommand {

    public function run($args) {
        // here we are doing what we need to do
        /* $users = User::model()->findAll();
          foreach ($users as $user) {
          $user->active = 0;
          $user->save(false);
          }
          die; */
        $websites = Website::model()->findAllByAttributes(array('active' => 1, 'crawled' => 0));
        $depth = 2;

        if ($websites) {
            foreach ($websites as $site) {
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
                    Crawl::model()->deleteAll(array('condition' => 'website_id=' . $site->id . ' and DATE_FORMAT(date_created,"%Y-%m-%d") < "' . date('Y-m-d', strtotime("-1 day")) . '"'));
                    $crawler_ID = $crawler->getCrawlerId();
                    file_put_contents(Yii::app()->basePath . "/../media/" . $site->id . '.txt', $crawler_ID);
                }
                // If the script was restarted again (after it was aborted), read the crawler-ID
                // and pass it to the resume() method.
                else {
                    $crawler_ID = file_get_contents(Yii::app()->basePath . "/../media/" . $site->id . '.txt');
                    $crawler->resume($crawler_ID);
                }
                $crawler->setWorkingDirectory(Yii::app()->basePath . "/../media/");
                $crawler->setUrlCacheType(PHPCrawlerUrlCacheTypes::URLCACHE_SQLITE);

                // Start crawling
                //$crawler->goMultiProcessed(5);
                $crawler->go();

                // Delete the stored crawler-ID after the process is finished completely and successfully.
                unlink(Yii::app()->basePath . "/../media/" . $site->id . '.txt');
                $site->crawled = 1;
                $site->save(false);

                /* $report = $crawler->getProcessReport();

                  echo "Summary:" . $lb;
                  echo "Links followed: " . $report->links_followed . $lb;
                  echo "Documents received: " . $report->files_received . $lb;
                  echo "Bytes received: " . $report->bytes_received . " bytes" . $lb;
                  echo "Process runtime: " . $report->process_runtime . " sec" . $lb; */
            }
        } else {
            $query = "DELETE FROM fx_crawl WHERE id NOT IN (select * from (SELECT id FROM fx_crawl GROUP BY fx_crawl.link) as t) or website_id is null";
            $command = Yii::app()->db->createCommand($query);
            $command->execute();
            Website::model()->updateAll(array('crawled' => 0), 'active=1 and crawled=1');
        }
    }

}

?>