<?php include maoo_temp('header'); ?>
    <div class="pro-bottom">
        <div class="pro-buysuccess">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-7 col">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="img-div" href="<?php echo maoo_url($date,'product','single',$date->product->id); ?>">
                                            <img class="media-object" src="<?php echo $date->product->cover[0]; ?>?imageView2/1/w/110/h/110" alt="<?php echo $date->product->title; ?>">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <?php echo $date->product->title; ?>
                                        </h5>
                                        <h2>已成功加入购物车！</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col">
                                <div class="row row-btnbox">
                                    <div class="col-md-6 col">
                                        <a class="btn btn-info btn-block btn-lg" href="<?php echo maoo_url($date,'product'); ?>">
                                            继续购物
                                        </a>
                                    </div>
                                    <div class="col-md-6 col">
                                        <a class="btn btn-default btn-block btn-lg" href="<?php echo maoo_url($date,'product','cart'); ?>">
                                            去购物车结算
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>