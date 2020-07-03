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
                  <li class="breadcrumb-item active">Order</li>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <div class="row" v-for="category in getallCountry">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                      <h6><span style="color:#00C0EF"><i class="fa fa-user"></i> Order By</span> : <strong>{{category.user.name}}</strong></h6>
                      <h6><span style="color:#00C0EF"><i class="fa fa-mobile"></i> Orderer Contact No</span> : <strong>{{category.user.phone}}</strong></h6>
                      <h6><span style="color:#00C0EF"><i class="fas fa-dollar-sign"></i> Total Price</span> : <strong>$ {{category.total}}</strong></h6>
                      <h6><span style="color:#00C0EF"><i class="fas fa-clock"></i> Date</span> : <strong> {{category.created_at|timeformat}}</strong></h6>
                    <div class="card-tools">
                       <h6><span style="color:#00C0EF"><i class="fa fa-phone"></i> Customer Contact No</span>  : <strong> {{category.address.phone_no}}</strong></h6>
                      <h6><span style="color:#00C0EF"><i class="fab fa-paypal"></i> Payment Method</span> : <strong>  {{category.payment_method}}</strong></h6>
                       <h6><span style="color:#00C0EF"><i class="fas fa-map-signs"></i> Address</span> : <strong> {{category.address.address}}</strong></h6>
                       <h6 if="category.transaction_no>0">
                           <span style="color:#00C0EF"><i class="fas fa-map-signs"></i> Transaction No</span> : <strong> {{category.transaction_no}}</strong>
                        </h6>
                        <div if="category.transaction_no==0">
                        <form action="" class="checkout woocommerce-checkout" method="post" name="checkout">
                            <div class="row">
                               <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="transaction_no" id="transaction_no" placeholder="Enter Transaction No" value="" required>   
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="Submit" class="btn btn-success btn-sm" value="Submit">
                               </div>
                           </div>
                        </form>
                        </div>
                         
                    </div><br>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Owner Contact No</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                      <th> 
                        <router-link to=""><button class="btn btn-primary btn-sm">Edit</button></router-link> 
                        <router-link :to="`/admin/edit/district/${category.id}`"><button class="btn btn-primary btn-sm">{{category.delivered==0?"Change to Deliver":"Change to Pending"}}</button></router-link> 
                        <a href="" @click.prevent="deleteProduct(category.id)"><button class="btn btn-danger btn-sm">Delete</button></a>
                    </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="cat in category.orders_products">
                      <td>{{category.id}}</td>
                      <td><img :src="cat.product.image1" style="max-height:40px;min-height: 40px;max-width: 40px;min-width: 40px"></td>
                      <td>{{cat.product.name}}</td>
                      <td>{{cat.product.user.phone}}</td>
                      <td>{{cat.qty}}</td>
                      <td>{{cat.product.price}}</td>
                      <td>{{cat.qty*cat.product.price}}</td>
                      <td>
                       
                      </td>
                    </tr>
                    </tbody>
                  </table>
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
    mounted(){
    this.$store.dispatch("showAdminDeliveredOrder")
    },
    computed:{
      getallCountry(){
        return this.$store.getters.getAdminDeliveredOrder
      }
    },
    methods:{
      deleteProduct(id){
        axios.get('/admin/order/delete/'+id)
        .then(()=>{
            this.$store.dispatch("showAdminDeliveredOrder")
            Toast.fire({
            icon: 'success',
            title: 'Order Deleted Successfully!'
          })
        })
        .catch(()=>{})
      }
    }
};
</script>

<style scoped>

</style>

 
