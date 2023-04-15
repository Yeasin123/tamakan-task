<div id="sitebar-cart" class="sitebar-cart" >
    <div class="sc-head d-flex justify-content-between align-items-center">
        <div class="cart-count"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="20px" height="20px" viewBox="0 0 472.337 472.336" style="enable-background:new 0 0 472.337 472.336;"
            xml:space="preserve"><path d="M406.113,126.627c0-5.554-4.499-10.05-10.053-10.05h-76.377V91.715C319.684,41.143,278.543,0,227.969,0
               c-50.573,0-91.713,41.143-91.713,91.715v24.862H70.45c-5.549,0-10.05,4.497-10.05,10.05L3.914,462.284
               c0,5.554,4.497,10.053,10.055,10.053h444.397c5.554,0,10.057-4.499,10.057-10.053L406.113,126.627z M156.352,91.715
               c0-39.49,32.13-71.614,71.612-71.614c39.49,0,71.618,32.13,71.618,71.614v24.862h-143.23V91.715z M146.402,214.625
               c-9.92,0-17.959-8.044-17.959-17.961c0-7.269,4.34-13.5,10.552-16.325v17.994h14.337v-18.237
               c6.476,2.709,11.031,9.104,11.031,16.568C164.363,206.586,156.319,214.625,146.402,214.625z M310.484,214.625
               c-9.922,0-17.959-8.044-17.959-17.961c0-7.269,4.341-13.495,10.548-16.325v17.994h14.338v-18.241
               c6.478,2.714,11.037,9.108,11.037,16.568C328.448,206.586,320.407,214.625,310.484,214.625z"/></svg>
               <span class="countCart"> Item</span>
            </div>
            <span onclick="cartclose()" class="close-icon"><i class="fas fa-times"></i></span>
    </div>
    <div class="cart-product-container">
      <div class="cart-product-item" id="cartTRS">
    
      </div>

    </div>
    <div class="cart-footer">
        <div class="cart-total">
            <p class="total-price d-flex justify-content-between">
                <span>Total</span> 
                <span class="cartTotal"> ৳</span>
            </p>
            <a href="{{route('cartPage')}}" class="procced-checkout mb-1"><i class="fas fa-shopping-basket"></i> View Cart</a>
            <a href="{{route('checkoutPage')}}" class="procced-checkout">Place Order</a>
        </div>
    </div>
</div>

