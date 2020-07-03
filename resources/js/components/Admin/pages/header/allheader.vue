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
                  <li class="breadcrumb-item active">Header</li>
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
                  <h3 class="card-title">Hading List</h3>
                   <div class="card-tools">
                    <div style="float:left;margin-right:20px">
                      <form >
                        <input class="form-control form-control-navbar" @keyup="RealSearch" v-model="keyword" type="search" placeholder="Search" aria-label="Search">
                      </form>
                    </div>
                    <div style="float:left">
                      <button class="btn btn-primary"><router-link to="/admin/add/header" style="color:white">Add Logo & Icon</router-link></button>
                    </div>
                   </div>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Heading</th>
                      <th>Meta Detail</th>
                      <th>Logo</th>
                      <th>Icon</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category in getAdminHeader.data">
                      <td>{{category.id}}</td>
                      <td>{{category.title}}</td>
                      <td>{{category.heading}}</td>
                      <td>{{category.meta_detail}}</td>
                      <td><img :src="category.logo" style="max-height:40px;min-height: 40px;max-width: 40px;min-width: 40px"></td>
                       <td><img :src="category.logo" style="max-height:40px;min-height: 40px;max-width: 40px;min-width: 40px"></td>
                      <td>
                        <router-link :to="`/admin/edit/header/${category.id}`"><button class="btn btn-primary btn-sm">Edit</button></router-link> 
                        <a href="" @click.prevent="deleteProduct(category.id)"><button class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <div style="margin-left:40%"><br>
                    <pagination :data="getAdminHeader" v-on:pagination-change-page="showAdminHeader"></pagination>
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
        keyword:'',
      }
    },
    mounted(){
      this.showAdminHeader();
    },
    computed:{
      getAdminHeader(){
        return this.$store.getters.getAdminHeader
      }
    },
    methods:{
      showAdminHeader(page){
        if(typeof page==='undefined'){page=1;}
        return this.$store.dispatch("showAdminHeader",page)
      },
      deleteProduct(id){
        axios.get('/admin/header/delete/'+id)
        .then(()=>{
            this.$store.dispatch("showAdminHeader")
            Toast.fire({
            icon: 'success',
            title: 'Header Deleted Successfully!'
          })
        })
        .catch(()=>{})
      },
      RealSearch:_.debounce(function () {
        console.log(this.keyword)
        this.$store.dispatch('showSearchAdminCountry',this.keyword);
      },1000)
    },
  
};
</script>

<style scoped>

</style>

 
