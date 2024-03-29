function rotateNeedle(compassId, angleInputId) {
    // Get the rotation angle (in degrees) from user input
    const rotationAngleInput = document.getElementById(angleInputId);
    const rotationAngle = parseFloat(rotationAngleInput.value) || 0;
  
    // Rotate the needle based on the provided angle
    const needle = document.getElementById(compassId).querySelector('.needle');
    needle.style.transform = `translate(-50%, -100%) rotate(${rotationAngle}deg)`;
  }
  
  // JavaScript to create sub-lines for angle degrees
  for (let i = 0; i < 360; i += 5) {
    const scale1 = document.getElementById('scale1');
    const scale2 = document.getElementById('scale2');
    // Create sub-line for compass 1
    const subLine1 = document.createElement('div');
    subLine1.classList.add('sub-line');
    if (i === 0 || i === 180 || i === 90 || i === 270) {
        subLine1.classList.add('bold');
    }
    if (i === 45 || i === 135 || i === 225 || i === 315) {
        subLine1.classList.add('semibold');
    }
    subLine1.style.transform = `rotate(${i}deg)`;
    scale1.appendChild(subLine1);
  
    // Create sub-line for compass 2
    const subLine2 = document.createElement('div');
    subLine2.classList.add('sub-line');
    if (i === 0 || i === 180 || i === 90 || i === 270) {
        subLine2.classList.add('bold');
    }
    if (i === 45 || i === 135 || i === 225 || i === 315) {
        subLine2.classList.add('semibold');
    }
    subLine2.style.transform = `rotate(${i}deg)`;
    scale2.appendChild(subLine2);
  }
  