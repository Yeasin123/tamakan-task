<script>

    //Addtocart code
   $(document).ready(function(){  
       countCart();
        sidecart();
           $('.addToCart').on('click',function(){
                var product_id = $(this).data('id');
                if (product_id) {
                  $.ajax({
                    url: "{{ url('addToCart/') }}/"+product_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) { 
                       countCart();
                       sidecart();
                       cartButton()
                       const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-start',
                       showConfirmButton: false,
                       timer: 3000,
                       timerProgressBar: true,
                       didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                       }
                       })
                   if($.isEmptyObject(data.error)){
                       Toast.fire({
                       icon: 'success',
                       title:data.success,
                       });
                    }
                    else{
                       Toast.fire({
                       icon: 'error',
                       title:data.error,
                       }); 
                    }    
               },
   
                  });
                 }
      
              });
   
            });
   
   
       //Cart Remove
       $(document).ready(function(){  
           countCart();
           sidecart();
           $('.cartRemove').on('click',function(){
                var cart_id = $(this).data('id');
                var delteCart = $(this);
                if (cart_id) {
                  $.ajax({
                    url: "{{ url('cartdestroy/') }}/"+cart_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) { 
                       countCart();
                       sidecart();
                       delteCart.closest('.cartTR').remove();
                       const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-start',
                       showConfirmButton: false,
                       timer: 3000,
                       timerProgressBar: true,
                       didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                       }
                       })
                   if($.isEmptyObject(data.error)){
                       Toast.fire({
                       icon: 'success',
                       title:data.success,
                       });
                    }
                    else{
                       Toast.fire({
                       icon: 'error',
                       title:data.error,
                       }); 
                    }    
               },
   
                  });
                 }
      
              });
   
            });
   
           
       // Add wishlist code
       $(document).ready(function(){  
           countWishlist();
           $('.addWishlist').on('click',function(){
                var product_id = $(this).data('id');
                if (product_id) {
                  $.ajax({
                    url: "{{ url('add/wishlist/') }}/"+product_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) { 
                       countWishlist();
                       const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-start',
                       showConfirmButton: false,
                       timer: 3000,
                       timerProgressBar: true,
                       didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                       }
                       });
                       
                   if($.isEmptyObject(data.error)){
                       Toast.fire({
                       icon: 'success',
                       title:data.success,
                       });
                   }
                      else{
                          Toast.fire({
                          icon: 'error',
                          title:data.error,
                          });
                      }    
                    },

                  });
                 }
   
                 else{
                    Toast.fire({
                    icon: 'error',
                    title:data.error,
                    });
                } 
      
              });
   
              function countWishlist()
              {
               $.ajax({
                url: "{{url('wishlist/count/')}}",
                data: "GET",
                dataType: "json",
                success: function (response) {
                    $('.countwishlist').html('');
                    $('.countwishlist').html(response.count);
                    console.log(response.count);
                }
                });
              }
   
            });
   
   
             // Remove wishlist code
       $(document).ready(function(){  
           countWishlist();
           $('.wishlistDelete').on('click',function(){
                var wishlist_id = $(this).data('id');
                var delteWish = $(this);
                if (wishlist_id) {
                  $.ajax({
                    url: "{{ url('wishlist/delete/') }}/"+wishlist_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) { 
                       countWishlist();
                       delteWish.closest('.wishTR').remove();
                       const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-end',
                       showConfirmButton: false,
                       timer: 3000,
                       timerProgressBar: true,
                       didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                       }
                       })
                   if($.isEmptyObject(data.error)){
                       Toast.fire({
                       icon: 'success',
                       title:data.success,
                       
                       });
                    }
                       else{
                           Toast.fire({
                           icon: 'error',
                           title:data.error,
                           });
                       }    
                    },
                    
                  });
                }

                else{
                    Toast.fire({
                    icon: 'error',
                    title:data.error,
                    });
                } 

              });
   
              function countWishlist()
              {
               $.ajax({
                url: "{{url('wishlist/count/')}}",
                data: "GET",
                dataType: "json",
                success: function (response) {
                    $('.countwishlist').html('');
                    $('.countwishlist').html(response.count);
                    console.log(response.count);
                }
                });
              }
   
        });





        //// All Methods /////


        function countCart()
          {
            $.ajax({
            url: "{{url('cart/count/')}}",
            data: "GET",
            dataType: "json",
            success: function (response) {
                $('.countCart').html('');
                $('.countCart').html(response.count);
                $('.cartTotal').html('');
                $('.cartTotal').html('Price:'+' '+response.cartTotal +'৳');
                console.log(response.count);
            }
            });
          }

        function sidecart()
            {   
              var cartTR = $('#cartTRS');
              $.ajax({
                  url: "{{url('/fixdcart/content')}}",
                  type:"GET",
                  dataType:"json",
                  success:function(data) { 
                    cartTR.empty();
                      console.log(data);
                      $.each(data.cartItems, function (key, val) {
                        var img = window.location.origin+'/images/product/'+val.options.images;
                        var productdetail = window.location.origin+'/productdetail/'+val.options.slug;
                        var cartremove = window.location.origin+'/cartdestroy/'+val.rowId;
                        
                        var cart = `<div class="align-items-center ">
                              <div class="thumb" id="productImage">
                              <a href="${productdetail}"><img src="${img}" width="90" alt="products"></a>
                              </div>
                              <div class="product-content">
                                  <a href="${productdetail}" id="cartContent" class="product-title">${val.name}</a>
                                  <div class="product-cart-info ">
                                      <p id="cartPrice">Price: ${val.price*val.qty}</p>

                                      <div class="price-increase-decrese-group d-flex">
                                        <span class="decrease-btn">
                                            <button type="button" class="btn quantity-left-minus" onclick="decrementtQty(this.id)" id="${val.rowId}">-
                                            </button> 
                                        </span>
                                        <input type="text" name="quantity" class="form-controls input-number" value="${val.qty}">
                                        <span class="increase">
                                            <button type="button" class="btn quantity-right-plus" onclick="incrementtQty(this.id)" id="${val.rowId}">+
                                            </button>
                                        </span>
                                      </div>
                                  </div>
                              </div>
                          </div>`;
                        cartTR.append(cart);
                    });
                  },
   
                  });
              }
 
            function incrementtQty(rowId)
              {
                var baseURL = window.location.origin;
               $.ajax({
                url: baseURL+"/cart/qty/increment/"+rowId,
                data: "GET",
                dataType: "json",
                success: function (response) {
                  sidecart();
                  countCart();
                  cartButton();
                }
                });
              }

              function decrementtQty(rowId)
              {
                var baseURL = window.location.origin;
               $.ajax({
                url: baseURL+"/cart/qty/decrement/"+rowId,
                data: "GET",
                dataType: "json",
                success: function (response) {
                  sidecart();
                  countCart()
                    console.log(response);
                }
                });
              }

              function cartButton()
            {   
              var cartTRClass = $('.cartQtyClass');
              $.ajax({
                  url: "{{url('/fixdcart/content')}}",
                  type:"GET",
                  dataType:"json",
                  success:function(data) { 
                    cartTRClass.empty();
                      sidecart();
                      countCart();
                      console.log(data);
                        var cart = `
                        <div class="price-increase-decrese-group d-flex">
                            <span class="decrease-btn">
                                <button type="button" class="btn quantity-left-minus" onclick="decrementtQty(this.id)" id="${val.rowId}">-
                                </button> 
                            </span>
                            <input type="text" name="quantity" class="form-controls input-number" value="${val.qty}">
                            <span class="increase">
                                <button type="button" class="btn quantity-right-plus" onclick="incrementtQty(this.id)" id="${val.rowId}">+
                                </button>
                            </span>
                          </div>
                        `;
                        cartTRClass.append(cart);
                    
                  },
   
                  });
              }
            
       $('body').on('keyup','#searchboxClass',function(){
        const  baseUrlSite= window.location.origin;
        let searchvalue = $('#searchboxClass').val();
        console.log(searchvalue);
        if(searchvalue.length > 0){
          $.ajax({
          type: "GET",
          url: baseUrlSite+"/product/ajax/search/",
          data: {searchbox: searchvalue},
          success: function (result) {
            $('.searchItemDiv').html(result);
          }
        });
      }
      if(searchvalue.length < 1){
        $('.searchItemDiv').html('');

      }
    
      });

    
      function show_search_div(){
        $('.searchItemDiv').slideDown();
       
      }

    function hide_search_div(){
        $('.searchItemDiv').slideUp();
        
    }

    $('body').on('keyup','#searchMobileAjax',function(){
        const  baseUrlSite=window.location.origin;
        let searchvMobileValue = $('#searchMobileAjax').val();
        console.log(searchvMobileValue);
        if(searchvMobileValue.length > 0){
          $.ajax({
          type: "GET",
          url: baseUrlSite+"/product/ajax/search/mobile",
          data: {searchMobilebox: searchvMobileValue},
          success: function (result) {
            $('.searchItemDiv').html(result);
          }
        });
      }
      if(searchvMobileValue.length < 1){
        $('.searchItemDiv').html('');

      }
    
      });
  
   </script>

