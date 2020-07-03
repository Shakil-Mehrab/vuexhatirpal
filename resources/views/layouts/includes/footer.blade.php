<footer class="footer-area">
    <div class="footer-top-3 black-bg pt-75 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xl-4">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title-3">Contact Us</h3>
                        <div class="footer-info-wrapper-2">
                            <div class="footer-address-electro">
                                <div class="footer-info-icon2">
                                    <span>Address:</span>
                                </div>
                                <div class="footer-info-content2">
                                    <p>1048 Malibag Chaudhuripara Dhaka<br></p>
                                </div>
                            </div>
                            <div class="footer-address-electro">
                                <div class="footer-info-icon2">
                                    <span>Phone:</span>
                                </div>
                                <div class="footer-info-content2">
                                    <p>+8801400560808<br></p>
                                </div>
                            </div>
                            <div class="footer-address-electro">
                                <div class="footer-info-icon2">
                                    <span>Email:</span>
                                </div>
                                <div class="footer-info-content2">
                                    <p><a href="#">admin@hatirpal.com</a><br><a href="#"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xl-3">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title-3">My Account</h3>
                        <div class="footer-widget-content-3">
                            <ul>
                                <li><a href="/login">Login Hare. Already have an account?</a></li>
                                {{-- <li><a href="cart.html">Cart History</a></li> --}}
                                {{-- <li><a href="checkout.html"> Payment History</a></li> --}}
                                {{-- <li><a href="shop.html">Product Tracking</a></li> --}}
                                <li><a href="/register">Register</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-xl-2">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title-3">Information</h3>
                        <div class="footer-widget-content-3">
                            <ul>
                                <li><a href="/about/us">About Us</a></li>
                                <li><a href="/terms/condition">Terms And Condition</a></li>
                                <li><a href="/helpline">Support 24/24</a></li>
                                <li><a href="/helpline"> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xl-3">
                    <div class="footer-widget widget-right mb-40">
                        <h3 class="footer-widget-title-3">Service</h3>
                        <div class="footer-widget-content-3">
                            <ul>
                                <li><a href="/moneyback">Returns</a></li>
                                <li><a href="/how/to/order">Customers Service</a></li>
                                <li><a href="/how/to/order"> Hwo to Order a Product</a></li>
                                {{-- //grt route --}}
                                <li><a href="{{route('creat-payment')}}"> Pay by Paypal</a></li>
                                {{-- //post route --}}
                                <li>
                                    <form action="{{route('create-payment')}}" method='post'>
                                        @csrf
                                        <input type="submit" value="Pay by Paypa">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle black-bg-2 pt-35 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-car"></i>
                        </div>
                        <div class="footer-services-content">
                            <a href="#"><h3>Free Shipping</h3></a>
                            <p>Free Shipping on Bangladesh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-shield"></i>
                        </div>
                        <div class="footer-services-content">
                            <a href="/moneyback"><h3>Money Guarentee</h3></a>
                            <p>Free Shipping on Bangladesh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-headphones"></i>
                        </div>
                        <div class="footer-services-content">
                            <a href="/helpline"><h3>Online Support</h3></a>
                            <p>Free Shipping on Bangladesh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom  black-bg pt-25 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="footer-menu">
                        <nav>
                            <ul>
                                <li><a href="https://www.facebook.com/HatirPalCom-105488687708483/">facebook </a></li>
                                <li><a href="https://twitter.com/Md_Shakil_Sard"> twiter</a></li>
                                <li><a href="https://www.pinterest.com/smartaddons/">Pinterest</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="copyright f-right mrg-5">
                        <p>
                            Copyright © <a href="https://hatirpal.com">Hatirpal</a> @php echo date('Y');  @endphp Online Store. All Rights are Reserved by : Hatirpal Admin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- modal -->
<div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="pe-7s-close" aria-hidden="true"></span>
    </button>
    <div class="modal-dialog modal-compare-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                    <div class="table-content compare-style table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <a href="#">Remove <span>x</span></a>
                                        <img src="/assets/img/cart/4.jpg" alt="">
                                        <p>Blush Sequin Top </p>
                                        <span>$75.99</span>
                                        <a class="compare-btn" href="#">Add to cart</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Description </h4>
                                    </td>
                                    <td class="compare-dec compare-common">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has beenin the stand ard dummy text ever since the
                                            1500s, when an unknown printer took a galley</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Sku </h4>
                                    </td>
                                    <td class="product-none compare-common">
                                        <p>-</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Availability </h4>
                                    </td>
                                    <td class="compare-stock compare-common">
                                        <p>In stock</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Weight </h4>
                                    </td>
                                    <td class="compare-none compare-common">
                                        <p>-</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>Dimensions </h4>
                                    </td>
                                    <td class="compare-stock compare-common">
                                        <p>N/A</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>brand </h4>
                                    </td>
                                    <td class="compare-brand compare-common">
                                        <p>HasTech</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>color </h4>
                                    </td>
                                    <td class="compare-color compare-common">
                                        <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title">
                                        <h4>size </h4>
                                    </td>
                                    <td class="compare-size compare-common">
                                        <p>XS, S, M, L, XL, XXL </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="compare-title"></td>
                                    <td class="compare-price compare-common">
                                        <p>$75.99 </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

