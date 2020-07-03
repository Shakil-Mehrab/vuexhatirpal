<template>
  <span id="blogpost">
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="post,index in blogpost.data" :key="post.id">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{post.name}}</a></h3>
                    </div>

                    <img :src="post.image1" alt="" />
                  </div>
                  <p>
                   {{post.detail|shortlength(200,'...')}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{post.created_at|timeformat}}</a></li>
                      <li v-if="post.user"><i class="icon-user"></i><a href="#">{{post.user.name}}</a></li>
                      <li v-if="post.category_id"><i class="icon-folder-open"></i><a href="#"> {{post.category.name}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="`/single/product/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>
            <div id="pagination">
              <span class="all">Page {{blogpost.current_page}} of {{blogpost.last_page}}</span>
              <pagination :data="blogpost" v-on:pagination-change-page="getAllCategoryPost"></pagination>
              <!--
              <a href="#" class="current" @click.prevent="pagin(1)">1</a>
              <a href="#" class="inactive" @click.prevent="pagin(2)">2</a>
              <a href="#" class="inactive" @click.prevent="pagin(3)">3</a> -->
            </div>
          </div>
          <BlogSidebar/>
        </div>
      </div>
    </section>
  </span>
</template>
<script>
  import BlogSidebar from "./BlogSidebar.vue"
  export default {
    name: "BlogPost",
    components:{
      BlogSidebar
    },
    computed:{
      blogpost(){
        return this.$store.getters.getBlogPost
      }
    },
    methods:{
      getAllProduct(page){
         if(typeof page==='undefined'){
                page=1;
            }
        if(this.$route.params.id!=null){
          this.$store.dispatch('showBlogPostByCatId',this.$route.params.id+'?page='+page);
        }else{
          this.$store.dispatch('showBlogPost',page);
        }
      },
    },
    mounted(){
      this.getAllProduct();
    },
    watch:{
      $route(to,from){
        this.getAllProduct();
      }
    }
  };
</script>

<style>
#pagination a.page-link{

    color: blue;
    background: #afb4c5;
    border-radius: 8px;
}
#pagination .active a.page-link{

    color: white;
    background: blue;
}

#pagination span.sr-only{
    display: none;
}
</style>
