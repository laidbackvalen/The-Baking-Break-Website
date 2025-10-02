document.addEventListener("DOMContentLoaded", () => {
    // Select HTML elements
    const cartItemsContainer = document.getElementById("cartItems");
    const totalQtyElem = document.getElementById("totalQty");
    const totalPriceElem = document.getElementById("totalPrice");
    const backToCartBtn = document.getElementById("backToCart");
    const proceedPaymentBtn = document.getElementById("proceedPayment");

    // Get cart data from localStorage
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    let totalQty = 0;
    let totalPrice = 0;

    // Loop through cart items and render them
    cart.forEach(item => {
        const product = productsData.find(p => p.id === item.product_id);
        if (!product) return; // safety check

        totalQty += item.quantity;
        totalPrice += product.price * item.quantity;

        const itemDiv = document.createElement("div");
        itemDiv.classList.add("cart-item");

        itemDiv.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <div class="cart-item-details">
                <h4>${product.name}</h4>
                <p>Price: Rs ${product.price}</p>
                <p>Quantity: ${item.quantity}</p>
            </div>
            <div class="item-total">Rs ${(product.price * item.quantity).toFixed(2)}</div>
        `;

        cartItemsContainer.appendChild(itemDiv);
    });

    // Update totals
    totalQtyElem.textContent = totalQty;
    totalPriceElem.textContent = totalPrice.toFixed(2);

    // Back to cart button
    backToCartBtn.addEventListener("click", () => {
        window.location.href = "cart.html";
    });

    // Proceed to payment button
    proceedPaymentBtn.addEventListener("click", () => {
        alert("Redirecting to payment page...");
        // Here you can redirect to a payment page
    });
});
