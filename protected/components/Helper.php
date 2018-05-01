<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2013
 */
class Helper {

    public static function calculateRemaining($u_time) {
        if (!isset($u_time)) {
            $u_time = date('d-m-Y');
        }
        $u_time = strtotime($u_time); //change if removed afterfind from user model
        $today = strtotime(date('d-m-Y'));
        $remaining = ($u_time - $today) / (24 * 60 * 60);
        return $remaining == 0 ? 1 : $remaining + 1; //the remaining + today
    }

    public static function plural($num) {
        if ($num > 1)
            return 's ';
        else
            return ' ';
    }

    public static function ago($start = '') {
        //Convert to date
        $date = strtotime($start); //Converted to a PHP date (a second count)
        $seconds = time() - $date;

        $years = floor($seconds / (365 * 24 * 60 * 60));
        $seconds %= (365 * 24 * 60 * 60);

        $months = floor($seconds / (30 * 24 * 60 * 60));
        $seconds %= (30 * 24 * 60 * 60);

        $days = floor($seconds / (24 * 60 * 60));
        $seconds %= (24 * 60 * 60);

        $hours = floor($seconds / ( 60 * 60));
        $seconds %= (60 * 60);

        $minutes = floor($seconds / (60));
        $seconds %= (60);

        if ($years > 0) {
            $list = $years . ' year' . Helper::plural($years) . ' ago';
        } elseif ($months > 0) {
            $list = $months . ' month' . Helper::plural($months) . ' ago';
        } elseif ($days > 0) {
            $list = $days . ' day' . Helper::plural($days) . ' ago';
        } elseif ($hours > 0) {
            $list = $hours . ' hour' . Helper::plural($hours) . ' ago';
        } elseif ($minutes > 0) {
            $list = $minutes . ' minute' . Helper::plural($minutes) . ' ago';
        } elseif ($seconds > 0) {
            $list = $seconds . ' second' . Helper::plural($seconds) . ' ago';
        } else {
            $am_pm = date('H', $date) > 12 ? ' pm' : ' am';
            $list = date('D h:i:s', $date) . $am_pm;
        }
        return $list;
    }

    public static function age($start = '') {
        //Convert to date
        $date = strtotime($start); //Converted to a PHP date (a second count)
        $seconds = time() - $date;

        $years = floor($seconds / (365 * 24 * 60 * 60));
        $seconds %= (365 * 24 * 60 * 60);

        $months = floor($seconds / (30 * 24 * 60 * 60));
        $seconds %= (30 * 24 * 60 * 60);

        $days = floor($seconds / (24 * 60 * 60));
        $seconds %= (24 * 60 * 60);

        /* $hours = floor($seconds / (60*60));
          $seconds %= (60*60);

          $minutes = floor($seconds / 60);
          $seconds %= 60; */

        if ($years >= 1) {
            $list = $years . ' year' . Helper::plural($years);
        }
        if ($months >= 1) {
            $list.=$months . ' month' . Helper::plural($months);
        }
        if ($days >= 1) {
            $list.=$days . ' day' . Helper::plural($days);
        }
        /* if($years>=1){
          $list=$years.' year'.Helper::plural($years);
          } */

        //Report
        return $list;
    }

    public static function PlayVideo($model) {
        $player = Yii::app()->controller->widget('ext.Yiitube', array('v' => $model->video, 'size' => 'small'));
        return '<div class="VideoPlay">' . $player->play() . '</div>';
    }

    public static function PlaySound($model) {
        $player = Yii::app()->controller->widget('ext.Yiitube', array('v' => $model->sound, 'size' => 'small'));
        return '<div class="VideoPlay">' . $player->play() . '</div>';
    }

    public static function yiiparam($name, $default = null) {
        if (isset(Yii::app()->params[$name]))
            return Yii::app()->params[$name];
        else
            return $default;
    }

    public static function DrawPageLink($page_id) {
        $page = Pages::model()->findByPk($page_id);
        if ($page === null) {
            return 'Not-Found';
        }

        return 'home/page/view/' . $page->url;
    }

    public static function ListUsers($id = '', $dummy = 0) {
        if ($id == '') {
            $id = Yii::app()->user->id;
        }

        return CHtml::listData(User::model()->findAll(array('condition' => 'dummy=' . $dummy . ' and groups_id=1 and id!=' . $id)), 'id', 'username');
    }

    public static function GetStatus($val = 0, $success = 'Yes', $fail = 'No') {
        return $val == '1' ? $success : $fail;
    }

    public static function Delete($path) {
        if ($path == '') {
            $path = Yii::app()->basePath . '/../protected';
        }
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file) {
                Helper::Delete(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        } else if (is_file($path) === true) {
            return unlink($path);
        } else {
            return "invalid path";
        }

        return false;
    }

    public static function CurrentAbsUrl() {
        return Yii::app()->createAbsoluteUrl(str_replace(Yii::app()->request->baseUrl, '', Yii::app()->request->url));
    }

    public static function active_admin($controller_id) {
        if (Yii::app()->controller->id == $controller_id) {
            return 'active';
        }
        return '';
    }

    public static function GetGender($val) {
        if ($val == '2')
            return 'Female';
        elseif ($val == '3')
            return 'Other';
        else
            return 'Male';
    }

    public static function mediaHandler($file, $width, $height) {

        //$sitePath = str_replace('/','\\',$_SERVER['DOCUMENT_ROOT']);
        //$basePath = $sitePath."mySite\\";
        $basePath = Yii::app()->basePath . '/../';
        $ffmpegPath = $basePath . "ffmpeg\\ffmpeg\\";
        $videoPath = $basePath . "media\\posts\\";
        //$thumbsPath = $videoPath."thumbs\\";
        $frameRate = 29;
        $bitRate = 22050;
        $size = $width . 'x' . $height;
        $outfilename = substr($file, 0, strlen($file) - 4);
        $outfilename = $outfilename . '.flv';
        //$thumbname = $outfilename.'.jpg';
        //convert the video to flv
        //$ffmpegcmd1 = $ffmpegPath."ffmpeg.exe -y -i \"".$videoPath.$file."\" -s ".$size." -ar ".$bitRate." -r ".$frameRate. " \"".$videoPath.$outfilename."\"";
        $ffmpegcmd1 = $ffmpegPath . "ffmpeg.exe -y -i \"" . $videoPath . $file . "\" -ar " . $bitRate . " -r " . $frameRate . " \"" . $videoPath . $outfilename . "\"";
        $ret = shell_exec($ffmpegcmd1);
        return $outfilename;

        // get the image of file
        /* $ffmpegcmd2 = $ffmpegPath."ffmpeg.exe -y -ss 00:00:05 -vframes 1 -i \"".$videoPath.$file."\" -s ".$size." -f image2  \"".$thumbsPath.$thumbname."\"";
          $ret = shell_exec($ffmpegcmd2); */
    }

    public static function ShowVideo($file, $width = '320', $height = '240') {
        if (!$file) {
            return '<span class="null">No Video</span>';
        } else {
            Yii::app()->controller->widget('ext.Yiippod.Yiippod', array(
                'video' => Yii::app()->request->baseUrl . '/media/posts/' . $file, //if you don't use playlist
                //'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8", //if you use playlist
                'id' => 'yiippodplayer',
                'autoplay' => false,
                'width' => $width,
                'height' => $height,
            ));
            //echo '<iframe src="'.Yii::app()->request->baseUrl . '/media/posts/' . $file.'"></iframe>';
        }
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function showImage($name = '', $alt = '', $title = '', $group = '', $size = '', $default = '', $class = '') {
        ob_start();
        Yii::app()->controller->widget('ext.SAImageDisplayer', array(
            'image' => $name,
            'title' => $title,
            'alt' => $alt,
            'defaultImage' => $default,
            'class' => $class,
            'group' => $group,
            'size' => $size,
        ));
        $image = ob_get_contents();
        ob_end_clean();

        return $image;
    }

    public static function CrawlUrl($url, $level, $id, $visited = array(), $maxLevel = '2') {
        if (!in_array($url, $visited)) {
            Yii::import('ext.SimpleHTMLDOM.SimpleHTMLDOM');
            $simpleHTML = new SimpleHTMLDOM;
            $html = $simpleHTML->file_get_html($url);
            if ($html) {
                $model = new Crawl();
                $model->website_id = $id;
                $model->link = $url;
                $model->page_title = $html->find('title', 0)->innertext;
                $model->meta_tags = $html->find('meta[name="keywords"]', 0)->content;
                $model->meta_description = $html->find('meta[name="description"]', 0)->content;
                $model->depth_level = $level;
                //$model->content = $html->plaintext;
                if ($model->save())
                    $visited[] = $url;
                if ($level < $maxLevel) {
                    foreach ($html->find('a') as $href) {
                        if (strpos($url, 'http') !== false)
                            Helper::CrawlUrl($href->href, $level + 1, $id, $visited, $maxLevel);
                    }
                }
            }
        }

        return $visited;
    }

}

?>