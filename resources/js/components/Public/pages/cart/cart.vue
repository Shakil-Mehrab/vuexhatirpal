<template>
<div id='cartLoad'>
    <NavLoad/>
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Cart</h1>
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>remove</th>
                                        <th>images</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <!-- <th>Total</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <cart-item
                                        v-for="data in getCartContent" 
                                        :cart="data" :key="data.id" 
                                        @removeItem="remove" 
                                        @updateItem="updateQty" 
                                    />

                                    

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <form  role="form" @submit.prevent="applyCoupon()">
                                        <input class="input-text" v-model="form.coupon_code" placeholder="Coupon code" type="text" required>
                                        <input class="button" value="Apply coupon" type="submit">
                                        </form>
                                    </div>
                                    <!-- <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal<span>{{getCartSubTotal}}</span></li>
                                        <li>Total<span>{{getCartTotal}}</span></li>
                                    </ul>
                                    <router-link to='cart/checkout' href="#">Proceed to checkout</router-link>
                                </div>
                            </div>
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
import CartItem from "./CartItem.vue"
export default {
    name: "PublicHome",
    components:{
      NavLoad,
      'cart-item': CartItem
    },
    data () {
    return {
        form: new Form({
        coupon_code: '',
        quantity:'',
        })
    }
    },
    computed:{
        getCartContent(){
        return this.$store.getters.getCartContent
        },
        getCartSubTotal(){
        return this.$store.getters.getCartSubTotal
        },
        getCartTotal(){
        return this.$store.getters.getCartTotal
        },
        getPopularProduct(){
        return this.$store.getters.getPopularProduct
        }
    },
    methods:{
        showCartContent(){
        this.$store.dispatch('showCartContent');
        },
        showCartTotal(){
        this.$store.dispatch('showCartTotal');
        },
        showCartSubtotal(){
        this.$store.dispatch('showCartSubtotal');
        },
        updateQty(id, qty){
            console.log(this.form.quantity)
             this.form.post('/user/cart/update/'+id+'?qty='+qty)
                .then(()=>{
                    // this.$store.dispatch("showAdminCategory")
                    this.$store.dispatch('showCartContent');
                    Toast.fire({
                    icon: 'success',
                    title: 'cart updated!'
                })
            })
            .catch(()=>{})
        },
        remove(id){
            console.log(id)
             axios.get('/user/cart/remove/'+id)
                .then(()=>{
                this.$store.dispatch('showCartContent');
                this.$store.dispatch('showCartTotal');
                this.$store.dispatch('showCartSubtotal');
                this.$store.dispatch('showCartCount');
                    Toast.fire({
                    icon: 'success',
                    title: 'cart removed!'
                })
            })
            .catch(()=>{})
        },
        applyCoupon(){
            console.log(this.form.coupon_code)
            this.form.post('/user/apply-coupon/cart')
            .then((response)=>{
                this.$store.dispatch('showCartContent');
                this.$store.dispatch('showCartTotal');
                this.$store.dispatch('showCartSubtotal');
            Toast.fire({
                icon: 'success',
                title: 'Coupon Applied!'
            })
            }).catch(()=>{})
        }
    },
    mounted(){
    //   this.showBestProduct();
      this.showCartContent();
      this.showCartTotal();
      this.showCartSubtotal();
    //   this.getPopularProduct();
    },
};
</script>

<style scoped>
</style>
