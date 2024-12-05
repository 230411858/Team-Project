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


//Basket stuff
const basketButon = document.querySelector('.nav_basket');
const basketModal = document.querySelector('basket-modal');
const basketItemsContainer = document.querySelector('.basket-items');
const totalPriceElement = document.querySelector('.total-price');
let basketItems = []

basketButton.addEventListener('click', () => {
    basketModal.classList.toggle('show-basket')
});

const addToBasket = (item) => {
    basketItems.push(item);
    updateBasketUI();
};

const updateBasketUI = () => {
    basketItemsContainer.innerHTML = '';
    let totalPrice = 0

    basketItems.forEach((item, index) => {
        totalPrice +=item.price;

        basketItemsContainer.innerHTML +=
          <li class="basket-item">
            <span>${item.name}</span>
            <span>£${item.price.toFixed(2)}</span>
            <button class="remove-item" data-index="${index}">Remove</button>
          </li>
          ;
    });
    totalPriceElement.textContent - '£${totalPrice.toFixed(2)}';
    document.querySelector('.basket-count').textContent = basketItems.length;
    
};

basketItemsContainer.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-item')) {
        const index = e.target.dataset.index;
        basketItems.splice(index, 1);
        updateBasketUI();
    }
});