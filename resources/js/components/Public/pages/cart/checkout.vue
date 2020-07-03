<template>
<div id='cartLoad'>
<NavLoad/>
<div class="checkout-area ptb-100">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Login" />
                                    <label>
                                        <input type="checkbox" />
                                            Remember me
                                    </label>
                                </p>
                                <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" placeholder="Coupon code" />
                                    <input type="submit" value="Apply Coupon" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <form role='form' @submit.prevent="shippingOrder()">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="checkbox-form">
                    <h3>Shipping Details</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Fullname <span class="required">*</span></label>
                                <input type="text" placeholder="Full Name" v-model="form.shipping_fullname" :class="{ 'is-invalid': form.errors.has('shipping_fullname') }">
                                <has-error :form="form" field="shipping_fullname"></has-error>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="country-select">
                                <label>Country<span class="required">*</span></label>
                                <select :class="{ 'is-invalid': form.errors.has('country_id') }" v-model="form.country_id" @change="changeSelected">
                                   <option disabled value="">Select One</option>
                                    <option :value="cat.id" v-for="cat in getAllCountry" :key="cat.id">{{cat.name}}</option>
                                </select>
                                <has-error :form="form" field="country_id"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="country-select">
                                <label>City<span class="required">*</span></label>
                                <select :class="{ 'is-invalid': form.errors.has('city_id') }" v-model="form.city_id">
                                   <option disabled value="">{{getAllCity==''?'Select Country':'Select One'}}</option>
                                   <!-- <option disabled value="" v-if="getAllCity!=''">Select One</option> -->
                                    <option :value="cat.id" v-for="cat in getAllCity" :key="cat.id">{{cat.name}}</option>
                                </select>
                                <has-error :form="form" field="city_id"></has-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Address <span class="required">*</span></label>
                                <input type="text" placeholder="Address" v-model="form.shipping_address" :class="{ 'is-invalid': form.errors.has('shipping_address') }">
                                <has-error :form="form" field="shipping_address"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Phone <span class="required">*</span></label>
                                <input type="text" placeholder="Phone" v-model="form.shipping_phone" :class="{ 'is-invalid': form.errors.has('shipping_phone') }">
                                <has-error :form="form" field="shipping_phone"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Zip Code <span class="required">*</span></label>
                                <input type="text" placeholder="Zip" v-model="form.shipping_zipcode" :class="{ 'is-invalid': form.errors.has('shipping_zipcode') }">
                                <has-error :form="form" field="shipping_zipcode"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="different-address">
                        <div class="ship-different-title">
                            <h3>
                                <label>Ship to a different address?</label>
                                <input id="ship-box" type="checkbox" />
                            </h3>
                        </div>
                        <div id="ship-box-info" class="row">
                           <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Fullname <span class="required">*</span></label>
                                <input type="text" placeholder="Full Name" v-model="form.billing_fullname" :class="{ 'is-invalid': form.errors.has('billing_fullname') }">
                                <has-error :form="form" field="billing_fullname"></has-error>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="country-select">
                                <label>Country<span class="required">*</span></label>
                                <select :class="{ 'is-invalid': form.errors.has('billing_country_id') }" v-model="form.billing_country_id" @change="changeSlct">
                                   <option disabled value="">Select One</option>
                                    <option :value="cat.id" v-for="cat in getAllCountry" :key="cat.id">{{cat.name}}</option>
                                </select>
                                <has-error :form="form" field="billing_country_id"></has-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="country-select">
                                <label>City<span class="required">*</span></label>
                                <select :class="{ 'is-invalid': form.errors.has('billing_city_id') }" v-model="form.billing_city_id">
                                   <option disabled value="">{{getAllCityBilling==''?'Select Country':'Select One'}}</option>
                                   <!-- <option disabled value="" v-if="C!=''">Select One</option> -->
                                    <option :value="cat.id" v-for="cat in getAllCityBilling" :key="cat.id">{{cat.name}}</option>
                                </select>
                                <has-error :form="form" field="billing_city_id"></has-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Address <span class="required">*</span></label>
                                <input type="text" placeholder="Address" v-model="form.billing_address" :class="{ 'is-invalid': form.errors.has('billing_address') }">
                                <has-error :form="form" field="billing_address"></has-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Phone <span class="required">*</span></label>
                                <input type="text" placeholder="Phone" v-model="form.billing_phone" :class="{ 'is-invalid': form.errors.has('billing_phone') }">
                                <has-error :form="form" field="billing_phone"></has-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Zip Code <span class="required">*</span></label>
                                <input type="text" placeholder="Zip" v-model="form.billing_zipcode" :class="{ 'is-invalid': form.errors.has('billing_zipcode') }">
                                <has-error :form="form" field="billing_zipcode"></has-error>
                            </div>
                        </div>
                        </div>
                        <div class="order-notes">
                            <div class="checkout-form-list mrg-nn">
                                <label>Order Notes</label>
                                <textarea id="checkout-mess"  v-model="form.notes" :class="{ 'is-invalid': form.errors.has('notes') }" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="cart_item" v-for="cart in getCartContent" :key="cart.id">
                                    <td class="product-name">
                                        {{cart.name}} <strong class="product-quantity"> × {{cart.quantity}}</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">$ {{cart.price*cart.quantity}}</span>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">${{getCartSubTotal}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">$ {{getCartTotal}}</span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div class="panel-group" id="faq">
                                <div class="panel panel-default">
                                    <div class="row">
                                        <div class="col-md-3"> <input type="radio" value="card" v-model="form.payment_method" name="payment_method" required></div>
                                        <div class="col-md-9"><h3> Card</h3></div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="row">
                                        <div class="col-md-3"> <input type="radio" value="cash_on_delivery" v-model="form.payment_method" name="payment_method"></div>
                                        <div class="col-md-9"><h3> Cash In Delivery</h3></div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="row">
                                        <div class="col-md-3"> <input type="radio" value="paypal" v-model="form.payment_method" name="payment_method"></div>
                                        <div class="col-md-9"><h3>Paypal</h3></div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div id="payment-3" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                           <has-error :form="form" field="payment_method"></has-error>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <input type="submit" value="Place order" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</template>
<script>
import NavLoad from "./../../includes/nav.vue"

export default {
    name: "PublicHome",
    components:{
      NavLoad
    },
    data () {
        return {
            form: new Form({
            shipping_fullname: '',
            payment_method:'',
            country_id:'',
            city_id:'',
            shipping_address:'',
            shipping_phone:'',
            shipping_zipcode:'',
            billing_fullname:'',
            billing_country_id:'',
            billing_city_id:'',
            billing_address:'',
            shipping_phone:'',
            billing_zipcode:'',
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
        getAllCountry(){
        return this.$store.getters.getAllCountry
        },
        getAllCity(){
        return this.$store.getters.getAllCity
        },
        getAllCityBilling(){
        return this.$store.getters.getAllCityBilling
        },

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
        showAllCountry(){
        this.$store.dispatch('showAllCountry');
        },
        changeSelected(){
        console.log(this.form.country_id)
        this.$store.dispatch('showAllCity',this.form.country_id);
        },
        changeSlct(){
        console.log(this.form.billing_country_id)
        this.$store.dispatch('showAllBillingCity',this.form.billing_country_id);
        },
        shippingOrder(){
            console.log(this.form.payment_method)
            this.form.post('/user/orders/store')
            .then((response)=>{
                // this.$store.dispatch('showCartContent');
                // this.$store.dispatch('showCartTotal');
                // this.$store.dispatch('showCartSubtotal');
                if(this.form.payment_method=='paypal'){
                    this.$router.push('/paypal')
                }else{
                    this.$router.push('/')
                }

            Toast.fire({
                icon: 'success',
                title: 'Order Has Been Palces Succecfully!'
            })
            }).catch(()=>{})
        },

    },
    mounted(){
      this.showCartContent();
      this.showCartTotal();
      this.showCartSubtotal();
      this.showAllCountry();

    },
};
</script>

<style scoped>

</style>

