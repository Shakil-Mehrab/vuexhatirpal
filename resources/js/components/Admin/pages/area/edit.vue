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
              <li class="breadcrumb-item"><router-link to="/admin/all/area">Area</router-link></li>
              <li class="breadcrumb-item active">Edit Area</li>
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
              <div class="card-header text-center">
                <h3 class="card-title">Edit Area</h3>
              </div>
              <form role="form"  @submit.prevent="updateCategory()" enctype="multipart/form-data">
                <div class="card-body">
                	<div class="form-group">
                        <label for="district_id">District</label>
                     	<select class="form-control"   :class="{ 'is-invalid': form.errors.has('district_id') }" v-model="form.district_id">
                     		<option disabled value="">Select One</option>
                            <option :value="cat.id" v-for="cat in getallCategory">{{cat.name}}</option>
                        </select>
	                    <has-error :form="form" field="district_id"></has-error>
	                </div>
					<div class="form-group">
						<label for="name">Area Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Country Name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
						<has-error :form="form" field="name"></has-error>
					</div>
					<div class="form-group">
	                    <label for="charge">Charge</label>
	                    <input type="text" class="form-control" id="charge" name="charge" placeholder="Charge" v-model="form.charge" :class="{ 'is-invalid': form.errors.has('charge') }">
	                    <has-error :form="form" field="charge"></has-error>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
	        name: '',
      		district_id: '',
      		charge:''
	      })
	    }
	},
    mounted(){
	  this.$store.dispatch("showSelectAdminDistrict")
      axios.get(`admin/area/${this.$route.params.id}/edit`)
      .then((response)=>{
        this.form.fill(response.data.product);
      })
      .catch(()=>{})
    },
    computed:{
		getallCategory(){
	        return this.$store.getters.getAdminSelectDistrict
	    }
	},
	methods:{
      changePhoto(event){
          let file = event.target.files[0];
          let reader = new FileReader();
          reader.onload = event =>{
            this.form.image = event.target.result
          };
          reader.readAsDataURL(file);
      },
      updateCategory(){
        this.form.post(`admin/area/update/${this.$route.params.id}`)
        .then((response)=>{
          Toast.fire({
            icon: 'success',
            title: 'Area Updated Successfully!'
          })
      })
        .catch(()=>{})
      },
    }
	};
</script>
<style scoped>

</style>

 
