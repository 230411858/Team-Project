document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.faq-question').forEach(question => {
      question.addEventListener('click', () => {
        const faqAnswer = question.nextElementSibling;
        const arrowIcon = question.querySelector('.arrow-icon');
  
        // Collapse any other open answers and reset their arrows
        document.querySelectorAll('.faq-question').forEach(q => {
          if (q !== question) {
            q.nextElementSibling.style.display = 'none';
            const otherArrow = q.querySelector('.arrow-icon');
            otherArrow.classList.remove('rotated');
          }
        });
  
        // Toggle the clicked FAQ answer and arrow rotation
        if (faqAnswer.style.display === 'block') {
          faqAnswer.style.display = 'none';
          arrowIcon.classList.remove('rotated');
        } else {
          faqAnswer.style.display = 'block';
          arrowIcon.classList.add('rotated');
        }
      });
    });
  });
  