// Product data stored in JSON format (direct JSON for demonstration)
const productsData = [
    {
        "id": "1",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "A silicon mould perfect for making chocolate bars with 9 pieces.",
        "image": "image/cold, smooth & tasty. (83).png",
        "price": 15.99,
        "discount": "Minimum 20% Off"
    },
    {
        "id": "2",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Another silicon mould with 9 pieces for chocolate lovers.",
        "image": "image/cold, smooth & tasty. (12).png",
        "price": 12.99,
        "discount": "Minimum 20% Off"
    },
    {
        "id": "3",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (155).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },
    {
        "id": "4",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (156).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "5",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (165).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "6",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (178).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "7",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (18).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "8",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (190).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "9",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (3).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "10",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (40).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "11",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (6).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "12",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (60).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "13",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (62).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "14",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (72).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "15",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (79).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "16",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/heather-ford-Fq54FqucgCE-unsplash.jpg",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "17",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/deva-williamson-pZZJwwNPy2k-unsplash.jpg",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "18",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/annie-spratt-6SHd7Q-l1UQ-unsplash.jpg",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "19",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/meritt-thomas-zURPcpLoKA4-unsplash.jpg",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },{
        "id": "20",
        "name": "9 Piece Chocolate Bar Silicon Mould",
        "description": "Perfect for chocolate bar lovers, create your own with this silicon mould.",
        "image": "image/cold, smooth & tasty. (155).png",
        "price": 19.99,
        "discount": "Minimum 20% Off"
    },
    
];

// Global cart array
let cart = [];

// Select HTML elements
let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCart = document.querySelector('.icon-cart');
let iconCartSpan = document.querySelector('.icon-cart span');
let body = document.querySelector('body');
let closeCart = document.querySelector('.close');

// Event listener for toggling the cart view
iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

// Event listener for closing the cart
closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

// Function to add products to the HTML
const addDataToHTML = () => {
    // Remove existing products from HTML
    listProductHTML.innerHTML = '';

    // Add new products dynamically
    productsData.forEach(product => {
        let newProduct = document.createElement('div');
        newProduct.dataset.id = product.id;
        newProduct.classList.add('item');
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
listProductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')) {
        let id_product = positionClick.parentElement.dataset.id;
        addToCart(id_product);
    }
});

// Function to add product to cart
const addToCart = (product_id) => {
    let positionThisProductInCart = cart.findIndex((value) => value.product_id == product_id);
    if (cart.length <= 0) {
        cart = [{
            product_id: product_id,
            quantity: 1
        }];
    } else if (positionThisProductInCart < 0) {
        cart.push({
            product_id: product_id,
            quantity: 1
        });
    } else {
        cart[positionThisProductInCart].quantity = cart[positionThisProductInCart].quantity + 1;
    }
    addCartToHTML();
    addCartToMemory();
};

// Save cart to localStorage
const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

// Function to update the cart HTML
const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    if (cart.length > 0) {
        cart.forEach(item => {
            totalQuantity = totalQuantity + item.quantity;
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.id = item.product_id;

            let positionProduct = productsData.findIndex((value) => value.id == item.product_id);
            let info = productsData[positionProduct];
            listCartHTML.appendChild(newItem);
            newItem.innerHTML = `
                <div class="image">
                    <img src="${info.image}" alt="${info.name}">
                </div>
                <div class="name">${info.name}</div>
                <div class="totalPrice">$${info.price * item.quantity}</div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>${item.quantity}</span>
                    <span class="plus">></span>
                </div>
            `;
        });
    }
    iconCartSpan.innerText = totalQuantity;
};

// Event listener for updating quantity in cart
// Event listener for updating quantity in cart (Add or Subtract)
listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
        let product_id = positionClick.parentElement.parentElement.dataset.id;  // Get product ID
        let type = 'minus';
        if (positionClick.classList.contains('plus')) {
            type = 'plus';  // If clicked on "plus", set the type to 'plus'
        }
        changeQuantityCart(product_id, type);  // Change the quantity in the cart
    }
}); // Fixed missing closing parenthesis

// Function to change product quantity in the cart
const changeQuantityCart = (product_id, type) => {
    // Find the product in the cart by its ID
    let positionItemInCart = cart.findIndex((value) => value.product_id == product_id);
    if (positionItemInCart >= 0) {
        // Get the current product info from the cart
        let info = cart[positionItemInCart];
        switch (type) {
            case 'plus':
                cart[positionItemInCart].quantity += 1;  // Increase quantity if type is 'plus'
                break;
            default:
                let changeQuantity = cart[positionItemInCart].quantity - 1;  // Decrease quantity if type is 'minus'
                if (changeQuantity > 0) {
                    cart[positionItemInCart].quantity = changeQuantity;  // Set the updated quantity
                } else {
                    cart.splice(positionItemInCart, 1);  // Remove product from cart if quantity is zero or less
                }
                break;
        }
    }
    addCartToHTML();  // Update cart display
    addCartToMemory();  // Update cart in localStorage
};

// Initialize the app by loading products and cart data
const initApp = () => {
    addDataToHTML();  // Add product data to the HTML

    // Get cart data from localStorage if it exists
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));  // Retrieve cart data from localStorage
        addCartToHTML();  // Add cart data to the cart display
    }
};

// Initialize app on page load
initApp();
