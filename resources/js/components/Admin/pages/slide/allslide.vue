<template>
    <div class="shakillock">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><router-link to="/">Admin Dashboard</router-link></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><router-link to="/">Dashboard</router-link></li>
                  <li class="breadcrumb-item active">Slide</li>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Slide List</h3>
                   <div class="card-tools">
                    <div style="float:left;margin-right:20px">
                      <form >
                          <input class="form-control form-control-navbar" @keyup="RealSearch" v-model="keyword" type="search" placeholder="Search" aria-label="Search">
                      </form>
                    </div>
                    <div style="float:left">
                      <button class="btn btn-primary"><router-link to="/admin/add/slide" style="color:white">Add Slide</router-link></button>
                    </div>
                 </div>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Slide Name</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category in getAdminSlide.data">
                      <td>{{category.id}}</td>
                      <td><span v-if="category.name==1">Home</span>
                          <span v-if="category.name==2">Pavilion</span>
                          <span v-if="category.name==3">About</span>
                          <span v-if="category.name==4">Helpline</span>
                      </td>
                      <td><img :src="category.image" style="max-height:40px;min-height: 40px;max-width: 40px;min-width: 40px"></td>
                      <td>
                        <router-link :to="`/admin/edit/slide/${category.id}`"><button class="btn btn-primary btn-sm">Edit</button></router-link> 
                        <a href="" @click.prevent="deleteProduct(category.id)"><button class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <div style="margin-left:40%"><br>
                    <pagination :data="getAdminSlide" v-on:pagination-change-page="showAdminSlide"></pagination>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> 
    </div>
</template>
<script>
export default{
    name:"country",
    data(){
      return{
        keyword:''
      }
    },
    mounted(){
      this.showAdminSlide()
    },
    computed:{
      getAdminSlide(){
        return this.$store.getters.getAdminSlide
      }
    },
    methods:{
      showAdminSlide(page){
        if(typeof page==='undefined'){page=1;}
        return this.$store.dispatch("showAdminSlide",page)
      },
      deleteProduct(id){
        axios.get('/admin/slide/delete/'+id)
        .then(()=>{
            this.$store.dispatch("showAdminSlide")
            Toast.fire({
            icon: 'success',
            title: 'Slide Deleted Successfully!'
          })
        })
        .catch(()=>{})
      },
      RealSearch:_.debounce(function(){
        console.log(this.keyword)
        this.$store.dispatch("showSearchAdminSlide",this.keyword)
      },1000)
    },
};
</script>

<style scoped>

</style>

 
