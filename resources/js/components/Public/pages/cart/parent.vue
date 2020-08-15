<template>
  <div class="cart-container">
    <h1 class="cart-title-page">Keranjang Anda</h1>
    <div class="cart-item-container">
      <cart-item v-for="(data, i) in cartData" :item="data" :key="i" />
    </div>
    <div class="cart-total-wrapper">
      <div class="total-text-wrapper">
        <p>Total</p>
      </div>
      <div class="total-amount-wrapper">
        <p>Rp. 150.000.000</p>
      </div>
    </div>
  </div>
</template>

<script>
import CartItem from '@/components/cart-item'

export default {
  data() {
    return {
      cartData: [
        {
          product_name: 'vario ZS1',
          price: 1000000,
          url_thumbnail: 'https://cdn3.imggmi.com/uploads/2019/10/8/9e27ca9046031f6f21850be39b379075-full.png',
          color: '#fff'
        },
        {
          product_name: 'vario ZS1',
          price: 1000000,
          url_thumbnail: 'https://cdn3.imggmi.com/uploads/2019/10/8/9e27ca9046031f6f21850be39b379075-full.png',
          color: '#fff'
        },
        {
          product_name: 'vario ZS1',
          price: 1000000,
          url_thumbnail: 'https://cdn3.imggmi.com/uploads/2019/10/8/9e27ca9046031f6f21850be39b379075-full.png',
          color: '#fff'
        }
      ]
    }
  },
  methods: {
    getAllCartItem () {
      this.$store.dispatch('cart/checkCartItem')
      this.cartData = this.$store.state.cart.cartItem
    }
  },
  created () {
    this.getAllCartItem ()
  },
  components: {
    'cart-item': CartItem
  }
}
</script>