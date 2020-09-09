<template>
<div class="pl-200 pr-200 overflow clearfix">
    <div class="categori-menu-slider-wrapper clearfix">
        <div class="categories-menu">
            <div class="category-heading" @click.prevent='show_hide()'>
                <h3><a href="#">All Departments <i class="pe-7s-angle-down"></i></a></h3>
            </div>
            <div class="category-menu-list" style="display:block" id="dropDown">
                <ul>
                    <li v-for="cat in getAllCategory" :key="cat.id">
                    <router-link :to="`category/product/${cat.id}`">{{cat.name}}<i class="pe-7s-angle-right"></i></router-link>
                        <div class="category-menu-dropdown" v-if="cat.children!=''">
                            <div class="category-dropdown-style category-common3" v-for="child in cat.children" :key="child.id">
                                <h4 class="categories-subtitle"><router-link :to="`category/product/${child.id}`">{{child.name}}</router-link></h4>
                                <ul v-if="cat.children!=''">
                                    <li v-for="c in child.children" :key="c.id"><router-link :to="`category/product/${c.id}`">{{c.name}}</router-link></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu-slider-wrapper">
            <!-- <div class="menu-style-3 menu-hover text-center">
                <nav>
                    <ul>
                        <li><a href="">home</a></li>
                        <li><a href="#">blog  <span class="sticker-new">hot</span></a></li>
                        <li><a href="">Create</a></li>
                    </ul>
                </nav>
            </div> -->
            <div class="slider-area">
                <div class="slider-active owl-carousel">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/storage/default/slider.jpg" style="width:100%;height: 320px;" alt="Slider">
                                <div class="carousel-caption">
                                </div>
                            </div>
                            <div class="item" v-for="slide in getSlide" :key="slide.id">
                                <img :src="`storage/${slide.image}`" style="width:100%;height: 320px;" alt="Slider">
                                <div class="carousel-caption">
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</template>
<script>

export default {
    name: "Nav",
    data () {
        return {
            chat:'2'
        }
        },
    computed:{
        getCartCount(){
        return this.$store.getters.getCartCount
        },
        getAllCategory(){
        return this.$store.getters.getAllCategory
        },
        getYourShop(){
        return this.$store.getters.getYourShop
        },
        getSlide(){
        return this.$store.getters.getSlide
        },
        getFeaturedProduct(){
        return this.$store.getters.getFeaturedProduct
        },
    },
    methods:{
        showAllCategory(){
        this.$store.dispatch('showAllCategory');
        },
        showCartCount(){
        this.$store.dispatch('showCartCount');
        },
        showYourShop(){
        this.$store.dispatch('showYourShop');
        },
        showSlide(){
        this.$store.dispatch('showSlide');
        },
        showFeaturedProduct(){
          this.$store.dispatch('showFeaturedProduct');
        },
        show_hide(){
            var click=document.getElementById('dropDown');
            // console.log(click);
            if(click.style.display==="none"){
                click.style.display="block";
            }else{
                click.style.display="none";
            }

        }
    },
    mounted(){
      this.showFeaturedProduct();
      this.showAllCategory();
      this.showCartCount();
      this.showYourShop();
      this.showSlide();
        var click=document.getElementById('dropDown');
        // console.log(click);

    },
};
</script>
<style scoped>
:root{
    --light-gray:#2b3032a1;
    --primary-color:#45ccb8;
    --border:#2b303218;
    --text-color:#ff686b;
    --roboto:"Roboto",sans-serif;
    --gugi:"Gugi",cursive;
    --sofia:"Sofia",cursive;
}
.brand-logo-area-2{
    padding: 5rem 0px;
}
.section-title-4 {
    margin-bottom: 2rem;
}
/*.brand-logo-area-2::before {
    background-color: none !important;
}*/
.single-brand{
    display: flex;
    flex-direction: column;
    margin-right: .8rem;
}
.single-brand a{
    text-align: center;
    margin-top: .6rem;
    text-decoration: none
}
.single-brand span:hover{
    background: #45ccb8;
}

.single-brand .btn-span{
    padding: 0.8rem 1.9rem;
    border-radius: 4rem;
    border: 1px solid var(--border);
    background-color: white;
    color: var(--light-gray);
}
</style>
