<template>
<div id='wishList'>
    <NavLoad/>
    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-product-wrapper res-xl">
                        <div class="shop-bar-area">
                            <div class="shop-product-content tab-content">
                                <div id="grid-sidebar5" class="tab-pane fade active show">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6" v-for="product in getAllWishProduct.data" :key="product.id">
                                            <div class="product-wrapper mb-30">
                                                <div class="product-img">
                                                    <a href="#">
                                                        <img :src="`storage/${product.cover_img}`" alt="">
                                                    </a>
                                                    <span>hot</span>
                                                    <div class="product-action">
                                                        <a @click.prevent="removeWish(product.id)" class="animate-top" title="Remove Wish" href="">
                                                            <i class="pe-7s-close"></i>
                                                        </a>
                                                        <a @click.prevent="addToCart(product.product_id)" class="animate-top" title="Add To Cart" href="">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                        <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h4><router-link :to="`/single/product/${product.product_id}`">{{product.name}} </router-link></h4>
                                                    <span>$ {{product.price}}</span>
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
</template>
<script>
import NavLoad from "./../../includes/nav.vue"

export default {
    name: "Nav",
    components:{
      NavLoad,
    },
    computed:{
        getAllWishProduct(){
        return this.$store.getters.getAllWishProduct
        },
    },
     methods:{
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
    removeWish(id){
        console.log(id)
        axios.get('/user/wish/remove/'+id)
        .then(()=>{
        this.$store.dispatch('showAllWishProduct');
            Toast.fire({
            icon: 'success',
            title: 'Product Remove From Wish!'
          })
      })
      .catch(()=>{})
    },
    showAllWishProduct(page){
    if(typeof page==='undefined'){page=1;}
    this.$store.dispatch('showAllWishProduct',page);
    },
    },
    mounted(){
      this.showAllWishProduct();
    },
};
</script>
