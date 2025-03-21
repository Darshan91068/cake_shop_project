$(document).ready(function () {
    $(".add_to_cart").click(function (e) {
        e.preventDefault(); // Prevent default behavior

        let productId = $(this).data("id");

        // Show SweetAlert confirmation
        Swal.fire({
            title: "Add to Cart?",
            text: "Are you sure you want to add this product to your cart?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Add to Cart",
            cancelButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
                // If user clicks "Yes", send AJAX request to add item to cart
                $.ajax({
                    url: "/add-to-cart", // Direct URL instead of Blade syntax
                    type: "POST",
                    data: {
                        product_id: productId,
                        product_qty: 1, // Default to 1 quantity
                        _token: $('meta[name="csrf-token"]').attr("content"), // Get CSRF token
                    },
                    success: function (response) {
                        if (response.status === "success") {
                            // Show success message
                            Swal.fire({
                                title: "Added!",
                                text: response.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false,
                            });

                            // Update cart count dynamically without refresh
                            $(".cart-count").text(response.cart_count);
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            title: "Oops!",
                            text: "Something went wrong, please try again.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });

    // Function to fetch and update cart count dynamically
    function updateCartCount() {
        $.ajax({
            url: "/cart/count", // Ensure this matches your Laravel route
            type: "GET",
            success: function (response) {
                if (response.cart_count !== undefined) {
                    $(".cart-count").text(response.cart_count); // Update cart count
                }
            },
            error: function () {
                console.log("Error fetching cart count.");
            },
        });
    }

    // Update cart count every 5 seconds dynamically
    setInterval(updateCartCount, 5000);

    // Update cart count initially when page loads
    updateCartCount();

    //Show Cart Data
    function loadCart() {
        $.ajax({
            url: "/cart",
            method: "GET",
            dataType: "json",
            success: function (response) {
                let cartHtml = "";
                var totalPrice = 0; // Initialize total price

                if (response.cartItems.length > 0) {
                    $.each(response.cartItems, function (index, item) {
                        var itemTotal =
                            item.product.product_price * item.product_qty; // Calculate item total
                        totalPrice += itemTotal; // Add to total price
                        cartHtml += `
                            <tr>
                                <td>
                                    <img src="${item.product.pro_img}" alt="${
                            item.product.pro_name
                        }" width="100" height="100">
                                </td>
                                <td class="fetch_product_name" data-name="${
                                    item.product.pro_name
                                }">${item.product.pro_name}</td>
                                <td class="item-price">Rs.${parseFloat(
                                    item.product.product_price
                                ).toFixed(2)}</td>
                               <td>
                                    <input type="number" class="cart-quantity" data-id="${
                                        item.id
                                    }" value="${
                            item.product_qty
                        }" min="1" style="width:40px;height:40px;border:1px solid #eaeaea;">
                                </td>
                                <td class="item-total">Rs.${itemTotal.toFixed(
                                    2
                                )}</td>

                                <td>
                                    <button class="btn btn-danger delete-cart-item" data-id="${
                                        item.id
                                    }">X</button>
                                </td>
                            </tr>`;
                    });
                    $(".btn_checkout").show();
                } else {
                    cartHtml = `<tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>`;
                    totalPrice = 0; // Set total price to 0 when cart is empty
                    $(".btn_checkout").hide();
                }
                $(".cart_total_text .total h4 span").text(
                    `Rs.${totalPrice.toFixed(2)}`
                );
                $("#cart-items").html(cartHtml);
            },
            error: function () {
                console.log("Failed to fetch cart data.");
            },
        });
    }

    loadCart(); // Load cart on page load

    //Cart Item Delete
    $(document).on("click", ".delete-cart-item", function (e) {
        e.preventDefault();
        var encodedId = $(this).data("id"); // Ensure this matches the encoded ID

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to undo this action!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/cart/remove/" + encodedId,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // CSRF token
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire("Deleted!", response.message, "success");
                            $("#cart-item-" + response.decoded_id).fadeOut(
                                500,
                                function () {
                                    $(this).remove();
                                }
                            );
                        } else {
                            Swal.fire("Error!", response.message, "error");
                        }
                        loadCart();
                    },
                    error: function () {
                        Swal.fire("Error!", "Failed to remove item.", "error");
                    },
                });
            }
        });
    });

    // Update Item Total Dynamically on Quantity Change
    $(document).on("input", ".cart-quantity", function () {
        let quantity = $(this).val(); // Get updated quantity
        let itemId = $(this).data("id"); // Get item ID
        let price = parseFloat(
            $(this).closest("tr").find(".item-price").text().replace("Rs.", "")
        ); // Get item price

        if (quantity < 1) {
            quantity = 1; // Prevent invalid values
            $(this).val(1);
        }

        let itemTotal = price * quantity; // Calculate new total

        // Update the item's total price in the table
        $(this)
            .closest("tr")
            .find(".item-total")
            .text(`Rs.${itemTotal.toFixed(2)}`);

        updateCartTotal(); // Update cart total dynamically
    });

    // Function to Update the Cart Total
    function updateCartTotal() {
        let totalPrice = 0;

        $(".cart-quantity").each(function () {
            let quantity = $(this).val();
            let price = parseFloat(
                $(this)
                    .closest("tr")
                    .find(".item-price")
                    .text()
                    .replace("Rs.", "")
            );
            totalPrice += price * quantity;
        });

        // Update cart total text
        $(".cart_total_text .total h4 span").text(
            `Rs.${totalPrice.toFixed(2)}`
        );

        // Hide checkout button if cart is empty
        if (totalPrice === 0) {
            $(".cart_footer").hide();
        } else {
            $(".cart_footer").show();
        }
    }

    // //Checkout button
    $(document).on("click", ".btn_checkout", function (e) {
        e.preventDefault();

        var grandTotal = $(".cart_total_text .total h4 span")
            .text()
            .replace("Rs.", "")
            .trim(); // Get grand total

        // console.log(grandTotal);
        let products = [];

        // Loop through cart items and extract data
        $("#cart-items tr").each(function () {
            var productId = $(this).find(".cart-quantity").data("id"); // Cart ID
            var quantity = $(this).find(".cart-quantity").val(); // Quantity
            var fetch_pro_name = $(this)
                .find(".fetch_product_name")
                .data("name"); // Quantity
            var price = $(this)
                .find(".item-price")
                .text()
                .replace("Rs.", "")
                .trim(); // Product Price

                console.log(fetch_pro_name);
            products.push({
                cart_id: productId,
                pro_qty: quantity,
                pro_price: price,
                pro_name: fetch_pro_name,
            });
        });

        $.ajax({
            url: "/checkout",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"), // CSRF Token
                grand_total: grandTotal,
                products: products, // Send array of products
            },
            success: function (response) {
                if (response.redirect_url) {
                    window.location.href = response.redirect_url; // Redirect to checkout page
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {
                alert("Checkout failed. Please try again.");
            },
        });
    });
});
