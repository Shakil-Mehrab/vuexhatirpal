<template>
<div id='cartLoad'>
    <NavLoad/>
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
                    <h1 class="cart-heading">
                        <!-- <a href="" @click="deleteCategory()"><button class="btn btn-danger btn-sm">Delete</button></a> -->
                        <a href="/paypal/button" class="btn btn-success form-control">Go to payment by Paypal</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import NavLoad from "./../../includes/nav.vue"

export default {
    name: "PublicHome",

    components:{
      NavLoad
    },
        data () {
        return {
            form: new Form({
            shipping_fullname: 'yes',
            })
        }
    },
    computed:{
    },
    methods:{
        deleteCategory(){
            console.log('ok')
            axios.get('/creat-payment')
            .then((response)=>{

                // if(this.form.payment_method=='paypal'){
                //     this.$router.push('/paypal')
                // }else{
                //     this.$router.push('/')
                // }

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Order Has Been Palces Succecfully!'
            // })
            }).catch(()=>{})
        },

    },
    mounted(){
    },
};
</script>

<style scoped>

</style>

