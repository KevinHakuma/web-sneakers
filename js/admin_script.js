let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active')
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}

subImages = document.querySelectorAll('.update-product .image-container .sub-images img');
mainImage = document.querySelector('.update-product .image-container .main-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      let src = images.getAttribute('src');
      mainImage.src = src;
   }
});

document.addEventListener("DOMContentLoaded", function() {
    const priceInput = document.getElementById("priceInput");

    priceInput.addEventListener("input", function(event) {
        // Menghilangkan karakter selain angka
        const cleanedValue = event.target.value.replace(/\D/g, "");
        
        // Mengubah angka menjadi format ribuan dengan titik
        const formattedValue = new Intl.NumberFormat("id-ID").format(cleanedValue);
        
        event.target.value = formattedValue;
    });
});