(function($) {
  'use strict';

  // Theme Toggle
  function initThemeToggle() {
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;
    const savedTheme = localStorage.getItem('theme') || 'light';
    html.classList.toggle('dark', savedTheme === 'dark');
    
    if (themeToggle) {
      themeToggle.addEventListener('click', function() {
        const isDark = html.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
      });
    }
  }

  // Mobile Menu
  function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu-wrapper');
    
    if (menuToggle && navMenu) {
      menuToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
        menuToggle.classList.toggle('active');
      });
    }
  }

  // Carousel
  function initCarousel() {
    const carousels = document.querySelectorAll('.media-carousel');
    
    carousels.forEach(carousel => {
      const slides = carousel.querySelectorAll('.carousel-slide');
      const prevBtn = carousel.querySelector('.carousel-btn.prev');
      const nextBtn = carousel.querySelector('.carousel-btn.next');
      let currentSlide = 0;
      
      function showSlide(index) {
        slides.forEach((slide, i) => {
          slide.classList.toggle('active', i === index);
        });
        currentSlide = index;
      }
      
      if (prevBtn) {
        prevBtn.addEventListener('click', () => {
          const newIndex = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
          showSlide(newIndex);
        });
      }
      
      if (nextBtn) {
        nextBtn.addEventListener('click', () => {
          const newIndex = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
          showSlide(newIndex);
        });
      }
    });
  }

  // Contact Form
  function initContactForm() {
    const form = document.getElementById('contact-form');
    
    if (form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(form);
        formData.append('action', 'contact_form');
        formData.append('nonce', pekebyteAjax.nonce);
        
        const messagesDiv = document.getElementById('form-messages');
        const submitBtn = form.querySelector('button[type="submit"]');
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
        
        fetch(pekebyteAjax.ajax_url, {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          messagesDiv.style.display = 'block';
          
          if (data.success) {
            messagesDiv.className = 'form-messages success';
            messagesDiv.textContent = data.data.message;
            form.reset();
          } else {
            messagesDiv.className = 'form-messages error';
            messagesDiv.textContent = data.data.message;
          }
          
          submitBtn.disabled = false;
          submitBtn.textContent = 'Send Message';
        });
      });
    }
  }

  $(document).ready(function() {
    initThemeToggle();
    initMobileMenu();
    initCarousel();
    initContactForm();
  });

})(jQuery);
