<template>
  <div class="shakillock">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><router-link to="/">User Dashboard</router-link></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/">Dashboard</router-link></li>
              <li class="breadcrumb-item active">Create Membership</li>
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
              <div class="card-header">
                <h3 class="card-title" style="margin-left:40%">Create Membership</h3>
              </div>
              <form role="form"  @submit.prevent="addCategory()">
                <div class="card-body">
                  <div class="col-lg-12 col-md-12 col-sm-12" style="background: black;color:white">
                  <div class="title text-center"><h3>Address Info</h3></div>
                </div>
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                      <label for="country_id">Country</label>
                      <select class="form-control"   :class="{ 'is-invalid': form.errors.has('country_id') }" v-model="form.country_id" @change="SelectedCountrysCity">
                        <option disabled value="">Select One</option>
                          <option :value="cat.id" v-for="cat in getUserCountry">{{cat.name}}</option>
                        </select>
                        <has-error :form="form" field="country_id"></has-error>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                      <label for="city_id">City</label>
                      <select class="form-control"   :class="{ 'is-invalid': form.errors.has('city_id') }" v-model="form.city_id" @change="SelectedCitiysDistrict">
                        <option v-if="getUserCities!=''" disabled value="">Select One</option>
                        <option v-if="getUserCities!=''" :value="cat.id" v-for="cat in getUserCities">{{cat.name}}</option>
                        <option v-if="getUserCities==''" disabled value="">Select A Country With City</option>
                        </select>
                        <has-error :form="form" field="city_id"></has-error>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                      <label for="district_id">City</label>
                      <select class="form-control"   :class="{ 'is-invalid': form.errors.has('district_id') }" v-model="form.district_id">
                        <option v-if="getUserDistricts!=''" disabled value="">Select One</option>
                        <option v-if="getUserDistricts!=''" :value="cat.id" v-for="cat in getUserDistricts">{{cat.name}}</option>
                        <option v-if="getUserDistricts==''" disabled value="">Select A City With District</option>
                        </select>
                        <has-error :form="form" field="district_id"></has-error>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12" style="background: black;color:white">
                    <div class="title text-center"><h3>Basic Info</h3></div>
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
                      <select class="form-control"   :class="{ 'is-invalid': form.errors.has('category_id') }" v-model="form.category_id" @change="SelectedCountrysCity">
                        <option disabled value="">Select One</option>
                          <option :value="cat.id" v-for="cat in getUserCategory">{{cat.name}}</option>
                        </select>
                        <has-error :form="form" field="category_id"></has-error>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12" style="background: black;color:white">
                    <div class="title text-center"><h3>Company Gallery</h3></div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
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
                  <div class="col-lg-12 col-md-12 col-sm-12" style="background: black;color:white">
                      <div class="title text-center"><h3>Detail Information</h3></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <markdown-editor v-model="form.detail" :class="{ 'is-invalid': form.errors.has('detail') }"></markdown-editor>
                      <has-error :form="form" field="detail"></has-error>

                    </div>
                  </div>

                </div>
                <div class="card-footer">
                  <!-- <star-rating v-model="form.rating" :increment="0.5" :star-size="20"></star-rating> -->
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
          country_id:'',
          city_id:'',
          district_id:'',
          company_name:'',
          address:'',
          category_id:'',
          detail:'',
          image:''
        })
    }
  },
  mounted(){
    this.$store.dispatch("showUserCountry")
    this.$store.dispatch("showUserCategory")
  },
  computed:{
    getUserCountry(){
     return this.$store.getters.getUserCountry
    },
    getUserCities(){
      return this.$store.getters.getUserCities
    },
    getUserDistricts(){
      return this.$store.getters.getUserDistricts
    },
    getUserCategory(){
      return this.$store.getters.getUserCategory
    }
  },
  methods:{
    changePhoto(event){
        let file = event.target.files[0];
        let reader = new FileReader();
        reader.onload = event =>{
          this.form.image = event.target.result
          console.log(this.form.image);
        };
        reader.readAsDataURL(file);
      },
     SelectedCountrysCity(){
      console.log(this.form.country_id)
      this.$store.dispatch("showUserCity",this.form.country_id)

     },
     SelectedCitiysDistrict(){
      console.log(this.form.city_id)
      this.$store.dispatch("showUserDistrict",this.form.city_id)
     },
    addCategory(){
      // console.log(this.form.detail)
      this.form.post('user/membership')
      .then((response)=>{
        // this.$router.push('/admin/all/city')
        Toast.fire({
          icon: 'success',
          title: 'Membership Created!'
        })
      })
      .catch(()=>{})
    }
  }
};
</script>
<style scoped>

</style>

 
