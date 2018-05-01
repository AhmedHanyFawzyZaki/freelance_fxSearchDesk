<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HomeController extends FrontController {

    public function actionLanding() {
        /* if (isset($_POST['password']) && $_POST['password'] == 'FxSearchCharlie1!')
          $this->redirect('home/index'); */
        $this->layout = 'new';
        $this->render('landing-new');
    }

    public function actionIndex() {
        //$this->render('index');
        $this->layout = 'new';
        $this->render('landing-new');
    }

    /* public function actionSearch() {
      $model = GeneralSubject::model()->findAllByAttributes(array('active' => 1));
      if (isset($_POST['subject'])) {
      Yii::app()->user->setState('subject', $_POST['subject']);
      $this->redirect(array('chooseTopic'));
      }
      $this->render('general-subject', array('model' => $model));
      }

      public function actionChooseTopic() {
      if (isset($_POST['topic'])) {
      Yii::app()->user->setState('topic', $_POST['topic']);
      $this->redirect(array('chooseKeyword'));
      }

      if (Yii::app()->user->hasState('subject')) {
      $model = GeneralTopic::model()->findAllByAttributes(array('active' => 1, 'general_subject_id' => Yii::app()->user->getState('subject')));
      $this->render('general-topic', array('model' => $model));
      } else {
      $this->redirect(array('search'));
      }
      }

      public function actionChooseKeyword() {
      if (isset($_POST['keyword'])) {
      Yii::app()->user->setState('keyword', implode('*_*', $_POST['keyword']));
      $this->redirect(array('chooseCC'));
      }

      if (Yii::app()->user->hasState('topic')) {
      $model = FocalKeyword::model()->findAllByAttributes(array('active' => 1, 'general_topic_id' => Yii::app()->user->getState('topic')));
      $this->render('focal-keyword', array('model' => $model));
      } else {
      $this->redirect(array('chooseTopic'));
      }
      }

      public function actionChooseCC() {
      if (isset($_POST['currency'])) {
      Yii::app()->user->setState('currency', implode('*_*', $_POST['currency']));
      $this->redirect(array('searchResult'));
      }

      if (Yii::app()->user->hasState('topic')) {
      $model = CountryCurrency::model()->findAllByAttributes(array('active' => 1));
      $this->render('country-currency', array('model' => $model));
      } else {
      $this->redirect(array('chooseKeyword'));
      }
      } */

    public function actionSearch() {
        if (isset($_GET['keyword'])) {
            Yii::app()->user->setState('search_keyword', $_GET['keyword']);
            $word = Settings::model()->findByPk(1);
            $word->word_num8+=1;
            $word->save();
            $this->redirect(array('searchResult'));
            //$this->render('interstitial');
        } elseif (!isset($_GET['keyword'])) {
            $this->redirect(array('index'));
        }
    }

    public function actionSearchResult() {
        if (!Yii::app()->user->hasState('search_keyword') || Yii::app()->user->getState('search_keyword') == '') {
            $this->redirect(array('index'));
        }

        if (isset($_GET['q'])) {
            $word = AdsKeyword::model()->findByPk($_GET['q']);
            $word->counter+=1;
            $word->save();
        }

        $keyword = strtolower(Yii::app()->user->getState('search_keyword'));
        $websites = Crawl::model()->findAllBySql('select id, link, website_id, page_title, meta_description, 
            MATCH(link) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_link,
            MATCH(page_title) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_title,
            MATCH(meta_tags) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_tags,
            MATCH(meta_description) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_desc
            from fx_crawl
            where LOWER(link) like "%' . $keyword . '%" or LOWER(page_title) like "%' . $keyword . '%"
            or LOWER(meta_tags) like "%' . $keyword . '%" or LOWER(meta_description) like "%' . $keyword . '%"
            group by link 
            order by (match_link*5 + match_title*4 + match_tags*2+ match_desc*2) desc, id desc
            limit 2000');

        if (!$websites) {
            $websites = Crawl::model()->findAllBySql('select id, link, website_id, page_title, meta_description,
            MATCH(link) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_link,
            MATCH(page_title) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_title,
            MATCH(meta_tags) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_tags,
            MATCH(meta_description) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE) as match_desc
            from fx_crawl 
            where MATCH(link, page_title, meta_tags, meta_description) AGAINST(\'' . $keyword . '\' IN BOOLEAN MODE)
            group by link 
            order by (match_link*5 + match_title*4 + match_tags*2+ match_desc*2) desc, id desc
            limit 2000');
        }

        $arr = array();
        $tabs = SearchTab::model()->findAll();
        if ($tabs) {
            foreach ($tabs as $tb) {
                $arr[$tb->title] = array();
            }
        }
        if ($websites) {
            foreach ($websites as $site) {
                if ($site->website->included_categories) {
                    $cats = $site->website->included_categories; //array of search tabs
                    if ($cats) {
                        foreach ($cats as $cat) {
                            $tab_title = SearchTab::model()->findByPk($cat)->title;
                            $arr[$tab_title][$site->id]['link'] = $site->link;
                            $arr[$tab_title][$site->id]['page_title'] = $site->page_title;
                            $arr[$tab_title][$site->id]['meta_description'] = $site->meta_description;
                        }
                    }
                }
            }
        }
        unset($arr['Video']);
        /*         * ***************Youtube API******************** *
          unset($arr['Video']);
          $arr['Video']=array();
          require_once 'Google/autoload.php';
          require_once 'Google/Client.php';
          require_once 'Google/Service/YouTube.php';
          $DEVELOPER_KEY = 'AIzaSyCiGrzzjpfZaykefAAScyZBTR98CBz-BhU';
          $client = new Google_Client();
          $client->setDeveloperKey($DEVELOPER_KEY);
          $youtube = new Google_Service_YouTube($client);
          $searchResponse = $youtube->search->listSearch('id,snippet', array(
          'q' => $keyword,
          'maxResults' => 50,
          ));
          foreach ($searchResponse['items'] as $i=>$searchResult) {
          if ($searchResult['id']['kind'] == 'youtube#video') {
          $arr['Video'][$i]['link'] = 'http://www.youtube.com/watch?v='.$searchResult['id']['videoId'];
          $arr['Video'][$i]['page_title'] = $searchResult['snippet']['title'];
          $arr['Video'][$i]['meta_description'] = $searchResult['snippet']['title'];
          }
          }
          /*         * ********************************************** */

        //echo '<pre>'.print_r($arr).'</pre>';die;
        $folders = SearchFolder::model()->findAll(array('condition' => 'user_id="' . Yii::app()->user->id . '"', 'order' => 'id asc'));
        $feeds = RssFeed::model()->findAll(array('condition' => 'active=1', 'order' => 'id desc'));
        $this->render('search-result', array('arr' => $arr, 'folders' => $folders, 'feeds' => $feeds, 'keyword' => $keyword));
    }

    public function actionAddFolder() {
        if (!Yii::app()->user->isGuest) {
            $model = new SearchFolder;
            $model->title = $_REQUEST['name'];
            $model->user_id = Yii::app()->user->id;
            echo $model->save() ? $model->id : 0;
        } else {
            Yii::app()->user->setFlash('success', 'Please login.');
            echo 0;
        }
    }

    public function actionRemoveFolder() {
        if (!Yii::app()->user->isGuest) {
            if (SearchFolder::model()->deleteByPk($_REQUEST['id']))
                echo 1;
            else
                echo 0;
        } else {
            echo 0;
        }
    }

    public function actionSaveLink() {
        if (!Yii::app()->user->isGuest) {
            $model = new SavedLink();
            $model->link = $_REQUEST['link'];
            $model->title = $_REQUEST['name'];
            $model->folder_id = $_REQUEST['folder'];
            $model->user_id = Yii::app()->user->id;
            echo $model->save() ? $model->id : 0;
        } else {
            echo 0;
        }
    }

    public function actionRemoveLink() {
        if (!Yii::app()->user->isGuest) {
            if (SavedLink::model()->deleteByPk($_REQUEST['id']))
                echo 1;
            else
                echo 0;
        } else {
            echo 0;
        }
    }

    public function actionPage() {
        $model = Page::model()->findByAttributes(array('url' => $_REQUEST['slug'], 'active' => 1));
        $this->render('static-page', array('model' => $model));
    }

    public function actionFAQ() {
        $faqs = Faq::model()->findAllByAttributes(array('active' => 1));
        $this->render('faq', array('faqs' => $faqs));
    }

    public function actionContactUs() {
        $model = new ContactUs;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-us-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['ContactUs'])) {
            $model->attributes = $_POST['ContactUs'];
            if ($model->save())
                Yii::app()->user->setFlash('success', 'We have received your email and will contact you soon.');
            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }

    public function actionForgot() {
        if (isset($_POST['email'])) {
            $model = User::model()->findByAttributes(array('email' => $_POST['email']));
            if ($model) {
                $model->can_reset = 1; //can reset
                $code = time() . rand(0, 999999);
                $model->pass_token = $code;
                $model->save(false);

                $link = Yii::app()->request->getBaseUrl(true) . '/home/resetPassword?code=' . $code;
                $body = 'Thank you for using (' . Yii::app()->name . ').<br><br>
                        To reset your password please <a href="' . $link . '">click here</a> or 
                        just copy and paste the following link to your browser url:<br>
                        ' . $link . ' .';
                $mail = new YiiMailer();
                $mail->setFrom(Yii::app()->params['email'], Yii::app()->name . ' Admininstrator');
                $mail->setTo($model->email);
                $mail->setSubject(Yii::app()->name . ' - Reset Password');
                $mail->setBody($body);

                if ($mail->send())
                    Yii::app()->user->setFlash('success', 'Please follow the link sent to your email to change your password.');
                else
                    Yii::app()->user->setFlash('success', 'Something went wrong, Please try again later.');
            }else {
                Yii::app()->user->setFlash('success', 'Wrong Email.');
            }
            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }

    public function actionResetPassword() {
        $code = $_GET['code'];
        $user = User::model()->findByAttributes(array('pass_token' => $code, 'can_reset' => 1));
        if ($user) {
            if (isset($_POST['User'])) {
                $user->attributes = $_POST['User'];
                if ($user->password == $_POST['User']['password_repeat']) {
                    $user->can_reset = 0;
                    if ($user->save()) {
                        Yii::app()->user->setFlash("done_reset", 'Your password has been changed successfully.');
                        $this->redirect(array('index'));
                    }
                } else {
                    Yii::app()->user->setFlash("wrong_pass", 'Please make sure that you entered the same password in both fields.');
                }
            }
            $user->password = '';
            $this->render('reset', array('user' => $user));
        } else {
            Yii::app()->user->setFlash("success", 'You are following a wrong link.');
            $this->redirect(array('index'));
        }
    }

    public function actionLogin() {
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->login()) {
                if (Yii::app()->user->hasState('topic') && Yii::app()->user->hasState('subject')) {
                    $this->redirect(array('home/searchResult'));
                } elseif (Yii::app()->user->usertype == Yii::app()->params['Normal']) {
                    $this->redirect(Yii::app()->homeUrl);
                } else {
                    $this->redirect(array('dashboard/index'));
                }
            } else {
                Yii::app()->user->setFlash("success", 'Wrong username or password entered!');
                $this->redirect(array('home/index'));
            }
        }
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegister() {
        $model = new User('register');
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->user_type = Yii::app()->params['Normal'];
            $model->active = 0;
            if ($model->save()) {
                $link = Yii::app()->request->getBaseUrl(true) . '/home/activate?token=' . $model->url;
                $body = 'Thank you for joining (' . Yii::app()->name . ').<br><br>
                        To activate your account please <a href="' . $link . '">click here</a> or 
                        just copy and paste the following link to your browser url:<br>
                        ' . $link . ' .';
                $subject = Yii::app()->name . ' - Account Activation';
                //$mail = new YiiMailer();
                //$mail->setFrom(Yii::app()->params['email'], Yii::app()->name . ' Administrator');
                //$mail->setTo($model->email);
                //$mail->setSubject($subject);
                //$mail->setBody($body);
                //$mail->send();
                // To send HTML mail, the Content-type header must be set
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
                $headers .= 'To: ' . $model->username . ' <' . $model->email . '>' . "\r\n";
                $headers .= 'From: ' . Yii::app()->name . ' Administrator <' . Yii::app()->params['email'] . '>' . "\r\n";
                mail($model->email, $subject, $body, $headers);
                Yii::app()->user->setFlash('success', 'You have registered successfully, please check your email to activate your account.');
            }
            $this->redirect(Yii::app()->request->urlReferrer);
        }
    }

    public function actionActivate() {
        $model = User::model()->findByAttributes(array('url' => $_GET['token']));
        if ($model) {
            $period = Settings::model()->findByPk(1)->registration_period;
            $model->active = 1;
            //$model->date_of_renewal = date('Y-m-d', (time() + ($period * 24 * 60 * 60)));
            $model->date_of_renewal = date('Y-m-d', (time() + (100 * 365 * 24 * 60 * 60))); //100 years
            $model->url = $_GET['token'] . '--' . rand(0, 99999); //break the token so no one can use it again
            $model->save(false);
            $login = new LoginForm;
            $login->username = $model->email;
            $login->password = User::model()->simple_decrypt($model->password);
            if ($login->login()) {
                Yii::app()->user->setFlash('success', 'Done! your subscription period will end on ' . $model->date_of_renewal . '.');
            }
            //$this->redirect(array('home/renew?token=' . $model->url));
        } else {
            Yii::app()->user->setFlash('success', 'Sorry! You don\'t have access to this page.');
        }
        $this->redirect(array('home/index'));
    }

    public function actionRenew() {
        $model = User::model()->findByAttributes(array('url' => $_GET['token']));
        $price = Settings::model()->findByPk(1)->registration_period_price;
        if ($model) {
            $paymentInfo['Order']['theTotal'] = $price;
            $paymentInfo['Order']['description'] = Yii::app()->name . ' Subscription';
            $paymentInfo['Order']['quantity'] = '1';
            // call paypal
            $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo);
            if (!Yii::app()->Paypal->isCallSucceeded($result)) {
                if (Yii::app()->Paypal->apiLive === true) {
                    //Live mode basic error message
                    $error = 'We were unable to process your request. Please try again later';
                } else {
                    //Sandbox output the actual error message to dive in.
                    $error = $result['L_LONGMESSAGE0'];
                }
                echo $error;
                Yii::app()->end();
            } else {
                $token = urldecode($result["TOKEN"]);
                $model->paypal_token = $token;
                if ($model->save(false)) {
                    $payPalURL = Yii::app()->Paypal->paypalUrl . $token . '&user=' . $model->id;
                    $this->redirect($payPalURL);
                }
            }
        } else {
            Yii::app()->user->setFlash('success', 'Sorry! You don\'t have access to this page.');
            $this->redirect(array('home/index'));
        }
    }

    public function actionConfirm() {
        $token = trim($_GET['token']);
        $payerId = trim($_GET['PayerID']);
        $model = User::model()->findByAttributes(array('url' => $_GET['token']));
        $price = Settings::model()->findByPk(1)->registration_period_price;
        $paid_period = Settings::model()->findByPk(1)->registration_period_paid;
        if ($model) {
            $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
            $result['PAYERID'] = $payerId;
            $result['TOKEN'] = $token;
            $result['ORDERTOTAL'] = $price;
            //Detect errors
            if (!Yii::app()->Paypal->isCallSucceeded($result)) {
                if (Yii::app()->Paypal->apiLive === true) {
                    //Live mode basic error message
                    $error = 'We were unable to process your request. Please try again later';
                } else {
                    //Sandbox output the actual error message to dive in.
                    $error = $result['L_LONGMESSAGE0'];
                }
                echo $error;
                Yii::app()->end();
            } else {
                $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
                //Detect errors
                if (!Yii::app()->Paypal->isCallSucceeded($paymentResult)) {
                    if (Yii::app()->Paypal->apiLive === true) {
                        //Live mode basic error message
                        $error = 'We were unable to process your request. Please try again later';
                    } else {
                        //Sandbox output the actual error message to dive in.
                        $error = $paymentResult['L_LONGMESSAGE0'];
                    }
                    echo $error;
                    Yii::app()->end();
                } else {
                    //payment was completed successfully
                    $model->active = 1;
                    if ($model->date_of_renewal && strtotime($model->date_of_renewal) >= time())
                        $model->date_of_renewal = date('Y-m-d', (strtotime($model->date_of_renewal) + ($paid_period * 24 * 60 * 60)));
                    else
                        $model->date_of_renewal = date('Y-m-d', (time() + ($paid_period * 24 * 60 * 60)));

                    $model->save(false);
                    Yii::app()->user->setFlash('success', 'Done! your subscription period will end on ' . $model->date_of_renewal . '.');
                    $this->redirect(array('home/index'));
                }
            }
        }else {
            Yii::app()->user->setFlash('success', 'Sorry! Wrong Paypal Token sent.');
            $this->redirect(array('home/index'));
        }
    }

    public function actionCancel() {
        Yii::app()->user->setFlash('success', 'Failed! your payment has been cancelled.');
        $this->redirect(array('home/index'));
    }
    
    public function actionArticles() {
        $arts=  Article::model()->findAll(array('condition'=>'publish=1','order'=>'date_created desc'));
        $this->render('articles', array('arts'=>$arts));
    }
    public function actionViewArticle() {
        $art=  Article::model()->findByAttributes(array('slug'=>$_REQUEST['slug']));
        $this->render('article-view', array('art'=>$art));
    }

    /* public function actionCountUp() {
      $word = 'word_num' . $_REQUEST['num'];
      $settings = Settings::model()->findByPk(1);
      $settings->$word+=1;
      $settings->save();
      } */
}
