<script>
    var searchFoldersCount = <?= count($folders) ?>; //0,1
    function changeIcon(id) {
        if ($('#icon-' + id).hasClass('icon-plus')) {
            $('#icon-' + id).removeClass('icon-plus');
            $('#icon-' + id).addClass('icon-minus');
        } else {
            $('#icon-' + id).removeClass('icon-minus');
            $('#icon-' + id).addClass('icon-plus');
        }
    }
    function AddFolder() {
        var r = confirm("Do you want to create new search folder?");
        if (r) {
            var name = $('#appendedFolder').val();
            $('#appendedFolder').val('');
            searchFoldersCount++;
            $.ajax({
                url: '<?= Yii::app()->request->baseUrl ?>/home/addFolder?name=' + name,
                success: function (data) {
                    if (data != 0) {
                        $('#new-folder').prepend('<div class="accordion text-left" id="accordion-' + searchFoldersCount + '"><div class="accordion-group"><div class="accordion-heading"><div class="row-fluid padding5"><a class="accordion-toggle green span10" data-toggle="collapse" data-parent="#accordion-' + searchFoldersCount + '" href="#collapse-' + searchFoldersCount + '" onclick="changeIcon(' + searchFoldersCount + ')"><i class="icon icon-plus" id="icon-' + searchFoldersCount + '"></i> ' + name + '</a><label class="span2 xfolder" onclick="removeFolder(' + searchFoldersCount + ',' + data + ')">X</label></div></div><div id="collapse-' + searchFoldersCount + '" class="accordion-body collapse"><div class="accordion-inner folder-' + data + '"></div></div></div></div>');
                        $('#folder-value').append('<option value="' + data + '" id="op-' + data + '">' + name + '</option>');
                    }
                    else {
                        window.location = '<?= Yii::app()->request->getBaseUrl(true) ?>/home';
                    }
                }
            });
        }
    }
    function removeFolder(counter, id) {
        var r = confirm("Do you want to remove this search folder?");
        if (r) {
            $.ajax({
                url: '<?= Yii::app()->request->baseUrl ?>/home/removeFolder?id=' + id,
                success: function (data) {
                    if (data != 0) {
                        $('#op-' + id).remove();
                        $('#accordion-' + counter).remove();
                    } else {
                        alert('Sorry Can\'t remove this folder!');
                    }
                }
            });
        }
    }
    function removeLink(obj, id) {
        var r = confirm("Do you want to remove this link?");
        if (r) {
            $.ajax({
                url: '<?= Yii::app()->request->baseUrl ?>/home/removeLink?id=' + id,
                success: function (data) {
                    if (data != 0) {
                        $(obj).parent().remove();
                    } else {
                        alert('Sorry Can\'t remove this folder!');
                    }
                }
            });
        }
    }
    function saveLink() {
        var link = $('#link-value').val();
        var name = $('#link-name').val();
        var folder = $('#folder-value').val();
        var title = $('#link-value').val();
        ;
        if (name != '') {
            title = $('#link-name').val();
        }
        if (link && folder) {
            $.ajax({
                url: '<?= Yii::app()->request->baseUrl ?>/home/saveLink',
                data: {link: link, folder: folder, name: name},
                success: function (data) {
                    if (data != 0) {
                        $('.folder-' + folder).append('<a href="' + link + '" target="_Blank" class="green span10 word-break text-small">' + title + '</a><label class="span1 red-txt" onclick="removeLink(this, ' + data + ')">X</label>');
                        $('#close-dismiss').click();
                        $('#link-value').val('');
                        $('#link-name').val('');
                        $('#folder-value').val('');
                    }
                    else {
                        alert('Sorry Can\'t remove this folder!');
                    }
                }
            });
        } else {
            alert('Please select a folder or add a new one.');
        }
    }
</script>

<a class="green forgot hide" href="#link-folders" id="fake-modal" role="button" data-toggle="modal"></a>
<div class="modal modal-small hide fade" id="link-folders">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="close-dismiss" aria-hidden="true">&times;</button>
        <h3>Choose folder</h3>
    </div>
    <div class="form-horizontal no-margin">
        <div class="modal-body">
            <div class="control-group">
                <label class="text-left control-label">Folder:</label>
                <div class="controls">
                    <input type="hidden" value="" id="link-value">
                    <select id="folder-value" required="required">
                        <option value="">Select Search Folder</option>
                        <?php
                        if ($folders) {
                            foreach ($folders as $fl) {
                                ?>
                                <option value="<?= $fl->id ?>" id="op-<?= $fl->id ?>"><?= $fl->title ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="text-left control-label">Save as:</label>
                <div class="controls">
                    <input type="text" value="" placeholder="Name" id="link-name">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="saveLink()">Save</button>
        </div>
    </div>
</div>

<!--<a class="green forgot hide" href="#subs" id="fake-modal-2" role="button" data-toggle="modal"></a>-->
<div class="modal modal-small hide fade" id="subs">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Failed!</h3>
    </div>
    <div class="form-horizontal no-margin">
        <div class="modal-body">
            <h4 class="green-txt text-center">Please renew your subscription in order to be able to save your search results and links.</h4>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-success">Ok</button>
        </div>
    </div>
</div>

<!-- InstanceBeginEditable name="content" -->
<!-- Begin page content -->
<div class="row-fluid" id="all-div">
    <div class="containerfull minheight325">
        <div class="row-fluid">
            <a class="colored-text span2 offset9 text-right paddingright20" href="<?=Yii::app()->request->getBaseUrl(true)?>/home">Back to Home Page</a>
        </div>
        <div class="row-fluid">
            <div class="span12 content">
                <div class="row-fluid">
                    <div class="span12 text-center">
                        <h3 class="colored-text font24">The Trader's Gateway to the Entire Forex World</h3>
                        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/big-underline.png" class="margintopNeg20">
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span2 ads">
                        <div class="social-div">
                            <label class="text-center">
                                <span class="grey-bg social-header"><b>Share <?= Yii::app()->name ?> with your forex community!!!</b></span>
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_googleplus_large' displayText='Google +'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_sharethis_large' displayText='ShareThis'></span>
                                <script type="text/javascript">var switchTo5x = true;</script>
                                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                <script type="text/javascript">stLight.options({publisher: "6269aa7f-a4c0-4854-9b77-73e1f74d5a30", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                            </label>
                        </div>
                        <?php
                        if (!Yii::app()->user->isGuest) {
                            $user = User::model()->findByPk(Yii::app()->user->id);
                            $subscribed = strtotime($user->date_of_renewal) >= time() ? true : false;

                            if ($subscribed) {
                                ?>
                                <div class="social-div margintop30">
                                    <label class="grey-bg social-header"><b>SAVED SEARCH FOLDERS</b></label>
                                    <div class="padding5">
                                        <?php
                                        if ($folders) {
                                            foreach ($folders as $i => $fold) {
                                                $links = SavedLink::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id, 'folder_id' => $fold->id));
                                                ?>
                                                <div class="accordion" id="accordion-<?= $i ?>">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading">
                                                            <div class="row-fluid">
                                                                <a class="accordion-toggle green span10" data-toggle="collapse" data-parent="#accordion-<?= $i ?>" href="#collapse-<?= $i ?>" onclick="changeIcon(<?= $i ?>)">
                                                                    <i class="icon icon-plus" id="icon-<?= $i ?>"></i> <?= $fold->title ?>
                                                                </a>
                                                                <label class="span2 xfolder" onclick="removeFolder(<?= $i ?>,<?= $fold->id ?>)">X</label>
                                                            </div>
                                                        </div>
                                                        <div id="collapse-<?= $i ?>" class="accordion-body collapse">
                                                            <div class="accordion-inner folder-<?= $fold->id ?>">
                                                                <?php
                                                                if ($links) {
                                                                    foreach ($links as $link) {
                                                                        ?>
                                                                        <div class="row-fluid">
                                                                            <a href="<?= $link->link ?>" target="_Blank" class="green span10 word-break text-small"><?= $link->title ? $link->title : $link->link ?></a><label class="span1 red-txt" onclick="removeLink(this, <?= $link->id ?>)">X</label>
                                                                        </div>
                                                                        <br>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <label class="text-center" id="new-folder" onclick="$('#folderInput').toggle();"><i class="icon icon-plus-sign"></i>Add new folder</label>
                                        <div class="input-append" id="folderInput" style="display: none;">
                                            <input class="span8" id="appendedFolder" placeholder="Folder Name" type="text">
                                            <button class="btn" type="button" onclick="AddFolder()">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        echo '<div class="margintop30 social-div no-border">';
                        $rightAds = Advertise::model()->findAll(array('order' => 'rand()', 'condition' => 'active=1 and type=0', 'limit' => 2));
                        if ($rightAds) {
                            foreach ($rightAds as $ra) {
                                echo $ra->code . '<br><br>';
                            }
                        } else {
                            ?>
                            <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/vads.png" class="width100per">
                            <?php
                        }
                        echo '</div>';
                        ?>
                    </div>
                    <div class="span7 color_div no-padding">
                        <div class="no_margin login_sys pull-right text-center minheight300">
                            <!--<div class="row-fluid">
                                <div class="span12">
                                    <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/index" class="main-btn"><span>RUN ANOTHER SEARCH</span></a>
                                </div>
                            <?php //$this->renderPartial('//layouts/right-box')  ?>
                            </div>-->
                            <div class="row-fluid">
                                <div class="span12 current-search">
                                    <!--<h4 class="span10 text-left margintop20">CURRENT SEARCH &nbsp;&nbsp;<i class="icon icon-arrow-right"></i><b class="search-word"> &nbsp;&nbsp;<?= $keyword ?></b></h4>-->
                                    <h4 class="span10 text-left"><span class="pull-left margintop10">CURRENT SEARCH &nbsp;&nbsp;<i class="icon icon-arrow-right"></i></span>
                                        <form action="<?= Yii::app()->request->getBaseUrl(true) ?>/home/search" class="pull-left marginleft20 marginbottom0" method="get">
                                            <input type="text" value="<?= $keyword ?>" placeholder="Enter Your Forex Search Terms Here" name="keyword" required="">
                                            <button type="submit" class="search-submit-inner"><i class="icon icon-search"></i></button>
                                        </form>
                                    </h4>
                                    <div class="span2 save-search margintop10">
                                        <!--<a class="search-label brown" href="<?= Yii::app()->request->baseUrl ?>/home/index">Modify Search</a>-->
                                        <?php
                                        echo Yii::app()->user->isGuest ? '<a class="search-label brown" href="javascript:void(0)" onclick="$(\'#login-div\').show();$(\'#LoginForm_username\').focus();">Save Search</a>' : ($subscribed ? '<a class="search-label brown" data-toggle="modal" role="button" href="#link-folders" onclick="$(\'#link-value\').val(\'' . Yii::app()->request->getBaseUrl(true) . '/home/search?keyword=' . $keyword . '\');"> Save Search</a> ' : '<a class="search-label brown" data-toggle="modal" role="button" href="#subs">Save Search</a>');
                                        ?>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <h3>
                                        <b class="underline colored-text">Results Below</b> 
                                        <!--<select class="result-select">
                                            <option>Arrange By Date</option>
                                            <option>Relevance</option>
                                            <option>Most Hits</option>
                                        </select>-->
                                    </h3>
                                    <p>Forex Offers, Articles, Blog Postings, Forum Postings</p><br>
                                </div>
                                <div class="padding10 results-div">
                                    <div>
                                        <div class="row-fluid">
                                            <h4 class="font17 text-left marginleft20 dark-grey"><b class="colored-text">Forex Offers</b></h4>
                                            <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/custom-underline.png" class="margintopNeg20 width100per">
                                        </div>
                                        <div class="row-fluid">
                                            <div class="text-left marginleft20">
                                                <?php
                                                if (isset($_GET['q']))
                                                    $advs = Advertise::model()->findAll(array('condition' => 'type=1 and active=1 and ads_keyword=' . $_GET['q'], 'order' => 'rand()', 'limit' => 3));
                                                if (!$advs)
                                                    $advs = Advertise::model()->findAll(array('condition' => 'type=1 and active=1', 'order' => 'rand()', 'limit' => 3));
                                                if ($advs) {
                                                    foreach ($advs as $ad) {
                                                        echo '<div class="row-fluid margintop30">' . $ad->code . '</div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($arr) {
                                        foreach ($arr as $title => $val) {
                                            $title_class = trim(str_replace(' ', '-', strtolower($title)));
                                            ?>
                                            <div class="row-fluid margintop20">
                                                <div class="span12">
                                                    <h4 class="marginleft20 font17 dark-grey text-left"><b class="colored-text">Forex <?= $title ?></b></h4>
                                                    <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/custom-underline.png" class="margintopNeg20 width100per">
                                                </div>
                                                <div class="text-left type-block">
                                                    <div class="marginleft20">
                                                        <?php
                                                        if (count($val) > 0) {
                                                            $c = 1;
                                                            foreach ($val as $id => $link) {
                                                                $link['link'] = strip_tags($link['link']);
                                                                $link['meta_description'] = strip_tags($link['meta_description']);
                                                                $link['page_title'] = strip_tags($link['page_title']);
                                                                $cl = $c > 3 ? 'hide hidden-' . $title_class : '';
                                                                //$newlink=file_get_contents('http://api.adf.ly/api.php?key=3d167aea4da0bd38f8309c669a45a682&uid=11162701&advert_type=int&domain=adf.ly&url=' . urlencode($link['link']));
                                                                //$link['link']='http://adf.ly/11162701/'.$link['link'];
                                                                //$save_link = Yii::app()->user->isGuest ? '<a class="pull-right green-txt" data-toggle="modal" role="button" href="#register">Save Link</a>' : ($subscribed ? '<label class="pull-right green-txt" onclick="$(\'#fake-modal\').click(); $(\'#link-value\').val(\'' . $link['link'] . '\')"> Save Link</label> ' : '<a class="pull-right green-txt" data-toggle="modal" role="button" href="#subs">Save Link</a>');
                                                                $save_link = Yii::app()->user->isGuest ? '<a class="pull-right green-txt" href="javascript:void(0)" onclick="$(\'#login-div\').show();$(\'#LoginForm_username\').focus();">Save Link</a>' : ($subscribed ? '<a class="pull-right green-txt" data-toggle="modal" role="button" href="#link-folders" onclick="$(\'#link-value\').val(\'' . $link['link'] . '\')"> Save Link</a> ' : '<a class="pull-right green-txt" data-toggle="modal" role="button" href="#subs">Save Link</a>');
                                                                ?>
                                                                <div class="<?= $cl ?> row-fluid margintop30">
                                                                    <div class="span10">
                                                                        <a href="<?= $link['link'] ?>" target="_blank" title="<?= $link['page_title'] ?>"><?= $c ?>. 
                                                                            <?= strlen($link['page_title']) > 85 ? substr($link['page_title'], 0, 85) . '...' : $link['page_title'] ?>
                                                                        </a>
                                                                        <p class="small-text green-txt no-margin"><?= $link['link'] ?></p>
                                                                        <p class="small-text semi-black no-margin">
                                                                            <?= ucfirst($link['meta_description']); ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="span2">
                                                                        <?= $save_link ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $c++;
                                                            }
                                                        } else {
                                                            echo '<div class="row-fluid margintop30">No Results Found.</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if (count($val) > 3) {
                                                ?>
                                                <div class="row-fluid clear">
                                                    <div class="pull-right">
                                                        <button class="btn new-brown" onclick="$('.hidden-<?= $title_class ?>').toggle();
                                                                if ($(this).html() == 'Show More')
                                                                    $(this).html('Show Less');
                                                                else
                                                                    $(this).html('Show More');">Show More</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span3 ads">
                        <div class="social-div span12" style="margin-top: 0px !important;">
                            <label class="social-header grey-bg padding10"><b>Current Fx Prices</b></label>
                            <div class="row-fluid" style="overflow-x: auto;overflow-y: hidden;">
                                <?php
                                if ($feeds) {
                                    foreach ($feeds as $feed) {
                                        ?>
                                        <div class="span12 dash-border">
                                            <?= $feed->content ?>
                                                    <!--<span class="pull-right small-text"><?= date('M D, Y H:i', strtotime($feed->date_created)) ?></span>-->
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="offset1 span10" style="margin-top: 40px;">
                            <?php
                            $leftAds = Advertise::model()->findAll(array('order' => 'rand()', 'condition' => 'active=1 and type=0', 'limit' => 2));
                            if ($leftAds) {
                                foreach ($leftAds as $la) {
                                    echo $la->code . '<br><br>';
                                }
                            } else {
                                ?>
                                <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/vads.png" class="width100per">
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div><!--End Content-->
        </div>
    </div>
</div>
<!-- End page content --> 
<!-- InstanceEndEditable -->