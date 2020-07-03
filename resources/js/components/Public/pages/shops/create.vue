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
            <div class="col-lg-12 col-md-12 col-12">
                <div class="checkbox-form">
                    <h3>Create Your Shop</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Fullname <span class="required">*</span></label>
                                <input type="text" placeholder="Full Name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Phone <span class="required">*</span></label>
                                <input type="text" placeholder="Phone" v-model="form.phone" :class="{ 'is-invalid': form.errors.has('phone') }">
                                <has-error :form="form" field="phone"></has-error>
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
                                <input type="text" placeholder="Address" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }">
                                <has-error :form="form" field="address"></has-error>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Description <span class="required">*</span></label>
                                <input type="text" placeholder="Description" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }">
                                <has-error :form="form" field="description"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Create Your Shop" class="form-control btn btn-success">
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
            name: '',
            phone:'',
            country_id:'',
            city_id:'',
            address:'',
            })
        }
    },
    computed:{
        getAllCountry(){
        return this.$store.getters.getAllCountry
        },
        getAllCity(){
        return this.$store.getters.getAllCity
        },

    },
    methods:{
        showAllCountry(){
        this.$store.dispatch('showAllCountry');
        },
        changeSelected(){
        console.log(this.form.country_id)
        this.$store.dispatch('showAllCity',this.form.country_id);
        },
        shippingOrder(){
            console.log(this.form.payment_method)
            this.form.post('/user/shops/store')
            .then((response)=>{
                this.$router.push('/')
            Toast.fire({
                icon: 'success',
                title: 'Shop Created.Wait for Active!'
            })
            }).catch(()=>{})
        },
    },
    mounted(){
      this.showAllCountry();
    },
};
</script>

<style scoped>

</style>

