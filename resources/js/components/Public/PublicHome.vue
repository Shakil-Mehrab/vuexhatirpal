 <template>
    <div id="publicview">
<NavLoad/>
<CategoryLoad/>

<!-- <div class="electronic-banner-area">
    <div class="module so-extraslider-ltr extra-layout4 cus2">
        <div class="form-group col-pre">
            <div class="m-head">Fashion & Jewelry<a href="#">View All</a></div>
        </div>
        <div class="modcontent">
            <div class="so-extraslider">
                <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                    data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                    data-margin="30" data-items_column0="6" data-items_column1="3"
                    data-items_column2="2" data-items_column3="2" data-items_column4="2"
                    data-lazyload="yes" data-loop="no" data-buttonpage="top">
                    <div class="item"  v-for="product in getFashionProduct" :key="product.id">
                        <div class="product-layout product-grid2 style1">
                            <div class="product-thumb transition product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container">
                                        <div class="image">

                                            <a href="#" target="_self" title="product">
                                                <img :src="`storage/${product.cover_img}`" alt="Ground round enim" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <div class="caption">
                                        <h4><router-link :to="`/single/product/${product.id}`" target="_self" title="Ground round enim">{{product.name}}</router-link></h4>
                                        <div class="rating">
                                            <star-rating :star-size="20" :rating="product.rating" :read-only='true'></star-rating>
                                        </div>
                                        <p class="price"> <span class="price-new">$ {{product.sale_price}}</span>
                                            <span class="price-old">$ {{product.price}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="slider-brands clearfix">
        <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no"
            data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0"
            data-items_column0="7" data-items_column1="6" data-items_column2="3" data-items_column3="2"
            data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes"
            data-hoverpause="yes" >
            <div class="item" v-for="product in getFashionProduct" :key="product.id" style="margin-right: 5px">
                <a href="#"><img :src="`storage/${product.cover_img}`" alt="brand"></a>
                <p>{{product.name}}</p>
            </div>
        </div>
    </div>
</div>

<div class="electronic-banner-area">
    <div class="custom-row-2">
        <div class="custom-col-style-2 electronic-banner-col-3 mb-30" v-for="discount in getDiscount" :key="discount.id">
            <div class="electronic-banner-wrapper">
                <img :src="`storage/${discount.image}`" style="height:200px" alt="">
                <div class="electro-banner-style electro-banner-position">
                    <h1>{{discount.name}} </h1>
                    <h2>up to {{discount.discount*100}}% off</h2>
                    <h4>Hatirpal Exclusive</h4>
                    <router-link :to="`discount/product/${discount.id}`" href="">Buy Now→</router-link>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="electronic-banner-area">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 extra-right">
        <div class="module so-extraslider-ltr ">
            <h3 class="modtitle"><span>Offered products</span></h3>
            <div class="modcontent">
                <div class="so-extraslider">
                    <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                        data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                        data-margin="30" data-items_column0="7" data-items_column1="5"
                        data-items_column2="4" data-items_column3="2" data-items_column4="2"
                        data-lazyload="yes" data-loop="no" data-buttonpage="top">
                        <div class="item" v-for="product in getDiscountAllProduct" :key="product.id">
                            <div class="product-layout product-grid2 style1">
                                <div class="product-thumb transition product-item-container">
                                    <div class="left-block">
                                        <div class="product-image-container">
                                            <div class="image">

                                                <a href="#" target="_self" title="product">
                                                    <img :src="`storage/${product.cover_img}`" alt="Ground round enim" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <div class="caption">
                                            <h4><router-link :to="`/single/product/${product.id}`" target="_self" title="Ground round enim">{{product.name}}</router-link></h4>
                                            <div class="rating">
                                                    <star-rating :star-size="20" :rating="product.rating" :read-only='true'></star-rating>
                                            </div>
                                            <p class="price"> <span class="price-new">$ {{product.sale_price}}</span>
                                                <span class="price-old">$ {{product.price}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br> -->
<div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
    <div class="container-fluid">
        <div class="section-title-4 text-center mb-40">
            <h2>Top Products</h2>
        </div>
        <div class="top-product-style">
            <div class="tab-content">
                <div class="tab-pane active show fade" id="electro1" role="tabpanel">
                    <div class="custom-row-2">
                        <div class="custom-col-style-2 custom-col-4" v-for="product in getBestProduct.data" :key="product.id">
                            <div class="product-wrapper product-border mb-24">
                                <div class="product-img-3">
                                    <router-link :to="`/single/product/${product.id}`">
                                    <img :src="`storage/${product.cover_img}`" alt="product">
                                    </router-link>
                                    <div class="product-action-right">
                                        <a class="animate-right" href="#" :data-target="`#exampleModal${product.id}`" data-toggle="modal" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                        <a href='' @click.prevent="addToCart(product.id)" class="animate-top" title="Add To Cart">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-left" title="Add To Compare" @click.prevent="addToCompare(product.id)" href="">
                                            <i class="pe-7s-repeat"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-4 text-center">
                                    <div class="product-rating-4">
                                       <star-rating :star-size="20" :rating="product.rating"></star-rating>
                                    </div>
                                    <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                    <!-- <span>{{product.description | replace}}</span> -->
                                    <h6>$ {{product.price}}</h6>
                                </div>
                            </div>

                                <div class="modal fade" :id="`exampleModal${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                    </button>
                                    <div class="modal-dialog modal-quickview-width" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="qwick-view-left">
                                                    <div class="quick-view-learg-img">
                                                        <div class="quick-view-tab-content tab-content">
                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                <img :src="`storage/${product.cover_img}`" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quick-view-list nav" role="tablist">
                                                        <!-- <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                                            <img :src="`storage/${product.cover_img}`" style="width:110px;height:110px"  alt="">
                                                        </a>
                                                        <a href="#modal2" data-toggle="tab" role="tab">
                                                            <img src="/assets/img/quick-view/s2.jpg" alt="">
                                                        </a> -->
                                                    </div>
                                                </div>
                                                <div class="qwick-view-right">
                                                    <div class="qwick-view-content">
                                                        <h3>{{product.name}}</h3>
                                                        <div class="price">
                                                            <span class="new">$ {{product.sale_price}}</span>
                                                            <span class="old">$ {{product.price}} </span>
                                                        </div>
                                                        <div class="rating-number">
                                                        <star-rating :star-size="20" :rating="product.rating" :read-only="true"></star-rating>
                                                        </div>
                                                        <p>{{product.description}}</p>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Attributes :</li>
                                                                <li v-for="attribute in product.product_attributes" :key="attribute.id">
                                                                    <a href="#">{{attribute.name}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Categories :</li>
                                                                <li v-for="category in product.product_categories" :key="category.id"><a href="#"> {{category.name}} </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="quickview-plus-minus">
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                            <div class="quickview-btn-cart">
                                                                <a class="btn-hover-black" @click.prevent="addToCart(product.id)" href="">add to cart</a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToCompare(product.id)" href=""><i class="pe-7s-repeat"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <pagination :data="getBestProduct" v-on:pagination-change-page="showBestProduct"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
    <div class="container-fluid">
        <div class="section-title-4 text-center mb-40">
            <h2>Recent Collection</h2>
        </div>
        <div class="top-product-style">
            <div class="tab-content">
                <div class="tab-pane active show fade" id="electro2" role="tabpanel">
                    <div class="custom-row-2">
                        <div class="custom-col-style-2 custom-col-4" v-for="product in getRecentProduct.data" :key="product.id">
                            <div class="product-wrapper product-border mb-24">
                                <div class="product-img-3">
                                    <router-link :to="`/single/product/${product.id}`">
                                    <img :src="`storage/${product.cover_img}`" alt="product">
                                    </router-link>
                                    <div class="product-action-right">
                                        <a class="animate-right" href="#" :data-target="`#exampleModal${product.id}`" data-toggle="modal" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                        <a href='' @click.prevent="addToCart(product.id)" class="animate-top" title="Add To Cart">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-left" title="Add To Compare" @click.prevent="addToCompare(product.id)" href="">
                                            <i class="pe-7s-repeat"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-4 text-center">
                                    <div class="product-rating-4">
                                       <star-rating :star-size="20" :rating="product.rating"></star-rating>
                                    </div>
                                    <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                    <!-- <span>{{product.description | replace}}</span> -->
                                    <h6>$ {{product.price}}</h6>
                                </div>
                            </div>

                                <div class="modal fade" :id="`exampleModal${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                    </button>
                                    <div class="modal-dialog modal-quickview-width" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="qwick-view-left">
                                                    <div class="quick-view-learg-img">
                                                        <div class="quick-view-tab-content tab-content">
                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                <img :src="`storage/${product.cover_img}`" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quick-view-list nav" role="tablist">
                                                        <!-- <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                                            <img :src="`storage/${product.cover_img}`" style="width:110px;height:110px"  alt="">
                                                        </a>
                                                        <a href="#modal2" data-toggle="tab" role="tab">
                                                            <img src="/assets/img/quick-view/s2.jpg" alt="">
                                                        </a> -->
                                                    </div>
                                                </div>
                                                <div class="qwick-view-right">
                                                    <div class="qwick-view-content">
                                                        <h3>{{product.name}}</h3>
                                                        <div class="price">
                                                            <span class="new">$ {{product.sale_price}}</span>
                                                            <span class="old">$ {{product.price}} </span>
                                                        </div>
                                                        <div class="rating-number">
                                                        <star-rating :star-size="20" :rating="product.rating" :read-only="true"></star-rating>
                                                        </div>
                                                        <p>{{product.description}}</p>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Attributes :</li>
                                                                <li v-for="attribute in product.product_attributes" :key="attribute.id">
                                                                    <a href="#">{{attribute.name}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Categories :</li>
                                                                <li v-for="category in product.product_categories" :key="category.id"><a href="#"> {{category.name}} </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="quickview-plus-minus">
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                            <div class="quickview-btn-cart">
                                                                <a class="btn-hover-black" @click.prevent="addToCart(product.id)" href="">add to cart</a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToCompare(product.id)" href=""><i class="pe-7s-repeat"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <pagination :data="getRecentProduct" v-on:pagination-change-page="showRecentProduct"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
    <div class="container-fluid">
        <div class="section-title-4 text-center mb-40">
            <h2>Popular Products</h2>
        </div>
        <div class="top-product-style">
            <div class="tab-content">
                <div class="tab-pane active show fade" id="electro3" role="tabpanel">
                    <div class="custom-row-2">
                        <div class="custom-col-style-2 custom-col-4" v-for="product in getPopularProduct.data" :key="product.id">
                            <div class="product-wrapper product-border mb-24">
                                <div class="product-img-3">
                                    <router-link :to="`/single/product/${product.id}`">
                                    <img :src="`storage/${product.cover_img}`" alt="product">
                                    </router-link>
                                    <div class="product-action-right">
                                        <a class="animate-right" href="#" :data-target="`#exampleModal${product.id}`" data-toggle="modal" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                        <a href='' @click.prevent="addToCart(product.id)" class="animate-top" title="Add To Cart">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-left" title="Add To Compare" @click.prevent="addToCompare(product.id)" href="">
                                            <i class="pe-7s-repeat"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-4 text-center">
                                    <div class="product-rating-4">
                                       <star-rating :star-size="20" :rating="product.rating"></star-rating>
                                    </div>
                                    <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                    <!-- <span>{{product.description | replace}}</span> -->
                                    <h6>$ {{product.price}}</h6>
                                </div>
                            </div>

                                <div class="modal fade" :id="`exampleModal${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                    </button>
                                    <div class="modal-dialog modal-quickview-width" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="qwick-view-left">
                                                    <div class="quick-view-learg-img">
                                                        <div class="quick-view-tab-content tab-content">
                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                <img :src="`storage/${product.cover_img}`" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quick-view-list nav" role="tablist">
                                                        <!-- <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                                            <img :src="`storage/${product.cover_img}`" style="width:110px;height:110px"  alt="">
                                                        </a>
                                                        <a href="#modal2" data-toggle="tab" role="tab">
                                                            <img src="/assets/img/quick-view/s2.jpg" alt="">
                                                        </a> -->
                                                    </div>
                                                </div>
                                                <div class="qwick-view-right">
                                                    <div class="qwick-view-content">
                                                        <h3>{{product.name}}</h3>
                                                        <div class="price">
                                                            <span class="new">$ {{product.sale_price}}</span>
                                                            <span class="old">$ {{product.price}} </span>
                                                        </div>
                                                        <div class="rating-number">
                                                        <star-rating :star-size="20" :rating="product.rating" :read-only="true"></star-rating>
                                                        </div>
                                                        <p>{{product.description}}</p>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Attributes :</li>
                                                                <li v-for="attribute in product.product_attributes" :key="attribute.id">
                                                                    <a href="#">{{attribute.name}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Categories :</li>
                                                                <li v-for="category in product.product_categories" :key="category.id"><a href="#"> {{category.name}} </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="quickview-plus-minus">
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                            <div class="quickview-btn-cart">
                                                                <a class="btn-hover-black" @click.prevent="addToCart(product.id)" href="">add to cart</a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToCompare(product.id)" href=""><i class="pe-7s-repeat"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <pagination :data="getPopularProduct" v-on:pagination-change-page="showPopularProduct"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area wrapper-padding pt-30 pb-95">
    <div class="container-fluid">
        <div class="electro-fexible-banner bg-img" style="background-image: url(assets/img/banner/19.jpg)">
            <div class="fexible-content">
                <h3>Play with flexible</h3>
                <p>Multicontrol Smooth Controller, Black Color All Buttons
                    <br>are somooth, Super Shine.</p>
                <a class="btn-hover flexible-btn" href="product-details.html">Buy Now</a>
            </div>
        </div>
    </div>
</div>
<div class="best-selling-area pb-95">
    <div class="section-title-4 text-center mb-60">
        <h2>Best Selling</h2>
    </div>
    <div class="best-selling-product">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <div class="best-selling-left">
                    <div class="product-wrapper">
                        <div class="product-img-4">
                            <a href="#"><img src="storage/default/bestsale.jpg" alt=""></a>
                            <div class="product-action-right">
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content-5 text-center">
                            <div class="product-rating-4">
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                                <i class="icofont icofont-star yellow"></i>
                            </div>
                            <h4><a href="product-details.html">desktop C27F551</a></h4>
                            <span>Headphone</span>
                            <h5>$133.00</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="best-selling-right">
                    <div class="custom-container">
                        <div class="coustom-row-3">
                            <div class="custom-col-style-3 custom-col-3" v-for="product in getBestSale.data" :key="product.id">
                                <div class="product-wrapper mb-6">
                                    <div class="product-img-4">
                                        <a href="#">
                                            <img :src="`storage/${product.cover_img}`" alt="">
                                        </a>
                                        <div class="product-action-right">
                                            <a class="animate-top" title="Add To Cart"  @click.prevent="addToCart(product.id)" href=""><i class="pe-7s-cart"></i></a>
                                            <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                            <a class="animate-left" title="Wishlist" @click.prevent="addToCompare(product.id)" href=""><i class="pe-7s-repeat"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content-6">
                                        <div class="product-rating-4">
                                            <star-rating :star-size="20" :rating="product.rating"></star-rating>
                                        </div>
                                        <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                        <h5>$ {{product.price}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 text-center">
                <pagination :data="getBestSale" v-on:pagination-change-page="showBestSale"></pagination>
            </div>
        </div>
    </div>
</div>
<div class="androit-banner-wrapper wrapper-padding pb-175">
    <div class="container-fluid">
        <div class="androit-banner-img bg-img" style="background-image: url(assets/img/banner/36.jpg)">
            <div class="androit-banner-content">
                <h3>Xolo Fast T2 Smartphone, Android <br>7.0 Unlocked.</h3>
                <a href="product-details.html">Buy Now →</a>
            </div>
            <div class="banner-price text-center">
                <div class="banner-price-position">
                    <span class="banner-price-new">$125.00</span>
                    <span class="banner-price-old">$199.00</span>
                </div>
            </div>
            <div class="phn-img">
                <img src="assets/img/banner/10.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="product-area-2 wrapper-padding pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xl-4" v-for="product in getAllTopRated.data" :key="product.id">
                <div class="product-wrapper product-wrapper-border mb-30">
                    <div class="product-img-5">
                        <a href="#">
                            <img :src="`storage/${product.cover_img}`" alt="">
                        </a>
                    </div>
                    <div class="product-content-7">
                        <h4><a href="#">{{product.name}}</a></h4>
                        <div class="product-rating-4">
                        <star-rating :star-size="20" :rating="product.rating"></star-rating>
                        </div>
                        <h6>$ {{product.price}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <pagination :data="getAllTopRated" v-on:pagination-change-page="showAllTopRated"></pagination>
            </div>
        </div>
    </div>
</div>
<div class="brand-logo-area-2 wrapper-padding ptb-80">
    <div class="container-fluid">
        <div class="brand-logo-active2 owl-carousel">
            <div class="single-brand">
                <img src="assets/img/brand-logo/7.png" alt="">
            </div>
            <div class="single-brand" >
                <img src="assets/img/brand-logo/8.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/9.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/10.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/11.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/12.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/13.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/7.png" alt="">
            </div>
            <div class="single-brand">
                <img src="assets/img/brand-logo/8.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- <div class="newsletter-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="section-title-5">
                    <h2>Newsletter</h2>
                    <p>Sign Up for get all update news & Get <span>15% off</span></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="newsletter-style-3">
                    <div id="mc_embed_signup" class="subscribe-form-3 pr-50">
                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" value="" name="EMAIL" class="email" placeholder="Enter Your E-mail" required>
                                <div class="mc-news" aria-hidden="true">
                                    <input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value="">
                                </div>
                                <div class="clear">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
    </div>
</template>

<script>
import NavLoad from "././includes/nav.vue"
import CategoryLoad from "././pages/category/category.vue"


export default {
    name: "PublicHome",
    components:{
      NavLoad,
      CategoryLoad
    },
    computed:{
        getBestProduct(){
        return this.$store.getters.getBestProduct
        },
        getFashionProduct(){
        return this.$store.getters.getFashionProduct
        },
        getRecentProduct(){
        return this.$store.getters.getRecentProduct
        },
        getPopularProduct(){
        return this.$store.getters.getPopularProduct
        },
        getBestSale(){
        return this.$store.getters.getBestSale
        },
        getAllTopRated(){
        return this.$store.getters.getAllTopRated
        },
        getDiscount(){
        return this.$store.getters.getDiscount
        },
        getDiscountAllProduct(){
        return this.$store.getters.getDiscountAllProduct
        },
    },
    methods:{
        showBestProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showBestProduct',page);
        },
        showFashionProduct(){
          this.$store.dispatch('showFashionProduct');
        },
        showDiscount(){
          this.$store.dispatch('showDiscount');
        },
        showDiscountAllProduct(){
          this.$store.dispatch('showDiscountAllProduct');
        },
        showRecentProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showRecentProduct',page);
        },
        showPopularProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showPopularProduct',page);
        },
        showAllTopRated(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showAllTopRated',page);
        },
        showBestSale(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showBestSale',page);
        },
        addToCart(id){
        console.log(id)
        axios.get('/user/cart/add/'+id)
        .then(()=>{
        this.$store.dispatch('showCartCount');
            Toast.fire({
            icon: 'success',
            title: 'Product Added to Cart!'
          })
      })
      .catch(()=>{})
      },
      addToWish(id){
        console.log(id)
        axios.get('/user/wish/add/'+id)
        .then(()=>{
        this.$store.dispatch('showAllWishProduct');
            Toast.fire({
            icon: 'success',
            title: 'Product Added to Wish!'
          })
      })
      .catch(()=>{})
      },
      addToCompare(id){
        console.log(id)
        axios.get('/user/compare/add/'+id)
        .then(()=>{
        this.$store.dispatch('showAllCompareProduct');
            Toast.fire({
            icon: 'success',
            title: 'Product Added to Compare!'
          })
      })
      .catch(()=>{})
      },
    },
    mounted(){
      this.showBestProduct();
      this.showFashionProduct();
      this.showRecentProduct();
      this.showPopularProduct();
      this.showBestSale();
      this.showAllTopRated();
      this.showDiscount();
      this.showDiscountAllProduct();

    },
};
</script>

<style scoped>
.custom-col-4 {
    max-width: 14%;
}
.custom-col-3 {
    max-width: 25%;
}
.col-xl-4 {
    max-width: 24.333333%;
}
 .cloned{
    width:165px;

}
.owl-item{
    width:165px;
}
.tab-content {
    border: none;
}
@media (max-width: 767px){
.custom-col-4 {
    max-width: 50%;
}
.custom-col-3 {
    max-width: 50%;
}
.col-xl-4 {
    max-width: 50%;
}
.extra-layout4.cus2 .col-pre {
    display: none;
}
}
</style>
