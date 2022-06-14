let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
  header.classList.toggle('shadow', window.scrollY > 0);
});

let windowContainer = document.querySelector(".window");
let windowButton = document.querySelector(".cancel");
let windowButton2 = document.querySelector(".cancel2");
let windowButton3 = document.querySelector(".cancel3");
let windowStartButton = document.querySelector(".btn3-2");

windowStartButton.addEventListener("click", () =>{
  windowContainer.classList.add("active");
});
windowButton.addEventListener("click", () => {
  windowContainer.classList.remove("active");
});

windowButton2.addEventListener("click", () => {
  windowContainer.classList.remove("active");
});

windowButton3.addEventListener("click", () => {
  windowContainer.classList.remove("active");
});

let windowContainer2 = document.querySelector(".window2");
let windowButton4 = document.querySelector(".cancel4");
let windowButton5 = document.querySelector(".cancel5");
let windowButton6 = document.querySelector(".cancel6");
let windowStartButton2 = document.querySelector(".btn3-3");
windowStartButton2.addEventListener("click", () =>{
  windowContainer2.classList.add("active");
});
windowButton4.addEventListener("click", () => {
  windowContainer2.classList.remove("active");
});
windowButton5.addEventListener("click", () => {
  windowContainer2.classList.remove("active");
});
windowButton6.addEventListener("click", () => {
  windowContainer2.classList.remove("active");
});

let windowContainer3 = document.querySelector(".window3");
let windowButton7 = document.querySelector(".cancel7");
let windowButton8 = document.querySelector(".cancel8");
let windowButton9 = document.querySelector(".cancel9");
let windowStartButton3 = document.querySelector(".btn3-4");
windowStartButton3.addEventListener("click", () =>{
  windowContainer3.classList.add("active");
});
windowButton7.addEventListener("click", () => {
  windowContainer3.classList.remove("active");
});
windowButton8.addEventListener("click", () => {
  windowContainer3.classList.remove("active");
});
windowButton9.addEventListener("click", () => {
  windowContainer3.classList.remove("active");
});

let windowContainer4 = document.querySelector(".window4");
let windowButton10 = document.querySelector(".cancel10");
let windowButton11 = document.querySelector(".cancel11");
let windowButton12 = document.querySelector(".cancel12");
let windowStartButton4 = document.querySelector(".btn3-5");
windowStartButton4.addEventListener("click", () =>{
  windowContainer4.classList.add("active");
});
windowButton10.addEventListener("click", () => {
  windowContainer4.classList.remove("active");
});
windowButton11.addEventListener("click", () => {
  windowContainer4.classList.remove("active");
});
windowButton12.addEventListener("click", () => {
  windowContainer4.classList.remove("active");
});