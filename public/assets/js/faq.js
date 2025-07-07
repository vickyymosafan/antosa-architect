// Premium FAQ interactivity: category switching & accordion
// Enhanced with smooth animations and premium styling

document.addEventListener('DOMContentLoaded', function () {
  // Premium category switching with enhanced styling
  document.querySelectorAll('.faq-category').forEach(function (btn) {
    btn.addEventListener('click', function () {
      // Remove active state from all buttons
      document.querySelectorAll('.faq-category').forEach(function (b) {
        b.classList.remove('bg-gradient-to-r', 'from-primary-500/20', 'to-primary-600/20', 'text-primary-300', 'border', 'border-primary-500/30');
        b.classList.add('text-gray-400');
      });

      // Add active state to clicked button
      btn.classList.add('bg-gradient-to-r', 'from-primary-500/20', 'to-primary-600/20', 'text-primary-300', 'border', 'border-primary-500/30');
      btn.classList.remove('text-gray-400');

      // Switch panels with smooth transition
      var cat = btn.getAttribute('data-category');
      document.querySelectorAll('.faq-panel').forEach(function (panel) {
        if (panel.getAttribute('data-category') === cat) {
          panel.classList.remove('hidden');
          // Add entrance animation
          panel.style.opacity = '0';
          panel.style.transform = 'translateY(10px)';
          setTimeout(() => {
            panel.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
            panel.style.opacity = '1';
            panel.style.transform = 'translateY(0)';
          }, 10);
        } else {
          panel.classList.add('hidden');
        }
      });
    });
  });

  // Enhanced accordion with smooth animations
  document.querySelectorAll('.faq-question').forEach(function (q) {
    q.addEventListener('click', function () {
      var answer = q.parentElement.querySelector('.faq-answer');
      var icon = q.querySelector('.faq-toggle-icon');

      if (answer) {
        if (answer.classList.contains('hidden')) {
          // Open animation
          answer.classList.remove('hidden');
          answer.style.maxHeight = '0';
          answer.style.opacity = '0';
          answer.style.transition = 'max-height 0.3s ease-out, opacity 0.3s ease-out';

          // Calculate height and animate
          const height = answer.scrollHeight;
          setTimeout(() => {
            answer.style.maxHeight = height + 'px';
            answer.style.opacity = '1';
          }, 10);

          // Rotate icon
          if (icon) {
            icon.style.transition = 'transform 0.3s ease-out';
            icon.style.transform = 'rotate(180deg)';
          }
        } else {
          // Close animation
          answer.style.maxHeight = answer.scrollHeight + 'px';
          answer.style.transition = 'max-height 0.3s ease-out, opacity 0.3s ease-out';

          setTimeout(() => {
            answer.style.maxHeight = '0';
            answer.style.opacity = '0';
          }, 10);

          setTimeout(() => {
            answer.classList.add('hidden');
          }, 300);

          // Rotate icon back
          if (icon) {
            icon.style.transition = 'transform 0.3s ease-out';
            icon.style.transform = 'rotate(0deg)';
          }
        }
      }
    });
  });
});
