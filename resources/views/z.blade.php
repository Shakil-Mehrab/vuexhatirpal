       <NavLoad/>
        <CategoryLoad/>
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
                <h2>{{getFeaturedProduct.length}}</h2>
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
                    <div class="single-brand" v-for="pr in getFeaturedProduct" :key="pr" style="margin-right:5px">
                        <img :src="`storage/${pr.cover_img}`" alt="">
                    </div>
                    
                </div>
            </div>
        </div>
        <carousel :items="5">
            <img src="https://placeimg.com/200/200/any?1">
            <img src="https://placeimg.com/200/200/any?2">
            <img src="https://placeimg.com/200/200/any?3">
            <img src="https://placeimg.com/200/200/any?4">
        </carousel>









        APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:ytLrDyIbZNs3wI6p5BzSbzMbsrE1LkP/ce0XwJo8sSU=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sagoreweb
DB_USERNAME=Shakil
DB_PASSWORD=01742214318

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=cookie
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=d25ce03bdc2f1f
MAIL_PASSWORD=e69bea51eb6a95
MAIL_ENCRYPTION=TLS
MAIL_FROM_ADDRESS=mehrabhoussainshakil12@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"




