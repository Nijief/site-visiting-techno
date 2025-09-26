

document.addEventListener('DOMContentLoaded', function () {

  var forms = document.querySelectorAll('#contactForm');
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });

  var toTop = document.getElementById('toTop');
  window.addEventListener('scroll', function () {
    if (window.scrollY > 200) toTop.style.display = 'block';
    else toTop.style.display = 'none';
  });
  toTop.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});
