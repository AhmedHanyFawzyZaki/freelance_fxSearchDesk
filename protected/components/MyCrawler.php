<?php

/**
 * The following code is a complete example of using phpcrawl with multi processes.
 *
 * The listed script "spiders" the documentation of the php-mysql-extension on php.net (http://php.net/manual/en/book.mysql.php)
 * including all it's subsections and links. By defining some rules is it assured that all other links leading to other sites 
 * and sections on php.net get ignored.
 *
 * This script has to be run from the commandline (php CLI, run "php multiprocessing_example.php"). 
 */
// Inculde the phpcrawl-mainclass
include("PHPCrawl/libs/PHPCrawler.class.php");

// Extend the class and override the handleDocumentInfo()-method
class MyCrawler extends PHPCrawler {

    function handleDocumentInfo($DocInfo) {

        if ($DocInfo && $DocInfo->received_completely) {
            Yii::import('ext.SimpleHTMLDOM.SimpleHTMLDOM');
            $simpleHTML = new SimpleHTMLDOM;
            $html = $simpleHTML->str_get_html($DocInfo->source);
            if (is_object($html)) {
                $t = $html->find("title", 0);
                if ($t) {
                    $title = $t->innertext;
                }
                $content=$html->plaintext;
                $meta_tags = $html->find('meta[name="keywords"]', 0)->content;
                $html->clear();
                unset($html);

                $model = new Crawl();
                $website = Website::model()->find(array('condition' => 'lower(url) like "%' . $DocInfo->host . '%"'));
                $model->website_id = $website ? $website->id : '';
                $model->link = $DocInfo->url;
                $model->page_title = $title;
                $model->meta_tags = $meta_tags;
                $model->meta_description = $DocInfo->meta_attributes['description'];
                $model->depth_level = $DocInfo->url_link_depth;
                //$model->content = $content;
                $model->save();
            }
        }
        //$DocInfo->meta_attributes['description'];
        //var_dump($DocInfo);
        //die;

        flush();
    }

}
