<template>
<div id="navonly">
    <header style="background:cadetblue">
        <div class="header-top-wrapper-2 border-bottom-2">
            <div class="header-info-wrapper pl-200 pr-200" >
                <div class="header-contact-info">
                    <ul>
                        <li><i class="pe-7s-call"></i><a href="#"> +8801400560808</a></li>
                        <li><i class="pe-7s-mail"></i> <a href="#">admin@hatirpal.com</a></li>
                    </ul>
                </div>
                <div class="electronics-login-register">
                    <ul>
                        <li v-if="getAllCompareProduct.data" style="font-color:white"><router-link to="/compare/list"><i class="pe-7s-repeat"></i>Compare ({{getAllCompareProduct.data.length}})</router-link></li>
                        <li v-if="getAllWishProduct.data"><router-link to="/wish/list"><i class="pe-7s-like"></i>Wishlist ({{getAllWishProduct.data.length}})</router-link></li>
                        <li><a href="#"><i class="pe-7s-flag"></i>Bangladesh</a></li>
                        <li><a class="border-none" href="#">$ USD</a></li>
                        <li v-if="getYourShop==''"><router-link to="/create/your/shop"  class="nav-link"><i class="pe-7s-users"></i>Create Your Shop</router-link></li>
                        <li v-else><a href="/admin" class="nav-link"><i class="pe-7s-users"></i>My Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom pt-40 pb-30 clearfix" style="padding:5px">
            <div class="header-bottom-wrapper pr-200 pl-200">
                <div class="logo-3">
                    <router-link to='/'>
                        <img src="/storage/default/logo.png" style="width: 150px;height:50px" alt="">
                    </router-link>
                </div>
                <div class="categories-search-wrapper">
                    <!-- <div class="all-categories">
                        <div class="select-wrapper">
                            <select class="select">
                                <option disabled value="">Select One</option>
                                <option :value="category.id" v-for="category in getAllCategory" :key="category.id">{{category.name}} </option>
                            </select>
                        </div>
                    </div> -->
                    <div class="categories-wrapper">
                        <form @submit.prevent="showAllNavSearchProduct">
                            <input name="query" v-model="keystring" placeholder="Enter Your key word" type="text">
                            <button type="submit"> Search </button>
                        </form>
                    </div>
                </div>
                <div class="trace-cart-wrapper">
                    <!-- <div class="trace same-style">
                        <div class="same-style-icon">
                            <a href="#"><i class="pe-7s-plane"></i></a>
                        </div>
                        <div class="same-style-text">
                            <router-link to="/">Shop Now</router-link>
                        </div>
                    </div> -->
                    <div class="categories-cart same-style">
                        <div class="same-style-icon">
                            <a href=""><i class="pe-7s-cart" style="color:white"></i></a>
                        </div>
                        <div class="same-style-text" style="color:white">
                            <router-link to="/cart">My Cart <br>{{getCartCount}} Item</router-link>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><router-link to='/'>HOME</router-link>

                                </li>
                                <li><a href="#">BLOG</a>

                                </li>
                                <li><a href="#"> Contact </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
</template>

<script>

export default {
    name: "Nav",
    data(){
      return{
        keystring:'',
      }
    },
    computed:{
        getCartCount(){
        return this.$store.getters.getCartCount
        },
        getYourShop(){
        return this.$store.getters.getYourShop
        },
        getAllWishProduct(){
        return this.$store.getters.getAllWishProduct
        },
        getAllCompareProduct(){
        return this.$store.getters.getAllCompareProduct
        },
    },
    methods:{
        showCartCount(){
        this.$store.dispatch('showCartCount');
        },
        showAllWishProduct(){
        this.$store.dispatch('showAllWishProduct');
        },
        showAllCompareProduct(){
        this.$store.dispatch('showAllCompareProduct');
        },
        showYourShop(){
        this.$store.dispatch('showYourShop');
        },
        showAllNavSearchProduct(){
            // console.log(this.keystring)
            this.$router.push('/user/nav/search')
            this.$store.dispatch('showAllNavSearchProduct',this.keystring)
        },

    },
    mounted(){
    //   this.showAllCategory();
      this.showCartCount();
      this.showYourShop();
      this.showAllWishProduct();
      this.showAllCompareProduct();



    },
};
</script>

<style scoped>
ul li{
    color: white;
}
ul li a{
    color: white;
}
ul li a i{
    color:white;
}
.categories-search-wrapper {
    background-color: white;
}
.same-style-text a{
    color: white;
}
</style>
