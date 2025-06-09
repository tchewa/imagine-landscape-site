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
