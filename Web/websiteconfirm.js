// กำหนดตัวแปร global scope
let cartData = [];

document.addEventListener("DOMContentLoaded", function() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const optionForm = document.getElementById('optionForm');
    const submitButton = document.querySelector('button[type="submit"]');
    const urlParams = new URLSearchParams(window.location.search);
    const selectedPowder = urlParams.get('powder');

    // แสดงค่าผงที่เลือกบนหน้าเว็บ
    const selectedPowderElement = document.getElementById("selectedPowder");
    

    // ดึงข้อมูลในตะกร้าจาก localStorage
    const storedCartData = localStorage.getItem('cart');
    if (storedCartData) {
        cartData = JSON.parse(storedCartData);
    }

    // แสดงสินค้าในตะกร้า
    if (cartData && cartData.length > 0) {
        // สร้าง HTML สำหรับแสดงสินค้าในตะกร้า
        cartData.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <p><h3>${item.product_name}</h3></p>
                <p>จำนวน: ${item.quantity} ชิ้น</p>
                <p>เครื่องเคียง: ${selectedAddon}</p>
                <p>ผงคลุก: ${selectedPowder}</p>
                <hr>
            `;
            cartItemsContainer.appendChild(cartItem);
        });
    } else {
        // ถ้าตะกร้าว่าง
        const emptyCartMessage = document.createElement('p');
        emptyCartMessage.textContent = 'Your cart is empty.';
        cartItemsContainer.appendChild(emptyCartMessage);
    }


   
});
