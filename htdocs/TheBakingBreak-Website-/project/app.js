let productsData = []; // initially empty
let cart = [];

// Fetch products dynamically from your database
fetch("get-products.php")
  .then((response) => response.json())
  .then((data) => {
    productsData = data;
    initApp(); // start the app only after products are loaded
  })
  .catch((error) => {
    console.error("Error fetching products:", error);
  });


// Select HTML elements
let listProductHTML = document.querySelector(".listProduct");
let listCartHTML = document.querySelector(".listCart");
let iconCart = document.querySelector(".icon-cart");
let iconCartSpan = document.querySelector(".icon-cart span");
let body = document.querySelector("body");
let closeCart = document.querySelector(".close");

// Event listener for toggling the cart view
iconCart.addEventListener("click", () => {
  body.classList.toggle("showCart");
});

// Event listener for closing the cart
closeCart.addEventListener("click", () => {
  body.classList.toggle("showCart");
});

// Function to add products to the HTML
const addDataToHTML = () => {
  listProductHTML.innerHTML = "";
  productsData.forEach((product) => {
    let newProduct = document.createElement("div");
    newProduct.dataset.id = product.id;
    newProduct.classList.add("item");
    newProduct.innerHTML = `
      <img src="${product.image}" alt="${product.name}">
      <h2>${product.name}</h2>
      <div class="price">Rs${product.price}</div>
      <button class="addCart">Add To Cart</button>
    `;
    listProductHTML.appendChild(newProduct);
  });
};

// Event listener for adding products to cart
listProductHTML.addEventListener("click", (event) => {
  let positionClick = event.target;
  if (positionClick.classList.contains("addCart")) {
    let id_product = positionClick.parentElement.dataset.id;
    addToCart(id_product);
  }
});

// Function to add product to cart
const addToCart = (product_id) => {
  let positionThisProductInCart = cart.findIndex(
    (value) => value.product_id == product_id
  );

  if (cart.length <= 0) {
    cart = [{ product_id: product_id, quantity: 1 }];
  } else if (positionThisProductInCart < 0) {
    cart.push({ product_id: product_id, quantity: 1 });
  } else {
    cart[positionThisProductInCart].quantity =
      cart[positionThisProductInCart].quantity + 1;
  }

  addCartToHTML();
  addCartToMemory();
};

// Save cart to localStorage
const addCartToMemory = () => {
  localStorage.setItem("cart", JSON.stringify(cart));
};

// Function to update the cart HTML
const addCartToHTML = () => {
  listCartHTML.innerHTML = "";
  let totalQuantity = 0;

  if (cart.length > 0) {
    cart.forEach((item) => {
      totalQuantity = totalQuantity + item.quantity;

      let newItem = document.createElement("div");
      newItem.classList.add("item");
      newItem.dataset.id = item.product_id;

      let positionProduct = productsData.findIndex(
        (value) => value.id == item.product_id
      );

      if (positionProduct === -1) return; // Safety check if product not found

      let info = productsData[positionProduct];

      newItem.innerHTML = `
        <div class="image">
          <img src="${info.image}" alt="${info.name}">
        </div>
        <div class="name">${info.name}</div>
        <div class="totalPrice">Rs${info.price * item.quantity}</div>
        <div class="quantity">
          <span class="minus">&lt;</span>
          <span>${item.quantity}</span>
          <span class="plus">&gt;</span>
        </div>
      `;
      listCartHTML.appendChild(newItem);
    });
  }

  iconCartSpan.innerText = totalQuantity;
};

// Event listener for updating quantity in cart (Add or Subtract)
listCartHTML.addEventListener("click", (event) => {
  let positionClick = event.target;

  if (
    positionClick.classList.contains("minus") ||
    positionClick.classList.contains("plus")
  ) {
    let product_id = positionClick.parentElement.parentElement.dataset.id;
    let type = positionClick.classList.contains("plus") ? "plus" : "minus";
    changeQuantityCart(product_id, type);
  }
});

// Function to change product quantity in the cart
const changeQuantityCart = (product_id, type) => {
  let positionItemInCart = cart.findIndex(
    (value) => value.product_id == product_id
  );

  if (positionItemInCart >= 0) {
    if (type === "plus") {
      cart[positionItemInCart].quantity += 1;
    } else {
      let changeQuantity = cart[positionItemInCart].quantity - 1;
      if (changeQuantity > 0) {
        cart[positionItemInCart].quantity = changeQuantity;
      } else {
        cart.splice(positionItemInCart, 1);
      }
    }
  }

  addCartToHTML();
  addCartToMemory();
};

// Initialize the app by loading products and cart data
const initApp = () => {
  addDataToHTML();
  if (localStorage.getItem("cart")) {
    cart = JSON.parse(localStorage.getItem("cart"));
    addCartToHTML();
  }
};


initApp();

document.addEventListener("DOMContentLoaded", () => {
    const checkoutBtn = document.querySelector(".checkOut");

    if (checkoutBtn) {
        checkoutBtn.addEventListener("click", () => {
            // Save cart data to localStorage
            localStorage.setItem("cart", JSON.stringify(cart));

            // Redirect to checkout page
            window.location.href = "checkout.html";
        });
    }
});
