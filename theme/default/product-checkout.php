<?php include maoo_temp('header'); ?>
<form method="post" class="pro-checkout" id="checkout-form-top" action="<?php echo $date->siteUrl; ?>/engine/action/checkout.php">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="address-list">
                        <h4 class="title">收货地址</h4>
                        <div class="row">
                            <?php foreach($date->addressList as $address) : ?>
                            <div class="col-md-3 col">
                                <div class="address-box">
                                    <dl>
                                        <dt class="name"><?php echo $address->name; ?></dt>
                                        <dd class="phone"><?php echo $address->phone; ?></dd>
                                        <dd><span class="province"><?php echo $address->province; ?></span> <span class="city"><?php echo $address->city; ?></span> <span class="area"><?php echo $address->area; ?></span></dd>
                                        <dd><span class="address"><?php echo $address->address; ?></span> (<span class="zipcode"><?php echo $address->zipcode; ?></span>)</dd>
                                    </dl>
                                    <div class="btns">
                                        <a href="<?php echo $date->siteUrl; ?>/engine/action/addressDelete.php?id=<?php echo $address->id; ?>">删除</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>        
                            <div class="col-md-3 col">
                                <div class="add" data-toggle="modal" data-target="#addModal">
                                                <i class="fa fa-plus-circle"></i>
                                                <div class="clearfix"></div>
                                                新增收货地址
                                            </div>
                            </div>
                        </div>
                        <script>
                            $('.address-box').click(function(){
                                $('.address-box').removeClass('active');
                                $(this).addClass('active');
                                var name = $('.name',this).text();
                                var phone = $('.phone',this).text();
                                var province = $('.province',this).text();
                                var city = $('.city',this).text();
                                var area = $('.area',this).text();
                                var address = $('.address',this).text();
                                var zipcode = $('.zipcode',this).text();
                                $('.address-show').html(name+' '+phone+'<div class="clearfix"></div>'+province+' '+city+' '+area+' '+address+' <a href="#checkout-form-top">修改</a>');
                                $('.address-input input[name=name]').val(name);
                                $('.address-input input[name=phone]').val(phone);
                                $('.address-input input[name=province]').val(province);
                                $('.address-input input[name=city]').val(city);
                                $('.address-input input[name=area]').val(area);
                                $('.address-input input[name=address]').val(address);
                                $('.address-input input[name=zipcode]').val(zipcode);
                            });
                        </script>
                    </div>
                    <div class="option-list">
                        <div class="option">
                            <div class="row">
                                <div class="col-md-2 col">
                                    <h3 class="title">支付方式</h3>
                                </div>
                                <div class="col-md-10 col">
                                    在线支付 （支持支付宝）
                                </div>
                            </div>
                        </div>
                        <div class="option">
                            <div class="row">
                                <div class="col-md-2 col">
                                    <h3 class="title">配送方式</h3>
                                </div>
                                <div class="col-md-10 col">
                                    快递配送（免运费）
                                </div>
                            </div>
                        </div>
                        <div class="option option-time">
                            <div class="row">
                                <div class="col-md-2 col">
                                    <h3 class="title">配送时间</h3>
                                </div>
                                <div class="col-md-10 col">
                                    <div class="row">
                                        <div class="col-md-3 col">
                                            <label class="active">
                                                <input type="radio" name="time" value="1">
                                                不限送货时间：周一至周日
                                            </label>
                                        </div>
                                        <div class="col-md-3 col">
                                            <label>
                                                <input type="radio" name="time" value="2">
                                                工作日送货：周一至周五
                                            </label>
                                        </div>
                                        <div class="col-md-3 col">
                                            <label>
                                                <input type="radio" name="time" value="3">
                                                双休日、假日送货：周六至周日
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('.option-time label').click(function(){
                                        $('.option-time label').removeClass('active');
                                        $(this).addClass('active');
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="option last option-invoice">
                            <div class="row">
                                <div class="col-md-2 col">
                                    <h3 class="title">发票</h3>
                                </div>
                                <div class="col-md-10 col">
                                    <div class="row">
                                        <div class="col-md-3 col">
                                            <label class="active">
                                                <input type="radio" name="invoice" value="1">
                                                无需发票
                                            </label>
                                        </div>
                                        <div class="col-md-3 col">
                                            <label>
                                                <input type="radio" name="invoice" value="2">
                                                电子发票（非纸质）
                                            </label>
                                        </div>
                                        <div class="col-md-3 col">
                                            <label>
                                                <input type="radio" name="invoice" value="3">
                                                普通发票（纸质）
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('.option-invoice label').click(function(){
                                        $('.option-invoice label').removeClass('active');
                                        $(this).addClass('active');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-pro-list">
                        <h4 class="title">
                            商品信息
                            <a class="pull-right" href="<?php echo maoo_url($date,'product','cart'); ?>">返回购物车 <i class="fa fa-angle-right"></i></a>
                        </h4>
                        <?php foreach($date->carts as $cart) : ?>
                        <div class="pro">
                            <div class="col col-img">
                                <img src="<?php echo $cart->product->cover[0]; ?>?imageView2/1/w/30/h/30" />
                            </div>
                            <div class="col col-name">
                                <a href="#">
                                    <?php echo $cart->product->title; ?>
                                    <?php foreach($cart->params as $param) : ?>
                                    <span><?php echo $param->name; ?></span>
                                    <?php endforeach; ?>
                                </a>
                            </div>
                            <div class="col col-price">
                                <?php echo $cart->price/100; ?>元 x <?php echo $cart->number; ?>
                            </div>
                            <div class="col col-stats">
                                有货
                            </div>
                            <div class="col col-total">
                                <?php echo $cart->price*$cart->number/100; ?>元
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="info">
                            <div class="row">
                                <div class="col-md-6 col">
                                </div>
                                <div class="col-md-6 col text-right">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <div class="left">商品件数：</div>
                                            <div class="right"><?php echo $date->count; ?>件</div>
                                        </li>
                                        <li>
                                            <div class="left">金额合计：</div>
                                            <div class="right"><span class="total-show"><?php echo $date->total/100; ?></span>元</div>
                                        </li>
                                        <li>
                                            <div class="left">礼品卡抵现：</div>
                                            <div class="right">-<span class="ecard-show">0</span>元</div>
                                        </li>
                                        <li>
                                            <div class="left">优惠券抵扣：</div>
                                            <div class="right">-<span class="coupon-show">0</span>元</div>
                                        </li>
                                        <li>
                                            <div class="left">运费：</div>
                                            <div class="right">0元</div>
                                        </li>
                                        <li class="total-price">
                                            <div class="left">应付总额：</div>
                                            <div class="right"><span><?php echo $date->total/100; ?></span>元</div>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="pull-left address-show"></div>
                    <button type="submit" class="pull-right btn btn-warning">去结算</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="address-input">
            <input type="hidden" name="name" value="">
            <input type="hidden" name="phone" value="">
            <input type="hidden" name="province" value="">
            <input type="hidden" name="city" value="">
            <input type="hidden" name="area" value="">
            <input type="hidden" name="address" value="">
            <input type="hidden" name="zipcode" value="">
            <input type="hidden" name="ecard" value="">
            <input type="hidden" name="coupon" value="">
        </div>
    </form>

                    <div class="user-body">
                        <div class="user-address">
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/address.php">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" placeholder="姓名 *必填">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input class="form-control" name="phone" placeholder="手机号 *必填">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 col">
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="province" tabindex="4" runat="server" onchange="selectprovince(this);" name="province" datatype="*" errormsg="必须选择您所在的地区"></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col">
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="city" tabindex="4" disabled="disabled" runat="server" name="city"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input class="form-control" name="area" placeholder="区县 *必填">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea rows="2" class="form-control" name="address" placeholder="详细地址 *必填"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input class="form-control" name="zipcode" placeholder="邮政编码">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="row">
                                                                    <div class="col-md-6 col">
                                                                        <button type="submit" class="btn btn-default btn-block">
                                                                            保存
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-md-6 col">
                                                                        <button type="button" class="btn btn-info btn-block" data-dismiss="modal">
                                                                            取消
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="redirect" value="checkout" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
</div>
<script>
    $('#addModal').on('shown.bs.modal', function (e) {
        $.getScript('<?php echo $date->siteUrl; ?>/public/js/address.js',function(){
            
        })
    })
</script>
<?php include maoo_temp('footer'); ?>