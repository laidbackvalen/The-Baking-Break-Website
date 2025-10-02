// Product data stored in JSON format (direct JSON for demonstration)
const productsData = [
  {
    id: "1",
    name: "Food Flavour Essence",
    description:"A silicon mould perfect for making chocolate bars with 9 pieces.",
    image: "image/cold, smooth & tasty. (83).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "2",
    name: "Turning Table ",
    description: "Another silicon mould with 9 pieces for chocolate lovers.",
    image: "image/cold, smooth & tasty. (12).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "3",
    name: "Nozzles",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (155).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "4",
    name: "Baking Pan",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (156).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "5",
    name: "Plastic Moulds",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (165).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "6",
    name: "Bar Moulds",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (178).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "7",
    name: "Fondant Cutters",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (18).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "8",
    name: "Cartoon Moulds",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (190).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "9",
    name: "Cupcake Mould",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (3).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "10",
    name: "Baking Tool",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (40).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "11",
    name: "Cake Topper",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (6).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "12",
    name: "Doraemon Moulds",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (60).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "13",
    name: "Love Themed Moulds",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (62).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "14",
    name: "Birthday Toppers",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (72).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "15",
    name: "Spray Color Bottle",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (79).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "16",
    name: "Sprinkler",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/BHEJ DE/cold, smooth & tasty. (20).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "17",
    name: "Knives",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (172).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "18",
    name: "Measure cup",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/Untitled design (4).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
  {
    id: "19",
    name: "Curtain foil",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/Untitled design (13).png",
    price:230,
    discount: "Minimum 20% Off",
  },
  {
    id: "20",
    name: "Cake Tin",
    description:"Perfect for chocolate bar lovers, create your own with this silicon mould.",
    image: "image/cold, smooth & tasty. (54).png",
    price: 230,
    discount: "Minimum 20% Off",
  },
];

// Global cart array
let cart = [];

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
