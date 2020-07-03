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
                <li class="breadcrumb-item"><router-link to="/admin/all/header">Header</router-link></li>
                <li class="breadcrumb-item active">Add Header</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-around">
            <div class="col-md-8">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Header Edit</h3>
                </div>
                <form role="form"  @submit.prevent="updateCountry()">
                  <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Title" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
              <has-error :form="form" field="title"></has-error>
            </div>
            <div class="form-group">
              <label for="heading">Heading</label>
              <input type="text" class="form-control" id="heading" name="heading" placeholder="Heading" v-model="form.heading" :class="{ 'is-invalid': form.errors.has('heading') }">
              <has-error :form="form" field="heading"></has-error>
            </div>
            <div class="form-group">
              <label for="meta_detail">Meta Description</label>
              <markdown-editor v-model="form.meta_detail" :class="{ 'is-invalid': form.errors.has('meta_detail') }"></markdown-editor>
                            <has-error :form="form" field="meta_detail"></has-error>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input @change="changePhoto($event)" type="file" name="logo" id="logo" :class="{ 'is-invalid': form.errors.has('logo') }">
                    <img :src="form.logo" alt="show" width="100" height="100">
                     <has-error :form="form" field="logo"></has-error>
                  </div>
                </div>
            </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
</template>
<script>
  export default{
    name:"store",
    data () {
        return {
          form: new Form({
            title:'',
            meta_detail:'',
            heading: '',
            logo: ''
          })
        }
    },
    mounted(){
      axios.get(`admin/header/${this.$route.params.id}/edit`)
      .then((response)=>{
        this.form.fill(response.data.product);
      })
      .catch(()=>{})
    },
    methods:{
      changePhoto(event){
        let file = event.target.files[0];

        let reader = new FileReader();
        reader.onload = event =>{
            this.form.logo = event.target.result
            console.log(this.form.logo);
        };
        reader.readAsDataURL(file);
      },
      updateCountry(){
        this.form.post(`admin/header/update/${this.$route.params.id}`)
        .then((response)=>{
          Toast.fire({
            icon: 'success',
            title: 'Header Updated Successfully!'
          })
      })
        .catch(()=>{})
      }
    }
  };
</script>
<style scoped>

</style>

 
