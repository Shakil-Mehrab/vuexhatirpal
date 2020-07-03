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
                  <li class="breadcrumb-item active">User</li>
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
                  <h3 class="card-title">User List</h3>
                  <div class="card-tools">
                    <div style="float:left;margin-right:20px">
                      <form >
                          <input class="form-control form-control-navbar" @keyup="RealSearch" v-model="keyword" type="search" placeholder="Search" aria-label="Search">
                      </form>
                    </div>
                 </div>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Mobile No</th>
                      <th>email</th>
                      <th>Country</th>
                      <th>Image</th>
                      <th>Type</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category in getAdminUser.data">
                      <td>{{category.id}}</td>
                      <td>{{category.name}}</td>
                      <td>{{category.phone}}</td>
                      <td>{{category.email}}</td>
                      <td>{{category.country.name}}</td>
                      <td><img :src="category.image" style="max-height:40px;min-height: 40px;max-width: 40px;min-width: 40px"></td>
                      <td v-if='category.status==1'>Member</td>
                      <td v-if='category.status==0'>User</td>
                      <td>
                        <a href=""><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                        <router-link :to="`/admin/edit/user/${category.id}`"><button class="btn btn-primary btn-sm">Edit</button></router-link> 
                        <a href="" @click.prevent="deleteProduct(category.id)"><button class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <div style="margin-left:40%"><br>
                    <pagination :data="getAdminUser" v-on:pagination-change-page="showAdminUser"></pagination>
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
      this.showAdminUser()
    },
    computed:{
      getAdminUser(){
        return this.$store.getters.getAdminUser
      }
    },
    methods:{ 
      showAdminUser(page){
        if(typeof page==='undefined'){page=1;}
        return this.$store.dispatch("showAdminUser",page)
      },
      deleteProduct(id){
        axios.get('/admin/user/delete/'+id)
        .then(()=>{
            this.$store.dispatch("showAdminUser")
            Toast.fire({
            icon: 'success',
            title: 'User Deleted Successfully!'
          })
        })
        .catch(()=>{})
      },
      RealSearch:_.debounce(function(){
        console.log(this.keyword)
        this.$store.dispatch("showSearchAdminUser",this.keyword)
      })
    }
};
</script>

<style scoped>

</style>

 
