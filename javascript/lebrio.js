function validateReservationForm() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var date = document.getElementById('date').value;
    var nombre = document.getElementById('nombre').value;

    // Regular expressions for validation
    var nameRegex = /^[A-Za-z\s]{1,10}$/; // Allows only letters and spaces, up to 10 characters
    var emailRegex = /^\S+@\S+\.\S+$/; // Basic email format validation
    var phoneRegex = /^[0-9]{8}$/; // Exactly 8 digits
    var nombreRegex = /^([1-9]|10)$/; // Allows numbers from 1 to 10

    // Get the current date
    var currentDate = new Date();
    var selectedDate = new Date(date);

    // Check if fields are empty
    if (nom === '' || prenom === '' || email === '' || phone === '' || date === '' || nombre === '') {
        alert('Please fill in all fields');
        // Change border color to red for empty fields
        if (nom === '') document.getElementById('nom').style.borderColor = 'red';
        else document.getElementById('nom').style.borderColor = 'green';

        if (prenom === '') document.getElementById('prenom').style.borderColor = 'red';
        else document.getElementById('prenom').style.borderColor = 'green';

        if (email === '') document.getElementById('email').style.borderColor = 'red';
        else document.getElementById('email').style.borderColor = 'green';

        if (phone === '') document.getElementById('phone').style.borderColor = 'red';
        else document.getElementById('phone').style.borderColor = 'green';

        if (date === '') document.getElementById('date').style.borderColor = 'red';
        else document.getElementById('date').style.borderColor = 'green';

        if (nombre === '') document.getElementById('nombre').style.borderColor = 'red';
        else document.getElementById('nombre').style.borderColor = 'green';

        return false; // Prevent form submission
    }

    // Validate Nom
    if (!nameRegex.test(nom)) {
        alert('Nom should contain only letters and spaces, up to 10 characters');
        document.getElementById('nom').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('nom').style.borderColor = 'green';
    }

    // Validate Prenom
    if (!nameRegex.test(prenom)) {
        alert('Prenom should contain only letters and spaces, up to 10 characters');
        document.getElementById('prenom').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('prenom').style.borderColor = 'green';
    }

    // Validate Email
    if (!emailRegex.test(email)) {
        alert('Invalid email format');
        document.getElementById('email').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('email').style.borderColor = 'green';
    }

    // Validate Phone
    if (!phoneRegex.test(phone)) {
        alert('Phone number should be 8 digits');
        document.getElementById('phone').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('phone').style.borderColor = 'green';
    }

    // Validate Date
    if (selectedDate <= currentDate) {
        alert('Date should be greater than today');
        document.getElementById('date').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('date').style.borderColor = 'green';
    }

    // Validate Nombre
    if (!nombreRegex.test(nombre)) {
        alert('Nombre should be a number between 1 and 10');
        document.getElementById('nombre').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('nombre').style.borderColor = 'green';
    }

    // Additional custom validation
    if (nombre < 0 || nombre > 10) {
        alert('Nombre should be between 1 and 10');
        document.getElementById('nombre').style.borderColor = 'red';
        return false;
    }

    return true; // Proceed with form submission
}


function validateFeedbackForm() {
    var nom = document.getElementById('nom').value;
    var email = document.getElementById('email').value;
    var comment = document.getElementById('comment').value;

    // Regular expressions for validation
    var nameRegex = /^[A-Za-z\s]{1,10}$/; // Allows only letters and spaces, up to 10 characters
    var emailRegex = /^\S+@\S+\.\S+$/; // Basic email format validation

    // Check if fields are empty
    if (nom === '' || email === '' || comment === '') {
        alert('Please fill in all fields');
        // Change border color to red for empty fields
        if (nom === '') document.getElementById('nom').style.borderColor = 'red';
        if (email === '') document.getElementById('email').style.borderColor = 'red';
        if (comment === '') document.getElementById('comment').style.borderColor = 'red';
        return false; // Prevent form submission
    }

    // Validate Nom
    if (!nameRegex.test(nom)) {
        alert('Nom should contain only letters and spaces, up to 10 characters');
        document.getElementById('nom').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('nom').style.borderColor = 'green';
    }

    // Validate Email
    if (!emailRegex.test(email)) {
        alert('Invalid email format');
        document.getElementById('email').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('email').style.borderColor = 'green';
    }

    return true; // Proceed with form submission
}


function validateEventForm() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var allergie = document.getElementById('allergie').value;
    var entendre = document.getElementById('entendre').value;
    var comment = document.getElementById('comment').value;
    var accept = document.querySelector('input[name="accept"]:checked');

    // Regular expressions for validation
    var nameRegex = /^[A-Za-z\s]{1,10}$/; // Allows only letters and spaces, up to 10 characters
    var emailRegex = /^\S+@\S+\.\S+$/; // Basic email format validation

    // Check if fields are empty
    if (nom === '' || prenom === '' || email === '' || allergie === '' || entendre === '' || comment === '' || accept === null) {
        alert('Please fill in all fields');
        // Change border color to red for empty fields
        if (nom === '') document.getElementById('nom').style.borderColor = 'red';
        if (prenom === '') document.getElementById('prenom').style.borderColor = 'red';
        if (email === '') document.getElementById('email').style.borderColor = 'red';
        if (allergie === '') document.getElementById('allergie').style.borderColor = 'red';
        if (entendre === '') document.getElementById('entendre').style.borderColor = 'red';
        if (comment === '') document.getElementById('comment').style.borderColor = 'red';
        if (accept === null) document.getElementById('accept_oui').style.borderColor = 'red'; // Assuming the "Oui" radio button has the ID "accept_oui"
        return false; // Prevent form submission
    }

    // Validate Nom
    if (!nameRegex.test(nom)) {
        alert('Nom should contain only letters and spaces, up to 10 characters');
        document.getElementById('nom').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('nom').style.borderColor = 'green';
    }

    // Validate Prenom
    if (!nameRegex.test(prenom)) {
        alert('Prenom should contain only letters and spaces, up to 10 characters');
        document.getElementById('prenom').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('prenom').style.borderColor = 'green';
    }

    // Validate Email
    if (!emailRegex.test(email)) {
        alert('Invalid email format');
        document.getElementById('email').style.borderColor = 'red';
        return false;
    } else {
        document.getElementById('email').style.borderColor = 'green';
    }

    // Additional validation for other fields can be added here

    return true; // Proceed with form submission
}



document.addEventListener('DOMContentLoaded', function() {
    const counts = document.querySelectorAll('.count');
    const duration = 2000; // Total duration of the animation in milliseconds
    const refreshRate = 50; // How often to update the counter (in milliseconds)
    const totalIncrements = duration / refreshRate; // Total number of updates

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                updateData(counter);
                observer.unobserve(counter); // Unobserve to ensure counting starts only once
            }
        });
    }, {
        threshold: 0.5 // Adjust if needed to trigger when half the element is visible
    });

    function updateData(counter) {
        const target = +counter.getAttribute('data-target');
        const current = parseFloat(counter.innerText.replace('%', ''));
        const isPercentage = counter.closest('.counter').querySelector('h3').textContent.includes('Avis positifs');
        // Determine the increment such that we finish in exactly the total duration, ensuring it's at least 1
        const rawIncrement = target / totalIncrements;
        const increment = rawIncrement < 1 ? 1 : rawIncrement; // Ensure a minimum increment of 1

        if (current < target) {
            const nextCount = Math.min(current + increment, target);
            if (isPercentage) {
                counter.innerText = `${Math.floor(nextCount)}%`;
            } else {
                counter.innerText = Math.floor(nextCount);
            }
            setTimeout(() => updateData(counter), refreshRate);
        } else {
            counter.innerText = isPercentage ? `${target}%` : target;
        }
    }

    counts.forEach(counter => {
        observer.observe(counter); // Start observing each counter
    });
});




document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.log(entry.isIntersecting); // Check intersection status in the console
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    }, { threshold: 0.1 });

    const hiddenElements = document.querySelectorAll('.hidden');
    hiddenElements.forEach(el => observer.observe(el));
});



















/*

// Selecting DOM elements
const iconCart = document.querySelector('.iconCart');
const cartMenu = document.querySelector('.cartMenu');
const containerMenu = document.querySelector('.containerMenu');
const closeMenu = document.querySelector('.closeMenu');
const listProductHTML = document.querySelector('.listProduct');
const listCartHTML = document.querySelector('.listCart');
const totalHTML = document.querySelector('.totalQuantity');

// Define product data directly in JavaScript
const products = [
    {
        id: 1,
        name: "Product name 1",
        price: 50,
        image: "images/hi.jpg"
    },
    {
        id: 2,
        name: "Product name 2",
        price: 40,
        image: "images/Untitled design (2).png"
    },
    {
        id: 3,
        name: "Product name 3",
        price: 35,
        image: "images/kj.jpg"
    },
    {
        id: 4,
        name: "Product name 4",
        price: 60,
        image: "images/Capture d'écran 2024-02-18 001838.png"
    },
    {
        id: 5,
        name: "Product name 5",
        price: 40,
        image: "fettucuni.jpeg"
    },
    {
        id: 6,
        name: "Product name 6",
        price: 30,
        image: "430424122_743296377910539_1778911076896277854_n.jpg"
    }
];

// Initialize cart array
let cartItems = [];
// Function to add product data to HTML
function addDataToHtml() {
    const listProductHTML = document.querySelector('.listProduct');
    if (!listProductHTML) {
        return; // Exit the function if the element is not found
    }
    
    listProductHTML.innerHTML = ''; // Clear existing HTML
    products.forEach(product => {
        const newProduct = document.createElement('div');
        newProduct.classList.add('item');
        newProduct.innerHTML = `
            <img src="${product.image}">
            <h2>${product.name}</h2>
            <div class="price">$${product.price}</div>
            <button onclick="addCart(${product.id})">Add To Cart</button>`;
        listProductHTML.appendChild(newProduct);
    });
}

// Call addDataToHtml when the DOM content is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    addDataToHtml();
});






// Call addDataToHtml to populate product data on page load
addDataToHtml();

// Event listener for opening/closing cart menu
iconCart.addEventListener('click', () => {
    if (cartMenu.style.right === '-100%') {
        cartMenu.style.right = '0';
        containerMenu.style.transform = 'translateX(-400px)';
    } else {
        cartMenu.style.right = '-100%';
        containerMenu.style.transform = 'translateX(0)';
    }
});

closeMenu.addEventListener('click', () => {
    cartMenu.style.right = '-100%';
    containerMenu.style.transform = 'translateX(0)';
});

// Function to add product to cart
function addCart(id) {
    const selectedProduct = products.find(product => product.id === id);
    if (selectedProduct) {
        const existingItem = cartItems.find(item => item.id === id);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cartItems.push({ ...selectedProduct, quantity: 1 });
        }
        updateCart();
    } else {
        console.error('Product not found.');
    }
}

// Function to update cart HTML
function updateCart() {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let totalPrice = 0;
    cartItems.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('item');
        cartItem.innerHTML = `
            <img src="${item.image}">
            <div class="contentMenu">
                <div class="nameMenu">${item.name}</div>
                <div class="priceMenu">$${item.price}/1 product</div>
            </div>
            <div class="quantityMenu">
                <button onclick="changeQuantity(${item.id}, '-')">-</button>
                <span class="valueMenu">${item.quantity}</span>
                <button onclick="changeQuantity(${item.id}, '+')">+</button>
            </div>`;
        listCartHTML.appendChild(cartItem);
        totalQuantity += item.quantity;
        totalPrice += item.price * item.quantity;
    });
    totalHTML.innerText = totalQuantity;
}

// Function to change quantity of product in cart
function changeQuantity(id, type) {
    const itemIndex = cartItems.findIndex(item => item.id === id);
    if (itemIndex !== -1) {
        if (type === '+') {
            cartItems[itemIndex].quantity++;
        } else if (type === '-') {
            cartItems[itemIndex].quantity--;
            if (cartItems[itemIndex].quantity <= 0) {
                cartItems.splice(itemIndex, 1);
            }
        }
        updateCart();
    }
}
*/