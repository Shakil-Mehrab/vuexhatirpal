<template>
<div id='singlePost'>
    <NavLoad/>
    <div class="product-details ptb-100 pb-90">
        <div class="container-fluid" style="padding:0% 10% 0% 10%">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-img-content">
                        <div class="product-details-tab mr-70">
                            <div class="product-details-large tab-content">
                                <div class="tab-pane active show fade" id="pro-details1" role="tabpanel">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a :href="`storage/${getSingleProduct.cover_img}`">
                                            <img :src="`storage/${getSingleProduct.cover_img}`" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" :id="`pro-details${product.id}`" role="tabpanel" v-for="product in getSameProduct" :key="product.id">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a :href="`storage/${product.cover_img}`">
                                            <img :src="`storage/${product.cover_img}`" alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="product-details-small nav mt-12" role=tablist>
                                <a class="active mr-12" href="#pro-details1" data-toggle="tab" role="tab" aria-selected="true">
                                    <img :src="`storage/${getSingleProduct.cover_img}`" style="width:142px;height:135px" alt="">
                                </a>

                                <a class="mr-12" :href="`#pro-details${product.id}`" data-toggle="tab" role="tab" aria-selected="true" v-for="product in getSameProduct" :key="product.id">
                                    <img :src="`storage/${product.cover_img}`" style="width:142px;height:135px" alt="" @click.prevent="change(product.id)">
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-content">
                        <h3>{{getSingleProduct.name}}</h3>
                        <div class="rating-number">
                           <star-rating :star-size="20" :rating="getSingleProduct.rating" :read-only="true"></star-rating>
                        </div>
                        <div class="details-price">
                            <span>$ {{getSingleProduct.price}}</span>
                        </div>
                        <p>{{getSingleProduct.description}}</p>
                        <!-- <div class="quick-view-select">
                            <div class="select-option-part">
                                <label>Size*</label>
                                <select class="select">
                                    <option value="">- Please Select -</option>
                                    <option value="">xl</option>
                                    <option value="">ml</option>
                                    <option value="">m</option>
                                    <option value="">sl</option>
                                </select>
                            </div>
                            <div class="select-option-part">
                                <label>Color*</label>
                                <select class="select">
                                    <option value="">- Please Select -</option>
                                    <option value="">orange</option>
                                    <option value="">pink</option>
                                    <option value="">yellow</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Attributes :</li>
                                <li v-for="attribute in getSingleProduct.product_attributes" :key="attribute.id">
                                    <a href="#">{{attribute.name}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <a @click.prevent="addToCart(getSingleProduct.id)" class="btn-hover-black" href="">add to cart</a>
                            </div>
                            <div class="quickview-btn-wishlist">
                                <a class="btn-hover"  @click.prevent="addToWish(getSingleProduct.id)" href=""><i class="pe-7s-like"></i></a>
                            </div>
                             <div class="quickview-btn-wishlist">
                                <a class="btn-hover" @click.prevent="addToCompare(getSingleProduct.id)"  href=""><i class="pe-7s-repeat"></i></a>
                            </div>
                        </div>
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                <li v-for="category in getSingleProduct.product_categories" :key="category.id"><a href="#"> {{category.name}} </a></li>
                            </ul>
                        </div>
                        <!-- <div class="product-details-cati-tag mtb-10">
                            <ul>
                                <li class="categories-title">Tags :</li>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">electronics</a></li>
                                <li><a href="#">toys</a></li>
                                <li><a href="#">food</a></li>
                                <li><a href="#">jewellery</a></li>
                            </ul>
                        </div> -->
                        <!-- <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-flikr"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area pb-90">
        <div class="container">
            <div class="product-description-review text-center">
                <div class="description-review-title nav" role=tablist>
                    <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Description
                    </a>
                    <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                        Reviews (0)
                    </a>
                </div>
                <div class="description-review-text tab-content">
                    <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                        <p>{{getSingleProduct.description}}</p>
                    </div>
                    <div class="tab-pane fade" id="pro-review" role="tabpanel">
                        <a href="#">Be the first to write your review!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-95">
        <div class="container">
            <div class="section-title-3 text-center mb-50">
                <h2>Related products</h2>
            </div>
            <div class="product-style">
                <div class="related-product-active owl-carousel">

                    <div class="product-wrapper" v-for="product in getRelatedProduct" :key="product.id">
                        <div class="product-img">
                            <a href="#" v-if="product.cover_img!=''">
                                <img :src="`storage/${product.cover_img}`" alt="" >
                            </a>
                            <span>hot</span>
                            <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="#">{{product.name}}</a></h4>
                            <span>${{product.price}}</span>
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
    name: "SinglePost",
    components:{
      NavLoad
    },
    computed:{
        getSingleProduct(){
        return this.$store.getters.getSingleProduct
        },
        getSameProduct(){
        return this.$store.getters.getSameProduct
        },
        getRelatedProduct(){
        return this.$store.getters.getRelatedProduct
        },
    },
     methods:{
        showBestProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showBestProduct',page);
        },
        showSingleProduct(){
          this.$store.dispatch('showSingleProduct',this.$route.params.id);
        },
        showSameProduct(){
          this.$store.dispatch('showSameProduct',this.$route.params.id);
        },
        showRelatedProduct(){
          this.$store.dispatch('showRelatedProduct',this.$route.params.id);
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
      change(id){
          console.log(id)
           this.$store.dispatch('showSingleProduct',id);
      }
    },
    mounted(){
      this.showSingleProduct();
      this.showSameProduct();
      this.showRelatedProduct();

    //   this.getPopularProduct();
    },
}
</script>
