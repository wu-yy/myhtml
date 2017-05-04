<div class="search-top">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-home"></i>
    </a>
    <a class="right" href="#">
        <i class="fa fa-search"></i>
    </a>
    <form method="get" action="<?php echo $date->siteUrl; ?>">
        <input type="text" name="s" value="" />
    </form>
</div>
<div class="search-list">
    <a class="search-list-item active" href="#">618狂欢</a>
    <a class="search-list-item active" href="#">60英寸电视直降300</a>
    <a class="search-list-item active" href="#">一元抢米5</a>
    <a class="search-list-item" href="#">红米Note3直降100</a>
    <a class="search-list-item" href="#">小米5 现货</a>
    <a class="search-list-item" href="#">小米手环 2</a>
    <a class="search-list-item" href="#">红米3高配版 现货</a>
    <a class="search-list-item" href="#">小米Max</a>
</div>
<script>
    $('.search-list a').click(function(){
        var url = '/pro/search/'+$(this).text();
        window.location.href = url;
        return false;
    });
    $('a.right').click(function(){
        $('form').submit();
        return false;
    });
</script>