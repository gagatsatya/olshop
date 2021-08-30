let increase = document.getElementById("plus");
let decrease = document.getElementById("min");
let price = document.getElementById("price");

counter = 0;

increase.addEventListener("click", () => {
  counter++;
  price.innerHTML = counter;
});
decrease.addEventListener("click", () => {
  if (counter > 0) {
    counter--;
    price.innerHTML = counter;
  }
});
