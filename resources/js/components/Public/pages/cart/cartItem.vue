<template>
        <tr>
            <td class="product-remove"><a href="" @click.prevent="remove"><i class="pe-7s-close"></i></a></td>
            <td class="product-thumbnail" v-if="cart.attributes.image">
                <a href="#"><img :src="`storage/${cart.attributes.image}`" style="width:80px;height:80px" alt=""></a>
            </td><td v-else><img src="" style="width:80px;height:80px" alt=""></td>
            <td class="product-name"><a href="#">{{cart.name}}</a></td>
            <td class="product-price-cart"><span class="amount">$ {{cart.price*cart.quantity}}</span></td>
            <td class="product-quantity">
            <form  @submit.prevent="updateQty">
              <input type="number" :v-model="qty" min="1" :value="qty" @change="qtyValueChange($event)" >
              <button type="submit">Save</button>
            </form>
            </td>
        </tr>

</template>

<script>
export default {
  props: {
    cart: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
        qty:this.cart['quantity'],
    }
  },

    methods: {
        qtyValueChange(ev) {
            this.qty=ev.target.value;
            // this.updateQty();
        },
        remove() {
            this.$emit('removeItem', this.cart.id)
        },

        updateQty() {
            this.$emit('updateItem', this.cart.id, this.qty)
        },        

    }

};

</script>