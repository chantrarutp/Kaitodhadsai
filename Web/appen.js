let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCart = document.querySelector('.icon-cart');
let iconCartSpan = document.querySelector('.icon-cart span');
let body = document.querySelector('body');
let closeCart = document.querySelector('.close');
let products = [];
let cart = [];
let addons = [];
let sizes = [];

iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});
closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
});

const addAddonToHTML = () => {
    let addonForm = document.querySelector('form[name="addon"]');
    addonForm.innerHTML = ''; // Clear existing options

    addons.forEach(addon => {
        let option = document.createElement('option');
        option.value = addon.id; // เราสมมติให้ id ของ addon เป็นค่า value ของ option
        option.textContent = addon.name;
        addonForm.appendChild(option);
    });
};

const addSizeToHTML = () => {
    let sizeForm = document.querySelector('form[name="size"]');
    sizeForm.innerHTML = ''; // Clear existing options

    sizes.forEach(size => {
        let input = document.createElement('input');
        input.type = 'radio';
        input.name = 'size';
        input.value = size.id; // Assuming size.id is the value of the size

        let label = document.createElement('label');
        label.textContent = size.name; // Assuming size.name is the display text of the size

        sizeForm.appendChild(input);
        sizeForm.appendChild(label);
    });
};

const addDataToHTML = () => {
    // Remove default data from HTML

    // Add new data
    if (products.length > 0) { // if there is data
        products.forEach(product => {
            
            let newProduct = document.createElement('div');
            newProduct.dataset.id = product.id;
            newProduct.classList.add('item');
            
            newProduct.innerHTML =
                `<img src="${product.imagfile}" alt="${product.name}">
                <h2>${product.name}</h2>
                <h5>${product.detell}</h5>
                <form method="post" name="addon">
                    Side dish
                    <select name="addon">
                        <option value="none">None</option>
                        <option value="Onionfried">Fried onions</option>
                        <option value="fries">French fries</option>
                        <option value="kimchi">Kimchi</option>
                        <option value="pickled">Pickled radish</option>
                    </select>
                </form>

                <form method="post" name="toppings">
                    Toppings
                    <select name="toppings">
                        <option value="none">None</option>
                        <option value="cheese">Cheese</option>
                        <option value="corn">Corn</option>
                        <option value="hotandspicy">Hot and Spicy</option>
                        <option value="pizza">Pizza</option>
                        <option value="paprika">Paprika</option>
                    </select>
                </form>
                <div class="price">$${product.price}</div>
                <button class="addCart">Add To Cart</button>`;
            
            listProductHTML.appendChild(newProduct);
        });
    }
    // เรียกใช้ฟังก์ชัน addSizeToHTML() เพื่อสร้าง options ของขนาด
    addSizeToHTML();

    const getSelectedAddon = () => {
        const selectedAddonForm = document.querySelector('form[name="addon"]');
        const selectedAddon = selectedAddonForm.elements['addon'].value;
        // สามารถทำอะไรกับค่าที่เลือกได้ต่อไป
        console.log('Selected addon:', selectedAddon);
        return selectedAddon;
    };
    
    // สร้างฟังก์ชันสำหรับการเก็บค่าที่เลือกของ topping
    const getSelectedTopping = () => {
        const selectedToppingForm = document.querySelector('form[name="toppings"]');
        const selectedTopping = selectedToppingForm.elements['toppings'].value;
        // สามารถทำอะไรกับค่าที่เลือกได้ต่อไป
        console.log('Selected topping:', selectedTopping);
        return selectedTopping;
    };
};



listProductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('addCart')) {
        let id_product = positionClick.parentElement.dataset.id;

        // ค้นหาสินค้าจาก products โดยใช้ id_product
        const product = products.find(item => item.id === id_product);
        
        // เพิ่มข้อมูลสินค้าเข้าไปในตะกร้าพร้อมกับ name ของสินค้า
        addToCart(id_product, product.name);
    }
});

const addToCart = (product_id, product_name) => {
    let positionThisProductInCart = cart.findIndex((value) => value.product_id == product_id);
    
    if (cart.length <= 0) {
        cart = [{
            product_id: product_id,
            product_name:product_name,
            quantity: 1
        }];
    } else if (positionThisProductInCart < 0) {
        cart.push({
            product_id: product_id,
            product_name: product_name,
            quantity: 1
        });
    } else {
        cart[positionThisProductInCart].quantity = cart[positionThisProductInCart].quantity + 1;
    }
    addCartToMemory(); // เรียก addCartToMemory ก่อน
    addCartToHTML();
    // เพิ่มข้อมูลสินค้าลงในตะกร้า
    // console.log('Product added to cart:', product_name);
};

const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let totalPrice = 0; // เพิ่มตัวแปร totalPrice เพื่อเก็บราคารวมของสินค้า

    if (cart.length > 0) {
        cart.forEach(item => {
            totalQuantity += item.quantity; // นับจำนวนสินค้าทั้งหมดในตะกร้า
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.id = item.product_id;
            listCartHTML.appendChild(newItem);

            let positionProduct = products.findIndex((value) => value.id == item.product_id);
            let info = products[positionProduct];
            listCartHTML.appendChild(newItem);

            // เพิ่มรายละเอียดสินค้าไปยัง console.log
            console.log('Cart:', cart);

            // คำนวณราคารวมของสินค้าและแสดงใน HTML
            let totalPricePerItem = info.price * item.quantity;
            totalPrice += totalPricePerItem;
            newItem.innerHTML = `
            <div class="image">
                    <img src="${info.imagfile}">
                </div>
                <div class="name">
                ${info.name}
                </div>
                <div class="totalPrice">$${totalPricePerItem.toFixed(2)}</div>
                <div class="quantity">
                    <span class="minus"><</span>
                    <span>${item.quantity}</span>
                    <span class="plus">></span>
                </div>
            `;
        });
    }
    const totalPriceDisplay = document.getElementById('totalPriceDisplayValue');
    totalPriceDisplay.textContent = totalPrice.toFixed(2);
    // แสดงราคารวมของสินค้าทั้งหมดในตะกร้าใน console.log
    console.log(`Chicken Price: $${totalPrice.toFixed(2)}`);

    iconCartSpan.innerText = totalQuantity;
    addSizeToHTML();
};


listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
        let product_id = positionClick.parentElement.parentElement.dataset.id;
        let type = 'minus';
        if (positionClick.classList.contains('plus')) {
            type = 'plus';
        }
        changeQuantityCart(product_id, type);
    }
});
const changeQuantityCart = (product_id, type) => {
    let positionItemInCart = cart.findIndex((value) => value.product_id == product_id);
    if (positionItemInCart >= 0) {
        let info = cart[positionItemInCart];
        switch (type) {
            case 'plus':
                cart[positionItemInCart].quantity = cart[positionItemInCart].quantity + 1;
                break;

            default:
                let changeQuantity = cart[positionItemInCart].quantity - 1;
                if (changeQuantity > 0) {
                    cart[positionItemInCart].quantity = changeQuantity;
                } else {
                    cart.splice(positionItemInCart, 1);
                }
                break;
        }
    }
    addCartToHTML();
    addCartToMemory();
};


//รับค่าไฟล์json จากฐานข้อมูลของ php
const initApp = () => {
    // Fetch product data from PHP
    fetch('testjsonen.php')
        .then(response => response.json())
        .then(data => {
            products = data;
            // Call addDataToHTML function after fetching product data
            addDataToHTML();
        })
        .catch(error => {
            console.error('Error fetching products:', error);
        });

    // Fetch addon data from PHP
    fetch('connectaddon.php')
        .then(response => response.json())
        .then(data => {
            // Assign addon data to a variable
            addons = data;
            // Optionally, you can call a function to handle addon data
            // handleAddonData();
        })
        .catch(error => {
            console.error('Error fetching addons:', error);
        });

    // Fetch size data from PHP
    fetch('connectsize.php')
        .then(response => response.json())
        .then(data => {
            // Assign size data to a variable
            sizes = data;
            // Optionally, you can call a function to handle size data
            // handleSizeData();
        })
        .catch(error => {
            console.error('Error fetching sizes:', error);
        });
};

// Call initApp function to fetch all necessary data
initApp();



// ก่อนเรียกใช้ฟังก์ชัน checkout()


const checkout = () => {
    // ดึงข้อมูลในตะกร้าจาก local storage
    const cartData = JSON.parse(localStorage.getItem('cart'));
    
    // ตรวจสอบว่าตะกร้าไม่ว่าง
    if (cartData && cartData.length > 0) {
        // ส่งข้อมูลไปยังเซิร์ฟเวอร์โดยใช้ Fetch API
        fetch('saveserver.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(cartData)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); // แสดงผลลัพธ์จากเซิร์ฟเวอร์
            
            // ล้างข้อมูลใน local storage
            localStorage.removeItem('cart');
            
            // ล้างข้อมูลในตะกร้า HTML
            listCartHTML.innerHTML = '';
            
            // อัปเดตจำนวนสินค้าในไอคอนตะกร้า
            iconCartSpan.innerText = '0';
            
            // แสดงข้อความยืนยันการสั่งซื้อหรือทำการ redirect ไปยังหน้าอื่นตามที่ต้องการ
            alert('Checkout completed! Thank you for your purchase.');
        })
        .catch(error => {
            console.error('Error saving order:', error);
        });
    } else {
        // ถ้าตะกร้าว่าง
        alert('Your cart is empty. Please add some items before checking out.');
    }
};


// เลือกปุ่ม checkout จาก DOM
const checkoutButton = document.querySelector('.checkout-button');

// เพิ่มการเชื่อมต่อกับฟังก์ชัน checkout เมื่อมีการคลิกที่ปุ่ม checkout
// checkoutButton.addEventListener('click', checkout);