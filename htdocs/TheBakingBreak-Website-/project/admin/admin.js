function showSection(sectionId) {
  const sections = document.querySelectorAll(".section");
  sections.forEach(sec => sec.classList.remove("active"));
  document.getElementById(sectionId).classList.add("active");
}

// Example: Manage products dynamically
let products = [];

function addProduct() {
  const name = prompt("Enter product name:");
  if (name) {
    products.push(name);
    renderProducts();
  }
}

function renderProducts() {
  const list = document.getElementById("productList");
  list.innerHTML = "";
  products.forEach((p, i) => {
    const item = document.createElement("div");
    item.textContent = `${i + 1}. ${p}`;
    list.appendChild(item);
  });
}
