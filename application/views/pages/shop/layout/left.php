<div class="shop-sidebar">
    <div class="shop-widget">
        <h4 class="shop-sidebar-title">Search Products</h4>
        <div class="shop-search mt-25 mb-50">
            <form class="shop-search-form">
                <input type="text" placeholder="Find a product">
                <button type="submit">
                    <i class="icon-magnifier"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="shop-widget">
        <h4 class="shop-sidebar-title">Filter By Price</h4>
        <div class="price_filter mt-25">
            <div id="slider-range"></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <label>price : </label>
                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                </div>
                <button type="button">Filter</button>
            </div>
        </div>
    </div>
   
    <div class="shop-widget mt-50">
        <h4 class="shop-sidebar-title">All product</h4>
        <div class="shop-list-style mt-20">
        <?php if($species){ foreach ($species as $row){?>
            <ul>
                <li><a href="<?php echo base_url("shop/catalog/".$row->id)?>"><?php echo $row->name?> </a></li>

            </ul>
            <?php }}?>
        </div>
    </div>
   
</div>