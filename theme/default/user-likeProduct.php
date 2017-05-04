<?php include maoo_temp('header'); ?>
    <div class="breadcrumb-box">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="<?php echo $date->siteUrl; ?>">
                        首页
                    </a>
                </li>
                <li>
                    <a href="<?php echo maoo_url($date,'user'); ?>">
                        用户中心
                    </a>
                </li>
                <li class="active">
                    喜欢的商品
                </li>
            </ol>
        </div>
    </div>
    <div class="user-center">
        <div class="container">
            <div class="row">
                <?php include maoo_temp('user-side'); ?>
                <div class="col-md-12 col-80 col">
                    <div class="user-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2 class="title">
                                    喜欢的商品
                                </h2>
                                <div class="user-like">
                                    <?php if($date->products->count>0) : ?>
                                    <div class="row">
                                        <?php foreach($date->products->result as $product) : ?>
                                        <div class="col-md-4 col">
                                            <div class="thumbnail text-center">
                                                <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                                                    <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/200/h/200" alt="<?php echo $product->title; ?>">
                                                </a>
                                                <div class="caption">
                                                    <h5>
                                                        <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>"><?php echo $product->title; ?></a>
                                                    </h5>
                                                    <div class="price">
                                                        <?php echo $product->minPrice/100; ?>元起
                                                    </div>
                                                    <div class="excerpt">
                                                        <?php echo $product->like; ?>人喜欢
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col">
                                                            <a class="btn btn-info btn-block" href="<?php echo $date->siteUrl; ?>/engine/action/unlikeProduct.php?id=<?php echo $product->id; ?>">删除</a>
                                                        </div>
                                                        <div class="col-md-6 col">
                                                            <a class="btn btn-default btn-block" href="<?php echo maoo_url($date,'product','single',$product->id); ?>">查看详情</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php else : ?>
                                    <div class="nolike">
                                        您暂未收藏任何商品。
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php echo maoo_pagenavi($date->products->count,$_GET['page'],$date->pageSizeProduct,$date->siteUrl); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>