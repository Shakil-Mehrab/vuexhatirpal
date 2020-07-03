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
                  <li class="breadcrumb-item"><router-link to="/">Dashborad</router-link></li>
                  <li class="breadcrumb-item active">District</li>
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
                  <h3 class="card-title">District List</h3>
                    <div class="card-tools">
                    <div style="float:left;margin-right:20px">
                      <form >
                        <input class="form-control form-control-navbar" @keyup="RealSearch" v-model="keyword" type="search" placeholder="Search" aria-label="Search">
                      </form>
                    </div>
                    <div style="float:left">
                      <button class="btn btn-primary"><router-link to="/admin/add/district" style="color:white">Add District</router-link></button>
                    </div>
                   </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                     <select name="" id="" v-model="select" @change="deleteSelected" class="form-control">
                        <option value="">Bulk Option</option>
                        <option value="delete">Delete all</option>
                      </select>
                    </div>
                  </div><br>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>
                        <input type="checkbox" @click.prevent="selectAll" v-model="all_select">
                        <!-- <span v-if="all_select==false">Select All</span>
                        <span v-else>Uncheck All</span> -->
                      </th>
                      <th>ID</th>
                      <th>Country</th>
                      <th>City</th>
                      <th>District</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category in getAdminDistrict.data">
                      <td><input type="checkbox" v-model="categoryItem" :value="category.id" ></td>
                      <td>{{category.id}}</td>
                      <td>{{category.city.country.name}}</td>
                      <td>{{category.city.name}}</td>
                      <td>{{category.name}}</td>
                      <td>
                        <router-link :to="`/admin/edit/district/${category.id}`"><button class="btn btn-primary btn-sm">Edit</button></router-link> 
                        <a href="" @click.prevent="deleteProduct(category.id)"><button class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <div style="margin-left:40%"><br>
                    <pagination :data="getAdminDistrict" v-on:pagination-change-page="showAdminDistrict"></pagination>
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
      return {
        keyword:'',
        categoryItem:[],
        select:'',
        all_select:false
      }
    },
    mounted(){
     this.showAdminDistrict()
    },
    computed:{
      getAdminDistrict(){
        return this.$store.getters.getAdminDistrict
      }
    },
    methods:{
      showAdminDistrict(page){
        if(typeof page==="undefined"){page=1;}
          this.$store.dispatch("showAdminDistrict",page)
      },
      deleteProduct(id){
        axios.get('/admin/district/delete/'+id)
        .then(()=>{
            this.$store.dispatch("showAdminDistrict")
            Toast.fire({
            icon: 'success',
            title: 'District Deleted Successfully!'
          })
        })
        .catch(()=>{})
      },
      deleteSelected(){
       //console.log(this.select)
       //this.select=''
       //console.log(this.select)
        if(this.select=='delete'){
          console.log(this.categoryItem)
          axios.get('/admin/district/delete/'+this.categoryItem)
           .then(()=>{
             this.categoryItem = []
             this.$store.dispatch("showAdminDistrict")
             Toast.fire({
              icon: 'success',
              title: 'District Deleted Successfully!'
             })
           })
          this.select=''  
        }
      },
      selectAll(){
        if(this.all_select==false){
          this.all_select = true
          for(var category in this.getAdminDistrict.data){
            this.categoryItem.push(this.getAdminDistrict.data[category].id)
          } 
        }else{
          this.all_select = false
          this.categoryItem = []
        }
      },
      RealSearch:_.debounce(function(){
        console.log(this.keyword)
          this.$store.dispatch("showSearchAdminDistrict",this.keyword)
      },1000)
    }
};
</script>

<style scoped>

</style>

 
