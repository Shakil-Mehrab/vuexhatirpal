<template>
  <div class="root-cart-item">
    <div class="container-cart-left">
      <div class="cart-img-wrapper">
          <img :src="item.url_thumbnail" />
      </div>
      <div class="cart-title-wrapper">
        <div class="title-wrapper">
          <h3>{{ getProductbrand }}</h3>
          <p>{{ item.product_name }}</p>
        </div>
      </div>
    </div>

    <div class="container-cart-right">
      <div class="cart-amount-wrapper">
        <number-input v-model="singleCart.amount" :min="1" :max="singleCart.stok" inline center controls></number-input>
      </div>
      <div class="cart-price-wrapper">
        <p>{{  getProductTotalPrice  }}</p>
      </div>
      <div class="cart-delete-wrapper">
        <img src="../assets/delete.svg"/>
      </div>
    </div> 

  </div>
</template>

<script>
import ProductImage from './product-image'
import VueNumberInput from '@chenfengyuan/vue-number-input';

export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      singleCart: {
        stok: 15,
        amount: 1,
        totalPrice: 0
      }
    }
  },
  computed: {
    getProductbrand: function () {
      let splittedName = this.item.product_name.split(' ')
      return splittedName[0]
    },
    getProductTotalPrice: function () {
      var x = this.singleCart.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      var totalPrice = `Rp. ${x}`
      return totalPrice
    }
  },
  watch: {
    'singleCart.amount': {
      handler: function () {
        this.singleCart.totalPrice = this.singleCart.price * this.singleCart.amount
      },
      deep: true
    }
  },
  components: {
    'product-image': ProductImage,
    'number-input': VueNumberInput
  }
};
</script>>
<!-- and if anyone wondering, this is my cart store:

const state = {
  cartItem: []
}

const getters = {
  getAllCartItem: (state) => {
    return state.cartItem
  }
}

const mutations = {
  updateCartItem: (state, cart) => {
    state.cartItems = cart
  }
}

const actions = {
  checkCartItem: ({ commit }) => {
    let item = JSON.parse(localStorage.getItem('cart'))
    if (cart) {
      commit('updateCartItem', item)
    } 
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
} -->