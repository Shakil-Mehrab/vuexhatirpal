<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keyup="RealSearch" placeholder="Type something" v-model="keyword" type="text" class="input-medium search-query">
                  <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">

                  <li v-for="category in allcategories"><i class="icon-angle-right"></i><router-link :to="`/blog/post/${category.id}`">{{category.name}}</router-link><span> (20)</span></li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li v-for="(post,index) in latestpost"  v-if="index<5">
                    <img :src="post.image1" class="pull-left" alt="" width="40" height="40"/>
                    <h6><router-link :to="`/single/product/${post.id}`">{{post.name}}</router-link></h6>
                    <p>
                     {{post.detail}}
                    </p>
                  </li>

                </ul>
              </div>

            </aside>
          </div>
    </span>
</template>

<script>
   import _ from 'lodash'
    export default {
        name: "BlogSidebar",
        data(){
           return {
               keyword:''
           }
        },
        computed:{
            allcategories(){
                return this.$store.getters.getCategory;
            },
            latestpost(){
                return this.$store.getters.getLatestPost
            }
        },
        mounted(){
            this.$store.dispatch('showLatestPost');
            this.$store.dispatch('showCategories')
        },
        methods:{
            RealSearch:_.debounce(function () {
                this.$store.dispatch('showSearchPost',this.keyword);
            },1000)
        }
    };
</script>

<style scoped>
</style>