import publicHome from './components/Public/PublicHome.vue';
import cart from './components/Public/pages/cart/cart.vue';
import cartCheckout from './components/Public/pages/cart/checkout.vue';
import singlePost from './components/Public/pages/products/singleProduct.vue';
import createShop from './components/Public/pages/shops/create.vue';
import categoryProduct from './components/Public/pages/products/catProduct.vue';
import discountProduct from './components/Public/pages/products/discountProduct.vue';

import searchProduct from './components/Public/pages/products/search.vue';
import wishList from './components/Public/pages/products/wish.vue';
import compareList from './components/Public/pages/products/compare.vue';
import paypal from './components/Public/pages/cart/paypal.vue';







export const routes = [
  { path: '/', component: publicHome },
  { path: '/cart', component: cart },
  { path: '/cart/checkout', component: cartCheckout },
  { path: '/single/product/:id', component: singlePost},
  { path: '/create/your/shop', component: createShop},
  { path: '/category/product/:id', component: categoryProduct},
  { path: '/discount/product/:id', component: discountProduct},

  { path: '/user/nav/search', component: searchProduct},
  { path: '/wish/list', component: wishList},
  { path: '/compare/list', component: compareList},
  { path: '/paypal', component: paypal},






]
