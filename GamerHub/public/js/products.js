/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId)
 
    toggle.addEventListener('click', () =>{
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu')
        // Add show-icon to show and hide menu icon
        toggle.classList.toggle('show-icon')
    })
 }
 
 showMenu('nav-toggle','nav-menu')
 
 /*=============== SHOW DROPDOWN MENU ===============*/
 const dropdownItems = document.querySelectorAll('.dropdown__item')
 
 // 1. Select each dropdown item
 dropdownItems.forEach((item) =>{
     const dropdownButton = item.querySelector('.dropdown__button') 
 
     // 2. Select each button click
     dropdownButton.addEventListener('click', () =>{
         // 7. Select the current show-dropdown class
         const showDropdown = document.querySelector('.show-dropdown')
         
         // 5. Call the toggleItem function
         toggleItem(item)
 
         // 8. Remove the show-dropdown class from other items
         if(showDropdown && showDropdown!== item){
             toggleItem(showDropdown)
         }
     })
 })
 
 // 3. Create a function to display the dropdown
 const toggleItem = (item) =>{
     // 3.1. Select each dropdown content
     const dropdownContainer = item.querySelector('.dropdown__container')
 
     // 6. If the same item contains the show-dropdown class, remove
     if(item.classList.contains('show-dropdown')){
         dropdownContainer.removeAttribute('style')
         item.classList.remove('show-dropdown')
     } else{
         // 4. Add the maximum height to the dropdown content and add the show-dropdown class
         dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px'
         item.classList.add('show-dropdown')
     }
 }
 
 /*=============== DELETE DROPDOWN STYLES ===============*/
 const mediaQuery = matchMedia('(min-width: 1118px)'),
       dropdownContainer = document.querySelectorAll('.dropdown__container')
 
 // Function to remove dropdown styles in mobile mode when browser resizes
 const removeStyle = () =>{
     // Validate if the media query reaches 1118px
     if(mediaQuery.matches){
         // Remove the dropdown container height style
         dropdownContainer.forEach((e) =>{
             e.removeAttribute('style')
         })
 
         // Remove the show-dropdown class from dropdown item
         dropdownItems.forEach((e) =>{
             e.classList.remove('show-dropdown')
         })
     }
 }
 
 addEventListener('resize', removeStyle)
 
 /*=============== DARKMODE ===============*/
 
 let darkmode = localStorage.getItem('darkmode')
 const Switch = document. getElementById('switch')
 
 const enableDarkode = () =>{
     document.body.classList.add('darkmode')
     localStorage.setItem('darkmode','active')
 }
 
 const diableDarkmode = () => {
     document.body.classList.remove('darkmode')
     localStorage.setItem('darkmode', null)
 }
 
 if(darkmode === "active") enableDarkode()
 
 Switch.addEventListener("click", () =>{
     darkmode = localStorage.getItem('darkmode')
     darkmode !== "active" ? enableDarkode() : diableDarkmode()
 })
 
 
 /*=============== SEARCH BAR ===============*/
 
 function openPage() {
     var x = document.getElementById('searchBar').value;
 
     if (x === "deals" || x === "index") {
         window.location.href = `./${x}.html`;
     } else {
         alert("Page not found!");
     }
 }
 
 function handleKeyPress(event) {
     if (event.key === "Enter") {
         openPage(); // Call the same function as the button click
     }
 }
 
 /*=============== SWIPER JS ===============*/
 let swiperCards = new Swiper(".card__content", {
     loop: true,
     spaceBetween: 10,
     grabCursor: true,
   
     pagination: {
       el: ".swiper-pagination",
       clickable: true,
       dynamicBullets: true,
     },
   
     navigation: {
       nextEl: ".swiper-button-next",
       prevEl: ".swiper-button-prev",
     },
   
     breakpoints:{
       600: {
         slidesPerView: 2,
       },
       968: {
         slidesPerView: 3,
       },
       1200: {
         slidesPerView: 4,
       },
     },
   });

   // Add To Cart

function changeImage(imageSrc) {
    document.getElementById('Mainpicture').src = imageSrc;
  }  
  // Image Changer

  function updateTotal() {
    const price = parseFloat(document.getElementById('price').textContent);
    const quantity = parseInt(document.getElementById('quantity').value);
    const total = price * quantity;
    document.getElementById('total').textContent = total.toFixed(2);
  }

  // Total Price

  function getQuantity() {
    const quantity = parseInt(document.getElementById('quantity').value);
    return quantity;
  }