

const navbar = document.getElementsByTagName('header')[0];

window.addEventListener('scroll', function() {
  let scrollHeader = window.scrollY;
  if (scrollHeader > 50) {
    navbar.style.backgroundColor = '#3C486B';
  } else {
    navbar.style.backgroundColor = 'transparent';
  }
});













console.log('Hello...');