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
              <li class="breadcrumb-item"><router-link to="/admin/all/country">member</router-link></li>
              <li class="breadcrumb-item active">Edit member</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header text-center">
                <h3 class="card-title">Edit member</h3>
              </div>
              <form role="form"  @submit.prevent="updateCategory()" enctype="multipart/form-data">
                <div class="card-body">
                	<div class="col-lg-12 col-md-12 col-sm-12" style="background: black;color:white">
                      <div class="title text-center"><h3>Address Info</h3></div>
                    </div>
                	<div class="row">
						<div class="form-group col-lg-4 col-md-4 col-sm-12">
		                    <label for="country_id">Country</label>
		                   	<select class="form-control"   :class="{ 'is-invalid': form.errors.has('country_id') }" v-model="form.country_id">
		                   	  <option disabled value="">Select One</option>
		                      <option :value="cat.id" v-for="cat in getallCountry">{{cat.name}}</option>
		                    </select>
		                    <has-error :form="form" field="country_id"></has-error>
		                </div>
		                <div class="form-group col-lg-4 col-md-4 col-sm-12">
		                    <label for="city_id">City</label>
		                   	<select class="form-control"   :class="{ 'is-invalid': form.errors.has('city_id') }" v-model="form.city_id">
		                   	  <option disabled value="">Select One</option>
		                      <option :value="cat.id" v-for="cat in getallCity">{{cat.name}}</option>
		                    </select>
		                    <has-error :form="form" field="city_id"></has-error>
		                </div>
		                <div class="form-group col-lg-4 col-md-4 col-sm-12">
		                    <label for="district_id">District</label>
		                   	<select class="form-control"   :class="{ 'is-invalid': form.errors.has('district_id') }" v-model="form.district_id">
		                   	  <option disabled value="">Select One</option>
		                      <option :value="cat.id" v-for="cat in getallDistrict">{{cat.name}}</option>
		                    </select>
		                    <has-error :form="form" field="district_id"></has-error>
		                </div>
		            </div>
                    <div class="row">
		                <div class="form-group col-lg-4 col-md-4 col-sm-12">
							<label for="company_name">Company Name</label>
							<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" v-model="form.company_name" :class="{ 'is-invalid': form.errors.has('company_name') }">
							<has-error :form="form" field="company_name"></has-error>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-12">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Company Name" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }">
							<has-error :form="form" field="address"></has-error>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-12">
		                    <label for="category_id">Category</label>
		                   	<select class="form-control"   :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id">
		                   	  <option disabled value="">Select One</option>
		                      <option :value="cat.id" v-for="cat in getallCategory">{{cat.name}}</option>
		                    </select>
		                    <has-error :form="form" field="category_id"></has-error>
		                </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" style="background: black;color:white">
                      <div class="title text-center"><h3>Company Gallery</h3></div>
                    </div>

					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label for="exampleInputFile">File input</label>
						  <div class="input-group">
						    <div class="custom-file">
						      <input @change="changePhoto($event)" type="file" name="image" id="image" :class="{ 'is-invalid': form.errors.has('image') }">
						      <img :src="form.image" alt="show" width="100" height="100">
						       <has-error :form="form" field="image"></has-error>
						    </div>
						  </div>
						</div>
					</div>

					 <div class="col-lg-12 col-md-12 col-sm-12 form-control" style="background: black;color:white">
	                    <div class="title text-center"><h3>Detail Information</h3></div>
	                </div>
		             <div class="row">
	                  <div class="form-group col-lg-12">
	                       <textarea class="form-control" id="detail" name="detail" placeholder="Detailed Information" v-model="form.detail" :class="{ 'is-invalid': form.errors.has('detail') }"></textarea>
		                    <has-error :form="form" field="detail"></has-error>
	                  </div>
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
	     	country_id:'',
	     	city_id:'',
	     	district_id:'',
	        company_name: '',
	        address:'', 
	        category_id:'',
      		image:'',
      		detail:''
	      })
	    }
	},
    mounted(){
      this.$store.dispatch("showAdminCountry")
	  this.$store.dispatch("showAdminCity")
	  this.$store.dispatch("showAdminDistrict")
	  this.$store.dispatch("showAdminCategory")

      axios.get(`admin/member/${this.$route.params.id}/edit`)
      .then((response)=>{
        this.form.fill(response.data.product);
      })
      .catch((error)=>{
      	console.log(response.error);
      })
    },
    computed:{
	  getallCountry(){
        return this.$store.getters.getAdminCountry
      },
      getallCity(){
        return this.$store.getters.getAdminCity
      },
      getallDistrict(){
        return this.$store.getters.getAdminDistrict
      },
      getallCategory(){
        return this.$store.getters.getAdminCategory
      },
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
        this.form.post(`admin/member/update/${this.$route.params.id}`)
        .then((response)=>{
          Toast.fire({
            icon: 'success',
            title: 'Member Updated Successfully!'
          })
      })
        .catch(()=>{})
      },
    }
	};
</script>
<style scoped>

</style>

 
