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
  document.querySelectorAll('.faq-question').forEach((item) => {
    item.addEventListener('click', () => {
      const answer = document.getElementById(
        'faq-' + item.getAttribute('data-faq-id')
      );
      const toggle = item.querySelector('.faq-toggle');
      const isActive = item.classList.contains('active');

      // Remove 'active' from all questions and answers
      document
        .querySelectorAll('.faq-question')
        .forEach((q) => q.classList.remove('active'));
      document
        .querySelectorAll('.faq-toggle')
        .forEach((t) => t.classList.remove('active'));
      document
        .querySelectorAll('.faq-answer')
        .forEach((a) => a.classList.remove('active'));

      // If not already active, activate this one
      if (!isActive) {
        item.classList.add('active');
        toggle.classList.add('active');
        answer.classList.add('active');
      }
    });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  function replaceHelpBackgrounds() {
    const helpTips = document.querySelectorAll('.nf-help');

    helpTips.forEach(function (el) {
      el.style.backgroundImage =
        'url("<?php echo get_template_directory_uri(); ?>/images/icons/il-yelp-white.png")';
      el.style.backgroundColor = 'transparent';
      el.style.backgroundRepeat = 'no-repeat';
      el.style.backgroundPosition = 'center center';
      el.style.backgroundSize = 'contain';
      el.style.width = '20px'; // adjust based on your image
      el.style.height = '20px';
      el.style.display = 'inline-block';
      el.textContent = ''; // optional: remove text inside
    });
  }

  // Run once at load
  replaceHelpBackgrounds();

  // Optionally, rerun if forms are dynamically reloaded
  document.addEventListener('nfFormReady', replaceHelpBackgrounds);
});
