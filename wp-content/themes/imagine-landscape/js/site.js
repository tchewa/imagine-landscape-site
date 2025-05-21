if (window.location.pathname === '/get-a-quote/') {
  // Create a new object for custom validation of a custom field.
  var mySubmitController = Marionette.Object.extend({
    initialize: function () {
      this.listenTo(
        Backbone.Radio.channel('forms'),
        'submit:response',
        this.actionSubmit
      );
    },

    actionSubmit: function (response) {
      document.querySelector('.form-section-title').style.display = 'none';
    },
  });

  // On Document Ready...
  jQuery(document).ready(function ($) {
    // Instantiate our custom field's controller, defined above.
    new mySubmitController();
  });
}

document.addEventListener('DOMContentLoaded', () => {
  //FAQS
  const toggleButtons = document.querySelectorAll('.toggle-faq');
  const faqAnswers = document.querySelectorAll('.faq-answer');
  const faqQuestions = document.querySelectorAll('.faq-question');

  toggleButtons.forEach((button, index) => {
    button.addEventListener('click', (event) => {
      event.stopPropagation();
      const answer = faqAnswers[index];
      const isVisible = answer.style.display === 'block';
      answer.style.display = isVisible ? 'none' : 'block';
      button.textContent = isVisible ? '+' : '-';
    });
  });

  faqQuestions.forEach((question, index) => {
    question.addEventListener('click', () => {
      const answer = faqAnswers[index];
      const button = toggleButtons[index];
      const isVisible = answer.style.display === 'block';
      answer.style.display = isVisible ? 'none' : 'block';
      button.textContent = isVisible ? '+' : '-';
    });
  });
});

document.addEventListener('DOMContentLoaded', () => {
  console.log('we got to the carousel');
  const carousel = document.querySelector('.promo-carousel');
  const leftArrow = document.querySelector('.promo-arrow.left');
  const rightArrow = document.querySelector('.promo-arrow.right');

  if (!carousel || !leftArrow || !rightArrow) {
    console.error('Carousel elements not found');
    return;
  }

  const updateArrows = () => {
    const scrollLeft = carousel.scrollLeft;
    const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
    leftArrow.disabled = scrollLeft <= 0;
    rightArrow.disabled = scrollLeft >= maxScrollLeft;
  };

  leftArrow.addEventListener('click', () => {
    console.log('Left arrow clicked');
    if ('scrollBehavior' in document.documentElement.style) {
      carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' });
    } else {
      carousel.scrollLeft -= carousel.clientWidth;
    }
  });

  rightArrow.addEventListener('click', () => {
    console.log('Right arrow clicked');
    if ('scrollBehavior' in document.documentElement.style) {
      carousel.scrollBy({ left: carousel.clientWidth, behavior: 'smooth' });
    } else {
      carousel.scrollLeft += carousel.clientWidth;
    }
  });

  carousel.addEventListener('scroll', updateArrows);
  updateArrows(); // Initial call
});
