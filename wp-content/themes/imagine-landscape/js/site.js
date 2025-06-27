document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('.testimonial-slider')) {
    const slider = document.querySelector('.testimonial-slider');
    const slides = document.querySelectorAll('.testimonial-slide');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    const totalSlides = slides.length;

    let currentIndex = 0;

    function updateSlider() {
      slider.style.transition = 'transform 0.5s ease-in-out';
      slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateSlider();
    });

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
      updateSlider();
    });

    // Init position
    updateSlider();
  }
});

document.addEventListener('DOMContentLoaded', function () {
  // Individual FAQ item toggle
  document.querySelectorAll('.faq-question').forEach((item) => {
    item.addEventListener('click', () => {
      const faqItem = item.closest('.faq-item');
      const answer = faqItem.querySelector('.faq-answer');
      const toggle = item.querySelector('.faq-toggle');
      const isActive = item.classList.contains('active');

      // Toggle the clicked item
      item.classList.toggle('active');
      toggle.classList.toggle('active');
      answer.classList.toggle('active');
    });
  });

  // Open All button
  const openAllBtn = document.querySelector('#open-all-btn');
  if (openAllBtn) {
    openAllBtn.addEventListener('click', () => {
      document.querySelectorAll('.faq-question').forEach((item) => {
        item.classList.add('active');
        item
          .closest('.faq-item')
          .querySelector('.faq-answer')
          .classList.add('active');
      });
    });
  }

  // Close All button
  const closeAllBtn = document.querySelector('#close-all-btn');
  if (closeAllBtn) {
    closeAllBtn.addEventListener('click', () => {
      document.querySelectorAll('.faq-question').forEach((item) => {
        item.classList.remove('active');
        item.querySelector('.faq-toggle').classList.remove('active');
        item
          .closest('.faq-item')
          .querySelector('.faq-answer')
          .classList.remove('active');
      });
    });
  }
});

// Back to Top button
document.addEventListener('DOMContentLoaded', function () {
  const backToTopButton = document.querySelector('.back-to-top');

  if (!backToTopButton) return;
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
      backToTopButton.classList.add('show');
    } else {
      backToTopButton.classList.remove('show');
    }
  });

  backToTopButton.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  });
});
