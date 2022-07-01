const dropdownButton = document.getElementsByClassName('dropdownToggle')[0]
const navbarLinks = document.getElementsByClassName('navLinks')[0]

dropdownButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
})