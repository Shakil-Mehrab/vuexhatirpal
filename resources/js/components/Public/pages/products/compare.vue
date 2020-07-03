<template>
<div id="compareList">
    <NavLoad/>
    <div class="cart-main-area pt-95 pb-100 wishlist">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">wishlist</h1>
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>remove</th>
                                        <th>images</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Brand</th>
                                        <th>Buy Now</th>
                                        <th>View</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in getAllCompareProduct.data" :key="product.id">
                                        <td class="product-remove"><a href=""  @click.prevent="removeCompare(product.id)"><i class="pe-7s-close"></i></a></td>
                                        <td class="product-thumbnail"><a href="#"><img :src="`storage/${product.cover_img}`" alt="" style="width:100%;height:auto"></a></td>
                                        <td class="product-name"><router-link :to="`/single/product/${product.product_id}`">{{product.name}}</router-link></td>
                                        <td class="product-price-cart"><span class="amount">$ {{product.price}}</span></td>
                                        <td class="product-price-cart"><span class="amount">{{product.brand}}</span></td>
                                        <td class="product-remove"><a href="" @click.prevent="addToCart(product.product_id)"><i class="pe-7s-cart"></i></a></td>
                                        <td class="product-remove"><router-link :to="`/single/product/${product.product_id}`"><i class="pe-7s-look"></i></router-link></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
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
        getAllCompareProduct(){
        return this.$store.getters.getAllCompareProduct
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
    removeCompare(id){
        console.log(id)
        axios.get('/user/compare/remove/'+id)
        .then(()=>{
        this.$store.dispatch('showAllCompareProduct');
            Toast.fire({
            icon: 'success',
            title: 'Product Remove From Compare!'
          })
      })
      .catch(()=>{})
    },
    showAllCompareProduct(page){
    if(typeof page==='undefined'){page=1;}
    this.$store.dispatch('showAllCompareProduct',page);
    },
    },
    mounted(){
      this.showAllCompareProduct();
    },
};
</script>
