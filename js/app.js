// // let btn = document.querySelectorAll(".btn");
// // let item = document.querySelectorAll(".card-body");
// // let ul = document.querySelector(".ul");
// // let totalPrice = document.querySelector(".total");

// // let total = 0;
// // btn.forEach(element=>{
// //     element.addEventListener("click",()=>{
// //         let name = element.parentElement.getAttribute("data-name");
// //         let price = parseInt(element.parentElement.getAttribute("data-price"));
// //     //    console.log(price);
// //         let li = document.createElement("li");
// //         li.innerText = `${name}-${price}`;
// //         ul.appendChild(li);

// //         let del = document.createElement("button");
// //         del.innerText = "Delete Item";
// //         del.classList.add("cartBtn");
// //         li.appendChild(del);
// //         total = total + price;

// //         totalPrice.innerText = total;
// //         del.addEventListener("click",()=>{
// //             let par = del.parentElement;
// //             par.remove();
// //             let newTotal = parseInt(par.innerText.split("-")[1]);
// //             total = total - newTotal;
// //             totalPrice.innerText = total;
// //         });


// //     });
// // });






// let btn = document.querySelectorAll(".btn");
// let item = document.querySelectorAll(".card-body");
// let ul = document.querySelector(".ul");
// let totalPrice = document.querySelector(".total");

// //forcart data push
// let fname = document.getElementById("foodname");
// let fprice = document.getElementById("foodprice");
// let ftotal = document.getElementById("foodtotal");


// // Check if cart data is already in local storage and retrieve it
// let cartData = JSON.parse(localStorage.getItem("cartData")) || [];
// let total = 0;

// // Function to update the cart and localStorage
// function updateCart() {
//     ul.innerHTML = ""; // Clear the current cart
//     total = 0;

//     cartData.forEach(cartItem => {
//         let li = document.createElement("li");
//         li.classList.add("cartLi");
//         li.innerText = `${cartItem.name}-${cartItem.price}`;
//         ul.appendChild(li);

//         let del = document.createElement("button");
//         del.innerText = "Delete Item";
//         del.classList.add("cartBtn");
//         li.appendChild(del);
//         total += cartItem.price;

//         totalPrice.innerText = total;
//         ftotal.value= total;

//         del.addEventListener("click", () => {
//             let index = cartData.findIndex(item => item.name === cartItem.name);
//             if (index !== -1) {
//                 cartData.splice(index, 1);
//                 localStorage.setItem("cartData", JSON.stringify(cartData));
//                 updateCart();
//             }
//         });
//     });
// }

// btn.forEach(element => {
//     element.addEventListener("click", () => {
//         let name = element.parentElement.getAttribute("data-name");
//         let price = parseInt(element.parentElement.getAttribute("data-price"));

       
//         // Add the clicked item to cartData array and store in localStorage
//         cartData.push({ name: name, price: price });
//         localStorage.setItem("cartData", JSON.stringify(cartData));
//         alert(`${name} has been added to the cart.`);

//         updateCart();
//         fname.value = name;
//         fprice.value = price;
//     });
// });

// // Initial update of the cart
// updateCart();



// let btn = document.querySelectorAll(".btn");
// let item = document.querySelectorAll(".card-body");
// let ul = document.querySelector(".ul");
// let totalPrice = document.querySelector(".total");

// // For cart data push
// let fname = document.getElementById("foodname");
// let ftotal = document.getElementById("foodtotal");

// // Check if cart data is already in local storage and retrieve it
// let cartData = JSON.parse(localStorage.getItem("cartData")) || [];
// let total = 0;
// let cartData2;

// // Function to update the cart and localStorage
// function updateCart() {
//     ul.innerHTML = ""; // Clear the current cart
//     total = 0;

//     cartData.forEach(cartItem => {
//         let li = document.createElement("li");
//         li.classList.add("cartLi");
//         cartData2 =`${cartItem.name}-${cartItem.price}`;
//         li.innerText = cartData2;
//         ul.appendChild(li);
//         fname.value = cartData2;
        
        
//         let del = document.createElement("button");
//         del.innerText = "Delete Item";
//         del.classList.add("cartBtn");
//         li.appendChild(del);
//         total += cartItem.price;

//         totalPrice.innerText = total;
//         ftotal.value= total;
//         del.addEventListener("click", () => {
//             let index = cartData.findIndex(item => item.name === cartItem.name);
//             if (index !== -1) {
//                 cartData.splice(index, 1);
//                 localStorage.setItem("cartData", JSON.stringify(cartData));
//                 updateCart();
//             }
//         });
//     });
// }

// btn.forEach(element => {
//     element.addEventListener("click", () => {
//         let name = element.parentElement.getAttribute("data-name");
//         let price = parseInt(element.parentElement.getAttribute("data-price"));

//         // Add the clicked item to cartData array and store in localStorage
//         cartData.push({ name: name, price: price });
//         localStorage.setItem("cartData", JSON.stringify(cartData));
//         alert(`${name} has been added to the cart.`);
        
//         updateCart();
        
        
//     });
// });

// // Initial update of the cart
// updateCart();




let btn = document.querySelectorAll(".btn");
let ul = document.querySelector(".ul");
let totalPrice = document.querySelector(".total");

// For cart data push
let fname = document.getElementById("foodname");
let ftotal = document.getElementById("foodtotal");
let ordBtn = document.querySelector(".odr1");

// Check if cart data is already in local storage and retrieve it
let cartData = JSON.parse(localStorage.getItem("cartData")) || [];
let total = 0;

// Function to update the cart and localStorage
function updateCart() {
    ul.innerHTML = ""; // Clear the current cart
    total = 0;

    let accumulatedCartData = []; // To accumulate cart data for fname input

    cartData.forEach(cartItem => {
        let li = document.createElement("li");
        li.classList.add("cartLi");
        let cartItemText = `${cartItem.name}-${cartItem.price}`;
        li.innerText = cartItemText;
        ul.appendChild(li);
        accumulatedCartData.push(cartItemText); // Accumulate cart data for fname
        
        let del = document.createElement("button");
        del.innerText = "Delete Item";
        del.classList.add("cartBtn");
        li.appendChild(del);
        total += cartItem.price;

        totalPrice.innerText = total;
        ftotal.value = total;
        del.addEventListener("click", () => {
            let index = cartData.findIndex(item => item.name === cartItem.name);
            if (index !== -1) {
                cartData.splice(index, 1);
                localStorage.setItem("cartData", JSON.stringify(cartData));
                updateCart();
            }
            
        });
    });

    // Set accumulated values to the fname input
    fname.value = accumulatedCartData.join(', '); // Join with comma and space
    // Check if an order was successful and clear cartData if needed

}

btn.forEach(element => {
    element.addEventListener("click", () => {
        let name = element.parentElement.getAttribute("data-name");
        let price = parseInt(element.parentElement.getAttribute("data-price"));

        // Add the clicked item to cartData array and store in localStorage
        cartData.push({ name: name, price: price });
        localStorage.setItem("cartData", JSON.stringify(cartData));
        alert(`${name} has been added to the cart.`);

        updateCart();
    });
});
ordBtn.addEventListener("click",()=>{
  // Clear cart data when the order button is clicked
  localStorage.removeItem("cartData");
  cartData = [];
  updateCart();
  // Additional code for submitting the order
});

// Initial update of the cart
updateCart();
