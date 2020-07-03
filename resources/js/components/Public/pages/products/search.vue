<template>
<div id='productAll'>
<NavLoad/>
<div class="shop-page-wrapper shop-page-padding ptb-100" style="padding:15px 0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Search Products</h3>
                        <div class="sidebar-search">
                            <form >
                                <input @keyup="RealSearch" v-model="keyword" type="search" placeholder="Search">
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" >
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-categories">
                            <ul>
                                <li><a href="#">Accessories <span>4</span></a></li>
                                <li><a href="#">Book <span>9</span></a></li>
                                <li><a href="#">Clothing <span>5</span> </a></li>
                                <li><a href="#">Homelife <span>3</span></a></li>
                                <li><a href="#">Kids & Baby <span>4</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget sidebar-overflow mb-45">
                        <h3 class="sidebar-title">color</h3>
                        <div class="product-color">
                            <ul>
                                <li class="red">b</li>
                                <li class="pink">p</li>
                                <li class="blue">b</li>
                                <li class="sky">b</li>
                                <li class="green">y</li>
                                <li class="purple">g</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">size</h3>
                        <div class="product-size">
                            <ul>
                                <li><a href="#">xl</a></li>
                                <li><a href="#">m</a></li>
                                <li><a href="#">l</a></li>
                                <li><a href="#">ml</a></li>
                                <li><a href="#">lm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">tag</h3>
                        <div class="product-tags">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Bag</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Tie</a></li>
                                <li><a href="#">Women</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span></span> Product Found <span></span></p>
                                </div>
                                <div class="shop-selector">
                                    <label>Sort By : </label>
                                    <select name="select">
                                        <option value="">Default</option>
                                        <option value="">A to Z</option>
                                        <option value=""> Z to A</option>
                                        <option value="">In stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab" aria-selected="false">
                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                    <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                                        <i class="ti-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar1" class="tab-pane fade active show">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xl-3" v-for="product in getAllProduct.data" :key="product.id">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img :src="`storage/${product.cover_img}`" alt="">
                                                </a>
                                                <span>hot</span>
                                                <div class="product-action">
                                                    <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                    <a  @click.prevent="addToCart(product.id)" class="animate-top" title="Add To Cart" href="">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                    <a class="animate-right" title="Quick View" data-toggle="modal" :data-target="`#exampleModal1${product.id}`" href="#">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><router-link :to="`/single/product/${product.id}`">{{product.name}} </router-link></h4>
                                                <span>$ {{product.price}}</span>
                                            </div>
                                        </div>
                                        <div class="modal fade" :id="`exampleModal1${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
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
                            </div>
                            <div id="grid-sidebar2" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6" v-for="product in getAllProduct.data" :key="product.id">
                                        <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                            <div class="product-img list-img-width">
                                                <a href="#">
                                                    <img :src="`storage/${product.cover_img}`" alt="">
                                                </a>
                                                <span>hot</span>
                                                <div class="product-action-list-style">
                                                    <a class="animate-right" title="Quick View" data-toggle="modal" :data-target="`#exampleModal2${product.id}`" href="#">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-list">
                                                <div class="product-list-info">
                                                    <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                                    <span>$ {{product.price}}</span>
                                                    <p>{{product.description}}</p>
                                                </div>
                                                <div class="product-list-cart-wishlist">
                                                    <div class="product-list-cart">
                                                        <a  @click.prevent="addToCart(product.id)" class="btn-hover list-btn-style" href="">add to cart</a>
                                                    </div>
                                                    <div class="product-list-wishlist">
                                                        <a class="btn-hover list-btn-wishlist" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" :id="`exampleModal2${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-style mt-30 text-center">
                    <div class="col-md-12 text-center">
                        <pagination :data="getAllProduct" v-on:pagination-change-page="showAllProduct"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>
<script>
import NavLoad from "./../../includes/nav.vue"

export default {
    name: "Nav",
    components:{
      NavLoad,
    },
    data(){
      return{
        keyword:'',
      }
    },
    computed:{
        getAllProduct(){
        return this.$store.getters.getAllProduct
        },
    },
     methods:{
        // showAllNavSearchProduct(){
        // this.$store.dispatch('showAllNavSearchProduct')
        // },
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
    showAllProduct(page){
    if(typeof page==='undefined'){page=1;}
    this.$store.dispatch('showAllProduct',page);
    },
    RealSearch(){
        console.log(this.keyword)
        this.$store.dispatch('showSearchRealSearch',this.keyword)
    },
    },
    mounted(){
      this.showAllProduct();
    },
};
</script>
<style scoped>
@media (max-width: 767px){
.col-xl-3 {
    max-width: 50%;
}
}
</style>
