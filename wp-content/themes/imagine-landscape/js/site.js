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
  console.log('DOM fully loaded');

  document.body.addEventListener('click', (event) => {
    const item = event.target.closest('.faq-question');
    if (item) {
      console.log('FAQ question clicked:', item);
      const faqItem = item.closest('.faq-item');
      const answer = faqItem?.querySelector('.faq-answer');
      const toggle = item.querySelector('.faq-toggle');

      if (faqItem && answer && toggle) {
        item.classList.toggle('active');
        toggle.classList.toggle('active');
        answer.classList.toggle('active');
      } else {
        console.error('FAQ structure incomplete:', { faqItem, answer, toggle });
      }
    }
  });

  const openAllBtn = document.querySelector('#open-all-btn');
  if (openAllBtn) {
    console.log('Open All button found');
    openAllBtn.addEventListener('click', () => {
      console.log('Open All clicked');
      document.querySelectorAll('.faq-question').forEach((item) => {
        const faqItem = item.closest('.faq-item');
        const answer = faqItem?.querySelector('.faq-answer');
        const toggle = item.querySelector('.faq-toggle');
        if (faqItem && answer && toggle) {
          item.classList.add('active');
          toggle.classList.add('active');
          answer.classList.add('active');
        }
      });
    });
  } else {
    console.warn('Open All button not found');
  }

  const closeAllBtn = document.querySelector('#close-all-btn');
  if (closeAllBtn) {
    console.log('Close All button found');
    closeAllBtn.addEventListener('click', () => {
      console.log('Close All clicked');
      document.querySelectorAll('.faq-question').forEach((item) => {
        const faqItem = item.closest('.faq-item');
        const answer = faqItem?.querySelector('.faq-answer');
        const toggle = item.querySelector('.faq-toggle');
        if (faqItem && answer && toggle) {
          item.classList.remove('active');
          toggle.classList.remove('active');
          answer.classList.remove('active');
        }
      });
    });
  } else {
    console.warn('Close All button not found');
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
