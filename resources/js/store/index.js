 export default{
 	state: {
    bestProducts:[],
    allTopRated:[],
    recentProducts:[],
    popularProducts:[],
    bestSale:[],
    allCategories:[],
    frontSlide:[],
    cartContent:[],
    cartCount:[],
    cartSubTotal:[],
    cartTotal:[],
    allCountry:[],
    allCity:[],
    allBillingCity:'',
    singleProduct:'',
    sameProduct:'',
    yourShop:'',
    allCategoryProduct:'',
    relatedProduct:'',
    allWishProduct:'',
    allCompareProduct:'',
    discount:'',
    discountProduct:'',
    /////nav search
    allProduct:'',
    featuredProduct:'',
    fashionProduct:'',
    discountAllProduct:'',
  },
  getters:{
    getBestProduct(state){
    return state.bestProducts;
    },
    getRecentProduct(state){
    return state.recentProducts;
    },
    getPopularProduct(state){
    return state.popularProducts;
    },
    getBestSale(state){
    return state.bestSale;
    },
    getAllTopRated(state){
    return state.allTopRated;
    },
    getFeaturedProduct(state){
    return state.featuredProduct;
    },
    getFashionProduct(state){
    return state.fashionProduct;
    },
    getAllCategory(state){
    return state.allCategories;
    },
    getSlide(state){
    return state.frontSlide;
    },
    getCartContent(state){
    return state.cartContent;
    },
    getCartCount(state){
    return state.cartCount;
    },
    getCartSubTotal(state){
    return state.cartSubTotal;
    },
    getCartTotal(state){
    return state.cartTotal;
    },
    getAllCountry(state){
    return state.allCountry;
    },
    getAllCity(state){
    return state.allCity;
    },
    getAllCityBilling(state){
    return state.allBillingCity;
    },
    getSingleProduct(state){
    return state.singleProduct;
    },
    getSameProduct(state){
    return state.sameProduct;
    },
    getYourShop(state){
    return state.yourShop;
    },
    getAllCategoryProduct(state){
    return state.allCategoryProduct;
    },
    getRelatedProduct(state){
    return state.relatedProduct;
    },
    getAllWishProduct(state){
    return state.allWishProduct;
    },
    getAllCompareProduct(state){
    return state.allCompareProduct;
    },
    getDiscount(state){
    return state.discount;
    },
    getDiscountProduct(state){
    return state.discountProduct;
    },
    getDiscountAllProduct(state){
    return state.discountAllProduct;
    },

    ///nav search
    getAllProduct(state){
    return state.allProduct;
    },

  },
  actions:{

    showFashionProduct(context){
        axios.get('/user/fashion')
        .then((response)=>{context.commit('fashionProduct',response.data.fashionProduct)})
    },

    showAllCategory(context){
        axios.get('/user/category')
        .then((response)=>{context.commit('allCategories',response.data.allCategories)})
     },
     showFeaturedProduct(context){
        axios.get('/user/featured')
        .then((response)=>{context.commit('featuredProduct',response.data.featuredProduct)})
     },
    showSlide(context){
        axios.get('/user/slide')
        .then((response)=>{context.commit('frontSlide',response.data.frontSlide)})
     },

    //cart
    showCartContent(context){
        axios.get('/user/cart')
        .then((response)=>{context.commit('cartContent',response.data.cartContent)})
    },
    showCartCount(context){
        axios.get('/user/cart/count')
        .then((response)=>{context.commit('cartCount',response.data.cartCount)})
    },
    showCartSubtotal(context){
        axios.get('/user/cart/subtotal')
        .then((response)=>{context.commit('cartSubTotal',response.data.cartSubTotal)})
    },
    showCartTotal(context){
        axios.get('/user/cart/total')
        .then((response)=>{context.commit('cartTotal',response.data.cartTotal)})
    },
    showAllCountry(context){
        axios.get('/user/country')
        .then((response)=>{context.commit('allCountry',response.data.allCountry)})
    },
    showAllCity(context,country_id){
        axios.get('/user/city/'+country_id)
        .then((response)=>{context.commit('allCity',response.data.allCity)})
    },
    showAllBillingCity(context,country_id){
        axios.get('/user/city/'+country_id)
        .then((response)=>{context.commit('allBillingCity',response.data.allCity)})
    },
    showSingleProduct(context,product_id){
        axios.get('/user/products/show/'+product_id)
        .then((response)=>{context.commit('singleProduct',response.data.singleProduct)})
    },
    showSameProduct(context,product_id){
        axios.get('/user/same/products/show/'+product_id)
        .then((response)=>{context.commit('sameProduct',response.data.sameProduct)})
    },
    ////create shop checking
    showYourShop(context){
        axios.get('/user/shops/show')
        .then((response)=>{context.commit('yourShop',response.data.yourShop)})
    },

/////category page
    showAllCategoryProduct(context,cat_id){
        axios.get('/user/cat/products/'+cat_id)
        .then((response)=>{context.commit('allCategoryProduct',response.data.allCategoryProduct)})
    },
    showSearchRealByCatId(context,cat_id){
        axios.get('/user/search/cat_product/'+cat_id)
        .then((response)=>{context.commit('searchProductByCatId',response.data.searchProductByCatId)})
    },
    showRelatedProduct(context,pdt_id){
        axios.get('/user/related/product/'+pdt_id)
        .then((response)=>{context.commit('relatedProduct',response.data.relatedProduct)})
    },

    ////////nav search
    showAllNavSearchProduct(context,string){
        axios.get('/user/nav/search?s='+string)
        .then((response)=>{context.commit('navSearchProduct',response.data.navSearchProduct)})
    },
//////search page

    showSearchRealSearch(context,keyword){
        axios.get('/user/real/search?s='+keyword)
        .then((response)=>{context.commit('searchRealSearch',response.data.searchRealSearch)})
    },

/////wish product getAllWishProduct

    showDiscount(context){
    axios.get('user/discount')
    .then((response)=>{context.commit('discount',response.data.discount)})
    },
    showDiscountProduct(context,discount_id){
    axios.get('user/discount/product/'+discount_id)
    .then((response)=>{context.commit('discountProduct',response.data.discountProduct)})
    },
    showDiscountAllProduct(context){
    axios.get('user/discount/all/product')
    .then((response)=>{context.commit('discountAllProduct',response.data.discountAllProduct)})
    },
    showSearchRealByDiscountId(context,discount_id){
    axios.get('/user/search/discount/product/'+discount_id)
    .then((response)=>{context.commit('searchProductByDiscountId',response.data.searchProductByDiscountId)})
    },




    
    showBestProduct(context,page){
        axios.get('http://hatirpal.com/user/best/product?page='+page)
        .then((response)=>{context.commit('bestProducts',response.data.bestProducts)})
    },
    showRecentProduct(context,page){
        axios.get('http://hatirpal.com/user/recent/product?page='+page)
        .then((response)=>{context.commit('recentProducts',response.data.recentProducts)})
    },
    showPopularProduct(context,page){
        axios.get('http://hatirpal.com/user/popular/product?page='+page)
        .then((response)=>{context.commit('popularProducts',response.data.popularProducts)})
    },
    showBestSale(context,page){
        axios.get('http://hatirpal.com/user/best/sale?page='+page)
        .then((response)=>{context.commit('bestSale',response.data.bestSale)})
    },
    showAllTopRated(context,page){
        axios.get('http://hatirpal.com/user/toprated/product?page='+page)
        .then((response)=>{context.commit('allTopRated',response.data.allTopRated)})
    },
    showAllProduct(context,page){
        axios.get('http://hatirpal.com/user/all/product?page='+page)
        .then((response)=>{context.commit('allProduct',response.data.allProduct)})
    },
    showAllWishProduct(context,page){
        axios.get('http://hatirpal.com/user/wish/list?page='+page)
        .then((response)=>{context.commit('allWishProduct',response.data.allWishProduct)})
    },
    showAllCompareProduct(context,page){
        axios.get('http://hatirpal.com/user/compare/list?page='+page)
        .then((response)=>{context.commit('allCompareProduct',response.data.allCompareProduct)})
    },



    // showBestProduct(context,page){
    //     axios.get('http://localhost:8000/user/best/product?page='+page)
    //     .then((response)=>{context.commit('bestProducts',response.data.bestProducts)})
    // },
    // showRecentProduct(context,page){
    //     axios.get('http://localhost:8000/user/recent/product?page='+page)
    //     .then((response)=>{context.commit('recentProducts',response.data.recentProducts)})
    // },
    // showPopularProduct(context,page){
    //     axios.get('http://localhost:8000/user/popular/product?page='+page)
    //     .then((response)=>{context.commit('popularProducts',response.data.popularProducts)})
    // },
    // showBestSale(context,page){
    //     axios.get('http://localhost:8000/user/best/sale?page='+page)
    //     .then((response)=>{context.commit('bestSale',response.data.bestSale)})
    // },
    // showAllTopRated(context,page){
    //     axios.get('http://localhost:8000/user/toprated/product?page='+page)
    //     .then((response)=>{context.commit('allTopRated',response.data.allTopRated)})
    // },
    // showAllProduct(context,page){
    //     axios.get('http://localhost:8000/user/all/product?page='+page)
    //     .then((response)=>{context.commit('allProduct',response.data.allProduct)})
    // },
    // showAllWishProduct(context,page){
    //     axios.get('http://localhost:8000/user/wish/list?page='+page)
    //     .then((response)=>{context.commit('allWishProduct',response.data.allWishProduct)})
    // },
    // showAllCompareProduct(context,page){
    //     axios.get('http://localhost:8000/user/compare/list?page='+page)
    //     .then((response)=>{context.commit('allCompareProduct',response.data.allCompareProduct)})
    // },
  },
  mutations: {
    bestProducts(state,data) {
    return state.bestProducts=data;
    },
    recentProducts(state,data) {
    return state.recentProducts=data;
    },
    popularProducts(state,data) {
    return state.popularProducts=data;
    },
    bestSale(state,data) {
    return state.bestSale=data;
    },
    allCategories(state,data) {
    return state.allCategories=data;
    },
    featuredProduct(state,data) {
    return state.featuredProduct=data;
    },
    cartContent(state,data) {
    return state.cartContent=data;
    },
    cartCount(state,data) {
    return state.cartCount=data;
    },
    cartSubTotal(state,data) {
    return state.cartSubTotal=data;
    },
    cartTotal(state,data) {
    return state.cartTotal=data;
    },
    allCountry(state,data) {
    return state.allCountry=data;
    },
    allCity(state,data) {
    return state.allCity=data;
    },
    allBillingCity(state,data) {
    return state.allBillingCity=data;
    },
    singleProduct(state,data) {
    return state.singleProduct=data;
    },
    sameProduct(state,data) {
    return state.sameProduct=data;
    },
    yourShop(state,data) {
    return state.yourShop=data;
    },
    allCategoryProduct(state,data) {
    return state.allCategoryProduct=data;
    },
    searchProductByCatId(state,data) {
    return state.allCategoryProduct=data;
    },
    relatedProduct(state,data) {
    return state.relatedProduct=data;
    },
    ////nav search
    navSearchProduct(state,data) {
    return state.allProduct=data;
    },
    /////search.vue
    allProduct(state,data) {
    return state.allProduct=data;
    },
    searchRealSearch(state,data) {
    return state.allProduct=data;
    },
    allWishProduct(state,data) {
    return state.allWishProduct=data;
    },
    allCompareProduct(state,data) {
    return state.allCompareProduct=data;
    },
    allTopRated(state,data) {
    return state.allTopRated=data;
    },
    frontSlide(state,data) {
    return state.frontSlide=data;
    },
    discount(state,data) {
    return state.discount=data;
    },
    discountProduct(state,data) {
    return state.discountProduct=data;
    },
    searchProductByDiscountId(state,data) {
    return state.discountProduct=data;
    },
    fashionProduct(state,data) {
    return state.fashionProduct=data;
    },
    discountAllProduct(state,data) {
    return state.discountAllProduct=data;
    },

  },
 }

