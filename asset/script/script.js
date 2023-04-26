

const navbar = document.getElementsByTagName('header')[0];

window.addEventListener('scroll', function() {
  let scrollHeader = window.scrollY;
  if (scrollHeader > 50) {
    navbar.style.backgroundColor = '#3C486B';
  } else {
    navbar.style.backgroundColor = 'transparent';
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const heroTitle = document.querySelector('.hero-content a');
  const heroTitleText = heroTitle.innerText;
  let i = 0;
  heroTitle.innerText = '';

  function typeWriter() {
    if (i < heroTitleText.length) {
      heroTitle.innerText += heroTitleText.charAt(i);
      i++;
      setTimeout(typeWriter, 50);
    }
  }
  
  typeWriter();
});





console.log('Hello...');