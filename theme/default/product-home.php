<?php include maoo_temp('header'); ?>
<div class="container">
    <?php if(count($date->indexRecommends)>0) : ?>
    <div id="carousel-home1-generic" class="carousel slide mb-30" data-ride="carousel">
        <?php if(count($date->indexRecommends)>1) : ?>
        <ol class="carousel-indicators">
            <?php $num=0; foreach($date->indexRecommends as $slider) : ?>
            <li data-target="#carousel-home1-generic" data-slide-to="<?php echo $num; ?>" class="<?php if($num==0) echo 'active'; ?>"></li>
            <?php $num++; endforeach; ?>
        </ol>
        <?php endif; ?>
        <div class="carousel-inner" role="listbox">
            <?php $num=0; foreach($date->indexRecommends as $slider) : ?>
            <a class="item <?php if($num==0) echo 'active'; ?>" href="<?php echo $slider->url; ?>" style="background-image:url(<?php echo $slider->img; ?>?imageView2/1/w/1226/h/360);">
                <div class="carousel-caption"><?php echo $slider->text; ?></div>
            </a>
            <?php $num++; endforeach; ?>
        </div>
        <?php if(count($date->indexRecommends)>1) : ?>
        <a class="left carousel-control" href="#carousel-home1-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left fa fa-angle-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#carousel-home1-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-left fa fa-angle-right" aria-hidden="true"></span>
        </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <!--div class="home-one mb-20">
        <div class="row">
            <?php $num = 0; foreach($date->postRecommend as $post) : $num++; ?>
            <div class="col-xs-4 col">
                <div class="media media-<?php echo $num; ?>">
                    <div class="media-left">
                        <a class="img-div" href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
                            <img class="media-object" src="<?php echo $post->cover; ?>?imageView2/1/w/200/h/150" alt="<?php echo $post->title; ?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="<?php echo maoo_url($date,'post','single',$post->id); ?>"><?php echo $post->title; ?></a>
                        </h4>
                        <div class="excerpt">
                            <?php if($post->excerpt) : echo $post->excerpt; else : echo maoo_cut_str(strip_tags($post->content),99); endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div-->
    <div class="home-two">
            <div id="carousel-home2-generic" class="carousel slide" data-ride="carousel">
                <h2 class="title pull-left">明星单品</h2>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a href="#carousel-home2-generic" role="button" data-slide="prev" class="btn btn-default">
                         <span class="fa fa-angle-left" aria-hidden="true"></span>
                    </a>
                    <a href="#carousel-home2-generic" role="button" data-slide="next" class="btn btn-default">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="clearfix"></div>
                <div class="carousel-inner" role="listbox">
                    <?php $num = 0; foreach($date->productRecommend2 as $products) : $num++; ?>
                    <div class="item <?php if($num==1) echo 'active'; ?>">
                        <div class="row">
                            <?php foreach($products as $product) : ?>
                            <div class="col-md-12 col-20 col">
                                <div class="thumbnail text-center pro-1">
                                    <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                                        <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/160/h/160" alt="<?php echo $product->title; ?>">
                                    </a>
                                    <div class="caption">
                                        <h5>
                                            <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>"><?php echo $product->title; ?></a>
                                        </h5>
                                        <div class="excerpt">
                                            <?php echo $product->excerpt; ?>
                                        </div>
                                        <div class="price">
                                            <?php echo $product->minPrice/100; ?>元起
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</div>
<div class="home-background">
        <div class="container">
            <?php foreach($date->homeproductTerms as $productTerm) : ?>
            <div class="home-main home-main-2">
                <h2 class="title pull-left"><?php echo $productTerm->title; ?></h2>
                <ul class="list-inline mb-0 pull-right">
                    <li><a href="<?php echo maoo_url($date,'product','term',$productTerm->id); ?>">全部</a></li>
                </ul>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-20 col">
                        <?php $num = 0; foreach($productTerm->ads as $ad) : $num++; ?>
                        <a class="img-div <?php if($num==2) echo 'bottom'; ?>" href="<?php echo $ad->url; ?>">
                            <img src="<?php echo $ad->img; ?>?imageView2/1/w/234/h/300">
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-12 col-80 col">
                        <div class="row">
                            <?php $num = 0; foreach($productTerm->products as $product) : $num++; ?>
                            <?php if($num!=count($productTerm->products)) : ?>
                            <div class="col-md-3 col">
                                <div class="thumbnail text-center pro-0">
                                    <?php if($product->saleText) : ?>
                                    <span class="sale sale<?php echo $product->saleColor; ?>"><?php echo $product->saleText; ?></span>
                                    <?php endif; ?>
                                    <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                                        <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/160/h/160" alt="<?php echo $product->title; ?>">
                                    </a>
                                    <div class="caption">
                                        <h5>
                                            <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>"><?php echo $product->title; ?></a>
                                        </h5>
                                        <div class="excerpt">
                                            <?php echo $product->excerpt; ?>
                                        </div>
                                        <div class="price">
                                            <?php echo $product->minPrice/100; ?>元起
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else : ?>
                            <div class="col-md-3 col">
                                <div class="thumbnail pro-small">
                                    <div class="pull-left">
                                        <h5>
                                            <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>"><?php echo $product->title; ?></a>
                                        </h5>
                                        <div class="price"><?php echo $product->minPrice/100; ?>元起</div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                                            <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/80/h/80">
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="thumbnail pro-more">
                                    <a href="<?php echo maoo_url($date,'product','term',$productTerm->id); ?>">
                                        <div class="pull-left">
                                            <h4>浏览更多</h4>
                                            <?php echo $productTerm->title; ?>
                                        </div>
                                        <div class="pull-right">
                                            <i class="fa fa-arrow-circle-o-right"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="home-two">
                <div id="carousel-home3-generic" class="carousel slide" data-ride="carousel">
                    <h2 class="title pull-left">为你推荐</h2>
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <a href="#carousel-home3-generic" role="button" data-slide="prev" class="btn btn-default">
                             <span class="fa fa-angle-left" aria-hidden="true"></span>
                        </a>
                        <a href="#carousel-home3-generic" role="button" data-slide="next" class="btn btn-default">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="carousel-inner" role="listbox">
                        <?php $num = 0; foreach($date->productRecommend3 as $products) : $num++; ?>
                        <div class="item <?php if($num==1) echo 'active'; ?>">
                            <div class="row">
                                <?php foreach($products as $product) : ?>
                                <div class="col-md-12 col-20 col">
                                    <div class="thumbnail text-center pro-1">
                                        <?php if($product->saleText) : ?>
                                        <span class="sale sale<?php echo $product->saleColor; ?>"><?php echo $product->saleText; ?></span>
                                        <?php endif; ?>
                                        <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                                            <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/160/h/160" alt="<?php echo $product->title; ?>">
                                        </a>
                                        <div class="caption">
                                            <h5>
                                                <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>"><?php echo $product->title; ?></a>
                                            </h5>
                                            <div class="price">
                                                <?php echo $product->minPrice/100; ?>元起
                                            </div>
                                            <div class="recommend">
                                                <?php echo $product->salesVolume; ?>人购买
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>