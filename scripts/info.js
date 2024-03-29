function toggleAccordion(topicId) {
    var accordionContent = document.getElementById(topicId);
    if (accordionContent) {
        accordionContent.classList.toggle("active");
    }
  }
  