<html>
    <head>
        <script src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/jquery.js"></script>
        <style>
            body{
                margin: 0;
                background: url('<?= Yii::app()->request->getBaseUrl(true) ?>/img/bg.png') center top;
            }
            .input-pass{
                padding: 10px 20px;
                display: none;
                position:relative;
                left:25px;
                bottom:5px;
            }
            .input-i{
                background: #3C8656;
                padding: 5px 15px;
                border-radius: 50px;
                position: relative;
            }
            .main-div{
                background: url('<?= Yii::app()->request->getBaseUrl(true) ?>/img/soon.png') no-repeat center top;
                width:100%;
                height:100%;
            }
            .main-label{
                position: absolute;
                bottom:12%;
                width:100%;
                text-align: center;
                font-size: 30px;
                color:#fff;
                cursor: pointer;
            }

        </style>
    </head>
    <body>
        <div class="row-fluid">
            <div class="main-div">
                <label class="main-label">
                    <form method="post" action="?" id="form-id">
                        <input type="password" name="password" placeholder="Enter Your Password" class="input-pass" id="pass" required>
                        <i class="input-i" onclick="$('#pass').val()?$('#form-id').submit():$('.input-pass').show();">$</i>
                    </form>
                </label>
            </div>
        </div>
    </body>
</html>