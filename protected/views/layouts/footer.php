<!-- Start Footer-->
<footer class="row-fluid footer">
    <div class="container">
        <div class="span1"></div>
        <div class="span10">
            <div class="row-fluid">
                <div class="span12">
                    <!--<h3 class="text-center brawen"><span class="borderbottom">How To Use <?= Yii::app()->name; ?>?</span></h3>-->
                    <h3 class="text-center brawen"><span class="borderbottom">FxSearchDesk Is Your Tool To</span></h3>
                    <h4 class="text-center brawen">Enter Your Search Term And...</h4>
                </div>
            </div>
            <div class="row-fluid margintop20">
                <div class="span3 place footer-color animate-3">
                    <span class="brawen-circle"></span>
                    <h3 class="text-center">Easily</h3>
                    <hr class="footer-hr">
                    <h4 class="text-center">Become an expert on any forex subject!</h4>
                </div>

                <div class="span3 place footer-color animate-1">
                    <span class="brawen-circle"></span>
                    <h3 class="text-center">Conveniently</h3>
                    <hr class="footer-hr">
                    <h4 class="text-center">Track your topics of interest!</h4>
                </div>

                <div class="span3 place footer-color animate-1">
                    <span class="brawen-circle"></span>
                    <h3 class="text-center">Confidently</h3>
                    <hr class="footer-hr">
                    <h4 class="text-center">Be your own analyst!</h4>
                </div>

                <div class="span3 place footer-color animate-4">
                    <span class="brawen-circle"></span>
                    <h3 class="text-center">Quickly</h3>
                    <hr class="footer-hr">
                    <h4 class="text-center">Learn every angle of any currency, forex subject or forex topic!</h4>
                </div>

            </div>
        </div>
        <div class="span1"></div>         
    </div>
    <div class="row-fluid margintop20 foot-last no-min-height">
        <div class="span1 no-min-height"></div>
        <div class="span9 pos-right no-min-height">
            <a href="<?= Yii::app()->request->baseUrl ?>/articles" class="links">Fx Recent Articles</a>
            <?php
            $pages = Page::model()->findAllByAttributes(array('active' => 1));
            if ($pages) {
                foreach ($pages as $pg) {
                    ?>
                    <a href="<?= Yii::app()->request->baseUrl ?>/_<?= $pg->url ?>" class="links"><?= $pg->title ?></a>
                    <?php
                }
            }
            ?>
            <a href="<?= Yii::app()->request->baseUrl ?>/home/faq" class="links">FAQ</a>
            <a class="links" href="#contact" role="button" data-toggle="modal">Contact Us</a>
            <div class="modal modal-small hide fade text-left pull-left" id="contact">
                <div class="forgot-password">
                    <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/contact-us.png" class="login-img pull-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <?php
                    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id' => 'contact-us-form',
                        'enableAjaxValidation' => true,
                        'type' => 'horizontal',
                        'action' => Yii::app()->request->getBaseUrl(true) . '/home/contactUs',
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array(
                            'class' => 'no-margin clear'
                        )
                    ));
                    $model = new ContactUs;
                    ?>
                    <div class="input-group">
                        <i class="icon icon-building input-icon"></i>
                        <?php echo $form->textField($model, 'company_name', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Company / Organization Name')); ?>
                    </div>
                    <div class="input-group">
                        <i class="icon icon-user input-icon"></i>
                        <?php echo $form->textField($model, 'first_name', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'First Name')); ?>
                    </div>
                    <div class="input-group">
                        <i class="icon icon-user input-icon"></i>
                        <?php echo $form->textField($model, 'last_name', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Last Name')); ?>
                    </div>
                    <div class="input-group">
                        <i class="icon icon-bookmark input-icon"></i>
                        <?php echo $form->textField($model, 'title', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Title')); ?>
                    </div>
                    <div class="input-group">
                        <i class="icon icon-envelope input-icon paddingcus"></i>
                        <?php echo $form->textField($model, 'email', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Email Address')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                    <div class="input-group">
                        <i class="icon icon-cog input-icon"></i>
                        <?php echo $form->textField($model, 'subject', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Subject')); ?>
                        <?php echo $form->error($model, 'subject'); ?>
                    </div>
                    <div class="input-group">
                        <i class="icon icon-comment input-icon paddingcus"></i>
                        <?php echo $form->textArea($model, 'comment', array('class' => 'input-cus', 'maxlength' => 1024, 'placeholder' => 'Your Comment Here')); ?>
                        <?php echo $form->error($model, 'comment'); ?>
                    </div>

                    <button class="btn login-btn" type="submit">Send</button>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
        <div class="span2 pos-left no-min-height">
            <span class="pull-right white index-left">
                &copy; 2015 <?= Yii::app()->name ?>, LLC
            </span>
        </div>
    </div>
</footer>

</body>
<!-- InstanceEnd --></html>
