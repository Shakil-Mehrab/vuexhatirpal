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
              <li class="breadcrumb-item"><router-link to="/">Admin Dashboard</router-link></li>
              <li class="breadcrumb-item"><router-link to="/admin/all/category">Area</router-link></li>
              <li class="breadcrumb-item active">Add Area</li>
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
                <h3 class="card-title">Add Area</h3>
              </div>
              <form role="form"  @submit.prevent="addCategory()">
                <div class="card-body">
            	    <div class="form-group">
                    <label for="district_id">District</label>
                   	<select class="form-control"   :class="{ 'is-invalid': form.errors.has('district_id') }" v-model="form.district_id">
                   		<option disabled value="">Select One</option>
                      <option :value="cat.id" v-for="cat in getAdminSelectDistrict">{{cat.name}} ({{cat.city.name}})</option>
                      </select>
                      <has-error :form="form" field="district_id"></has-error>
	                </div>
        					<div class="form-group">
        						<label for="name">Area Name</label>
        						<input type="text" class="form-control" id="name" name="name" placeholder="Area Name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
        						<has-error :form="form" field="name"></has-error>
        					</div>
                  <div class="form-group">
                    <label for="charge">Charge</label>
                    <input type="text" class="form-control" id="charge" name="charge" placeholder="Charge" v-model="form.charge" :class="{ 'is-invalid': form.errors.has('charge') }">
                    <has-error :form="form" field="charge"></has-error>
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
			    name: '',
		      district_id:'',
          charge:''
		    })
		}
	},
	mounted(){
		this.$store.dispatch("showSelectAdminDistrict")
	},
	computed:{
		getAdminSelectDistrict(){
	        return this.$store.getters.getAdminSelectDistrict
	    }
	},
	methods:{
		addCategory(){
			this.form.post('/admin/area/store')
			.then((response)=>{this.$router.push('/admin/all/area')
			  Toast.fire({
			    icon: 'success',
			    title: 'Area Added Successfully!'
			  })
			})
			.catch(()=>{})
		}
	}
};
</script>
<style scoped>

</style>

 
