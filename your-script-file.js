document.getElementById("change-text-btn").addEventListener("click", function() {
  let h = document.getElementById("welcome-message");
  h.innerText = "Welcome, Mohammad Ali Nayeem!";
});
document.getElementById("toggle-mode-btn").addEventListener("click", function() {
  let b = document.querySelector("body");
  b.classList.toggle("dark-mode");
});
document.getElementById("add-item-btn").addEventListener("click", function() {
  let input = document.getElementById("new-item-input");
  let text = input.value;
  let li = document.createElement("li");
  li.innerText = text;
  document.getElementById("todo-list").appendChild(li);
});
document.getElementById("new-item-input").addEventListener("keyup", function() {
  let val = this.value;
  document.getElementById("char-count").innerText = String(val.length);
});
let imageUrls = [
  "https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800",
  "https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=800",
  "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=800"
];
let currentIndex = 0;
document.addEventListener("DOMContentLoaded", function() {
  let img = document.getElementById("gallery-img");
  img.src = imageUrls[currentIndex];
});
document.getElementById("next-img-btn").addEventListener("click", function() {
  currentIndex = (currentIndex + 1) % imageUrls.length;
  document.getElementById("gallery-img").src = imageUrls[currentIndex];
});