document.addEventListener('DOMContentLoaded', () => {
  // Slider stuff
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
});

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.faq-question').forEach((item) => {
    item.addEventListener('click', () => {
      const answer = document.getElementById(
        'faq-' + item.getAttribute('data-faq-id')
      );
      const toggle = item.querySelector('.faq-toggle');
      answer.classList.toggle('active');
      toggle.classList.toggle('active');

      document.querySelectorAll('.faq-answer').forEach((otherAnswer) => {
        if (
          otherAnswer !== answer &&
          otherAnswer.classList.contains('active')
        ) {
          otherAnswer.classList.remove('active');
          otherAnswer.previousElementSibling
            .querySelector('.faq-toggle')
            .classList.remove('active');
        }
      });
    });
  });

  document.querySelector('.faq-open-all').addEventListener('click', () => {
    document.querySelectorAll('.faq-answer').forEach((answer) => {
      answer.classList.add('active');
    });
    document.querySelectorAll('.faq-toggle').forEach((toggle) => {
      toggle.classList.add('active');
    });
  });

  document.querySelector('.faq-close-all').addEventListener('click', () => {
    document.querySelectorAll('.faq-answer').forEach((answer) => {
      answer.classList.remove('active');
    });
    document.querySelectorAll('.faq-toggle').forEach((toggle) => {
      toggle.classList.remove('active');
    });
  });
});
