<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a>
            </li>
            <li>
                <a href="<?php echo maoo_url($date,'activity'); ?>">最新动态</a>
            </li>
            <li class="active">发布动态</li>
        </ol>
    </div>
</div>
<div class="activity-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-20 col">
                <?php include maoo_temp('activity-left-side'); ?>
            </div>
            <div class="col-md-12 col-60 col">
                <div class="activity-publish">
                    <form id="activity-publish-form" method="post" action="<?php echo $date->siteUrl; ?>/engine/action/publish.php">
                        <div class="form-list-item">
                            <label class="title">动态类型</label>
                            <div class="form-list-body type-list">
                                <label class="radio-inline active" excerpt-data="普通类型的动态，是最简单的动态类型，只能发布文字及图片。">
                                    <input type="radio" name="type" value="1" checked> 
                                    普通
                                </label>
                                <label class="radio-inline" excerpt-data="发起一个问题，并设置奖励积分，给出最佳答案的用户，将获得这些积分。">
                                    <input type="radio" name="type" value="2"> 
                                    提问
                                </label>
                                <!--label class="radio-inline" excerpt-data="在动态中出售商品，费用将存入您的账户余额，可随时提现。">
                                    <input type="radio" name="type" value="3"> 
                                    商品
                                </label>
                                <label class="radio-inline" excerpt-data="发起一个活动，其他用户可以在活动期限内报名参与。">
                                    <input type="radio" name="type" value="4"> 
                                    活动
                                </label>
                                <label class="radio-inline" excerpt-data="发布一个任务，并支付押金。其他用户在完成任务内容后，可提交完成情况，并获得现金奖励。">
                                    <input type="radio" name="type" value="5"> 
                                    任务
                                </label-->
                                <label class="radio-inline" excerpt-data="发起竞猜，竞猜正确的用户可以获得奖励积分，您将获得竞猜错误的用户的所有积分。">
                                    <input type="radio" name="type" value="6"> 
                                    竞猜
                                </label>
                                <label class="radio-inline" excerpt-data="隐藏主要内容，只有支付给您一定积分，才可以阅读。">
                                    <input type="radio" name="type" value="7"> 
                                    有偿阅读
                                </label>
                                <div class="clearfix"></div>
                                <div class="type-excerpt">普通类型的动态，是最简单的动态类型，只能发布文字及图片。</div>
                            </div>
                        </div>
                        <div class="form-list-item">
                            <label class="title">标题</label>
                            <div class="form-list-body">
                                <input type="text" class="form-control" name="title" placeholder="一句话概括您要发布的内容" />
                            </div>
                        </div>
                        <div class="tpye-form-list" id="tpye-form-list-2">
                            <div class="form-list-item">
                                <label class="title">奖励积分</label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type2_coins" placeholder="请填写大于或等于0的整数" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help-block">您当前共有积分：<?php echo $date->user->coins; ?>，奖励的积分不能超过此数值。</p>
                                    <p class="help-block">积分将从您现有积分中扣除，如果7天内有任何用户回答，则必须从中选择出一个最佳答案并将这些积分奖励给该用户。如果在7天内，没有任何用户回答，则会返还积分到您的账户。</p>
                                </div>
                            </div>
                        </div>
                        <div class="tpye-form-list" id="tpye-form-list-3">
                            <div class="form-list-item">
                                <label class="title">商品价格 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type3_price" placeholder="请填写大于或等于0的数值，单位：元。" onkeyup="value=value.replace(/[^\0-9\.]/g,'')" onpaste="value=value.replace(/[^\0-9\.]/g,'')" oncontextmenu = "value=value.replace(/[^\0-9\.]/g,'')" />
                                    </div>
                                    <p class="help-block">价格以人民币“元”为单位。如有运费或其他影响总价的因素，请自行酌情考虑定价。</p>
                                    <p class="help-block">费用在买家确认收货后，或者未确认收货30天时，自动存入您的账户余额。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">商品总数</label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type3_number" placeholder="请填写大于或等于0的数值" onkeyup="value=value.replace(/[^\0-9\.]/g,'')" onpaste="value=value.replace(/[^\0-9\.]/g,'')" oncontextmenu = "value=value.replace(/[^\0-9\.]/g,'')" />
                                    </div>
                                    <p class="help-block">商品销售超过此数量后，将自动关闭。0为数量不限。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">承诺发货时间 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type3_day" placeholder="请填写1-30之间的整数，单位：天" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help-block">设置后，必须在此时间范围内发货。如果发货超时，则费用会自动退还。</p>
                                    <p>承诺发货时间以“天”为单位，必须为1-30之间（含）的整数。</p>
                                </div>
                            </div>
                        </div>
                        <div class="tpye-form-list" id="tpye-form-list-4">
                            <div class="form-list-item">
                                <label class="title">活动最高人数</label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type4_number" placeholder="请填写大于或等于0的整数" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help-block">达到设置数量的人数后，活动自动停止报名。0为人数不限。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">活动最低人数</label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type4_number2" placeholder="请填写大于或等于0的整数" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help-block">截止日期前，达到最低活动人数要求活动才会判断成功。最低人数要求不得大于最高人数。0为人数不限。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">报名费用</label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type4_price" placeholder="请填写大于或等于0的整数，单位：元" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help-block">0为不需要报名费用，所有报名费用，将在活动成功后，自动存入您的账户余额。</p>
                                    <p class="help-block">费用单位：人民币“元”。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">接受报名天数 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type4_day" placeholder="请填写1-90之间的整数" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help-block">从发布活动起计算，超过接受报名天数活动自动关闭。若未达到最低人数要求，则判定活动失败，报名费用自动退还。</p>
                                </div>
                            </div>
                        </div>
                        <div class="tpye-form-list" id="tpye-form-list-5">
                            <div class="form-list-item">
                                <label class="title">每个任务完成奖励金额 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type5_price" id="type5-price" placeholder="请填写大于0的整数，单位：元" />
                                    </div>
                                    <p class="help-block">您可亲自对任务进行审核，本站任务核查人员会进行复审，每个完成任务的用户都将获得以上金额的现金奖励。</p>
                                    <p class="help-block">请在正文中详细说明任务完成条件，这将是审核的直接唯一标准。</p>
                                    <p class="help-block">奖励金额单位：人民币“元”。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">目标任务完成数量 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type5_number" id="type5-number" placeholder="请填写大于0的整数" />
                                    </div>
                                    <p class="help-block">目标任务数量完成后，任务将自动结束。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">需支付押金数额</label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" disabled id="type5-total" value="0" />
                                    </div>
                                    <p class="help-block">押金数额为“<span class="text-danger">完成任务奖励金额</span>”x“<span class="text-danger">目标任务完成数量</span>”的总额+<span class="text-danger">10%服务费</span>。不论任务是否完成，服务费都不会退还，请谨慎操作。</p>
                                    <p class="help-block">单位：人民币“元”。</p>
                                </div>
                            </div>
                            <script>
                                $('#type5-price').blur(function(){
                                    var price = $(this).val()*1;
                                    console.log(price);
                                    if(price>0) {
                                        price = Math.floor(price);
                                        $('#type5-price').val(price);
                                        var number = $('#type5-number').val().replace(/[^0-9]/g,'')*1;
                                        if(number>0) {
                                            $('#type5-number').val(number);
                                            var total = price*number*1.1;
                                            $('#type5-total').val(total.toFixed(2));
                                        } else {
                                            $('#type5-number').val(0);
                                            $('#type5-total').val(0);
                                        };
                                    } else {
                                        $(this).val(0);
                                        $('#type5-total').val(0);
                                    };
                                });
                                $('#type5-number').blur(function(){
                                    var number = $(this).val().replace(/[^0-9]/g,'')*1;
                                    $(this).val(number);
                                    if(number>0) {
                                        var price = $('#type5-price').val()*1;
                                        if(price>0) {
                                            price = Math.floor(price);
                                            $('#type5-price').val(price);
                                            var total = price*number*1.1;
                                            $('#type5-total').val(total.toFixed(2));
                                        } else {
                                            $('#type5-price').val(0);
                                            $('#type5-total').val(0);
                                        };
                                    } else {
                                        $(this).val(0);
                                        $('#type5-total').val(0);
                                    };
                                });
                            </script>
                        </div>
                        <div class="tpye-form-list" id="tpye-form-list-6">
                            <div class="form-list-item">
                                <label class="title">
                                    <div class="row">
                                        <div class="col-xs-6 col">
                                            竞猜获胜条件
                                        </div>
                                        <div class="col-xs-6 col">
                                            赔率
                                        </div>
                                    </div>
                                </label>
                                <div class="form-list-body">
                                    <div class="row">
                                        <?php for($i=0; $i<5; $i++) { ?>
                                        <div class="col-xs-6 col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="type6_if[<?php echo $i; ?>]" placeholder="例：中国队胜利" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">1 赔</span>
                                                    <input type="text" class="form-control" name="type6_odds[<?php echo $i; ?>]" placeholder="请填写大于0的数值" onkeyup="value=value.replace(/[^\0-9\.]/g,'')" onpaste="value=value.replace(/[^\0-9\.]/g,'')" oncontextmenu = "value=value.replace(/[^\0-9\.]/g,'')" />
                                                </div>
                                            </div>
                                        </div>
                                        <?php }; ?>
                                    </div>
                                    <p class="help-block">最多设置5个不同的竞猜获胜条件，可设置不同赔率。最终只能有<span class="text-danger">一个</span>条件获胜。</p>
                                    <p class="help-block">您当前共有积分：<?php echo $date->user->coins; ?>，积分总额<span class="text-danger">大于10000</span>时，才可发起竞猜。如果用户参与的竞猜项目赔付积分超过您的现有积分，则不能参与竞猜。</p>
                                    <p class="help-block">例如：您发起关于“中韩足球比赛”的竞猜，您共有积分10000，设置竞猜中国队获胜赔率为1赔100。如果有1个用户竞猜了中国队获胜，并投注50积分，则会冻结您50x100=5000积分。此时您剩余5000积分，另外一个用户也竞猜了中国队获胜，并投注60积分，应该冻结您60x100=6000积分，但您只有5000积分，则该用户无法参与竞猜。</p>
                                    <p class="help-block">竞猜最长持续30天。结束后，冻结的积分会根据赔率转入竞猜获胜的用户积分账户中。对于竞猜失败的用户，冻结积分将会返还给您的积分账户，并且您还会获得该用户投注的积分。</p>
                                </div>
                            </div>
                        </div>
                        <div class="tpye-form-list" id="tpye-form-list-7">
                            <div class="form-list-item">
                                <label class="title">需支付积分数值 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type7_coins" placeholder="请填写大于0的整数" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" />
                                    </div>
                                    <p class="help">任何用户支付的积分，都将自动存入您的账户余额。</p>
                                    <p class="help">请发布有价值的内容，如果被投诉成功，确认后将扣除您的积分，情况严重时您可能失去您的账户。</p>
                                </div>
                            </div>
                            <div class="form-list-item">
                                <label class="title">简介 <span class="text-danger">*</span></label>
                                <div class="form-list-body">
                                    <div class="form-group">
                                        <textarea rows="3" class="form-control mb-20" name="type7_excerpt" placeholder="简单介绍您发布的内容"></textarea>
                                    </div>
                                    <p class="help-block">详细内容及图片都将被隐藏，一段好的简介可以让更多用户愿意支付积分阅读您发布的内容。</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-list-item">
                            <label class="title">详细内容 <span class="text-danger">*</span></label>
                            <div class="form-list-body">
                                <textarea rows="5" class="form-control mb-20" name="content" id="activity-publish-form-content" placeholder="请在这里写下您要发布的内容"></textarea>
                                <div class="activity-put-bottom">
                                    <div class="left">
                                        <div id="activity-cover-box"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="right">
                                        <button type="button" class="btn btn-default" id="quickPublish-submit">
                                            <i class="fa fa-edit"></i> 确认提交
                                        </button>
                                        <div class="activity-upload">
                                            <input type="file" onchange="readFile(this)" />
                                            <button type="button" class="btn btn-info btn-block">
                                                <i class="fa fa-file-image-o"></i> 添加图片
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-20 col">
                <?php include maoo_temp('activity-right-side'); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('#quickPublish-submit').click(function(){
        var content = $('#activity-publish-form-content').val();
        if(content!='') {
            $('#activity-publish-form').submit();
        };
    });
    $('.type-list label').click(function(){
        $('.type-list label').removeClass('active');
        $(this).addClass('active');
        var excerpt = $(this).attr('excerpt-data');
        $('.type-excerpt').text(excerpt);
        var type = $('input',this).val();
        $('.tpye-form-list').css('display','none');
        if(type!=1) {
            $('#tpye-form-list-'+type).css('display','block');
        };
    });
    function readFile(obj){
                                                    var file = obj.files[0]; 
                                                    if(!/image\/\w+/.test(file.type)){
                                                        alert("请确保文件为图像类型");
                                                        return false;
                                                    };
                                                    data = new FormData();
                                                    data.append("image", file);
                                                    $.ajax({
                                                        data: data,
                                                        type: "POST",
                                                        dataType : "json",
                                                        url: "<?php echo $date->siteUrl; ?>/engine/action/quickPublishImage.php",
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(json) {
                                                            if(json.code==200) {
                                                                $('#activity-cover-box').append('<div class="cover-img"><div class="img-div" style="background-image:url('+json.url+');"></div><input type="hidden" name="cover" value="'+json.url+'"><div class="close"><i class="fa fa-times-circle"></i></div></div>');
                                                                return;
                                                            } else {
                                                                alert(json.text);
                                                            };
                                                        },
                                                        error : function(data) {
                                                            alert('上传失败');
                                                        }
                                                    });
                                                };
                                                $('#activity-cover-box .cover-img .close').click(function(){
                                                    $(this).parent('.cover-img').remove();
                                                });
</script>
<?php include maoo_temp('footer'); ?>